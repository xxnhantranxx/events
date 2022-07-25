<?php 

get_header();

?>

<div class="events-wrapper events-archive">

    <section class="section">

        <div class="section-content">

            <div class="row">

                <div class="col medium-12 small-12 large-12 header-events-archive">

                    <p>Sự kiện</p>

                    <h1 class="header-title">Theo dõi tất cả sự kiện do Leeking tổ chức</h1>

                </div>

            </div>

            <?php

            if ( have_posts() ) {

                while ( have_posts() ) {

                    the_post();  ?>

                    <div class="row event-item-loop">

                        <div class="col medium-6 small-12 large-6 col-left">

                            <div class="event-item-text">

                                <?php $terms = get_the_terms( get_the_ID(), 'categories_events'); ?>

                                <p class="event-terms"><?php print_r($terms[0]->name); ?></p>

                                <h2 class="event-title">

                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                </h2>

                                <div class="event-list">

                                    <div class="event-list-item">

                                        <i class="fa-regular fa-calendar-days event-icon"></i>

                                        <p class="event-content">

                                            <?php echo get_field('time_start'); ?>

                                        </p>

                                    </div>

                                    <div class="event-list-item">

                                        <?php 

                                            if(get_field('time_end')){ ?>

                                                <i class="fa-solid fa-ticket event-icon"></i>

                                                <p class="event-content"><?php echo get_field('time_end'); ?></p>

                                            <?php }

                                        ?>

                                    </div>

                                    <div class="event-list-item">

                                        <i class="fa-solid fa-location-dot event-icon"></i>

                                        <p class="event-content">

                                        <?php

                                        $location = get_field('location');

                                        if( $location ) {

                                            // Loop over segments and construct HTML.

                                            $address = '';

                                            foreach( array('street_number', 'street_name', 'city', 'state', 'post_code', 'country') as $i => $k ) {

                                                if( isset( $location[ $k ] ) ) {

                                                    $address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $location[ $k ] );

                                                }

                                            }

                                            // Trim trailing comma.

                                            $address = trim( $address, ', ' );

                                            // Display HTML.

                                            echo $address;

                                        }

                                        ?>

                                        </p>

                                    </div>

                                </div>

                                <div class="event-btns">

                                    <a href="<?php the_permalink(); ?>" class="event-btn btn-buy-tickets">Xem chi tiết</a>

                                    <div title="Add to Calendar" class="addeventatc">

                                    Thêm vào lịch

                                    <span class="start"><?php the_field('time_start');?></span>

                                    <span class="end"><?php the_field('time_start'); ?></span>

                                    <span class="timezone">UTC+7</span>

                                    <span class="title"><?php the_title(); ?></span>

                                    <span class="description"><?php echo get_the_excerpt(); ?></span>

                                    <span class="location"><?php echo $address; ?></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col medium-6 small-12 large-6 col-right">

                            <div class="event-item-img">

                                <a href="<?php the_permalink(); ?>" class="event-item-link">

                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">

                                </a>

                            </div>

                        </div>

                    </div>

                <?php } // end while

            } // end if

            ?>

            <div class="row">

                <div class="col col-12 text-center">

                    <?php flatsome_posts_pagination(); ?>

                </div>

            </div>

        </div>

    </section>

</div>



<?php get_footer(); ?>
<?php 

get_header();

?>



<div class="events-wrapper events-single">

<section class="section">

        <div class="section-content">

            <div class="row">

                <div class="col medium-12 small-12 large-12 header-events-single">

                    <p>

                        <?php $terms = get_the_terms( get_the_ID(), 'categories_events'); ?>

                        <a href="javascript:void(0);"><?php print_r($terms[0]->name); ?></a>

                    </p>

                    <h1 class="header-title"><?php the_title(); ?></h1>

                </div>

            </div>

            <div class="row">

                <div class="col medium-4 small-12 large-8">

                    <div class="event-box-text">

                        <div class="event-item-img">

                            <a href="<?php the_permalink(); ?>" class="event-item-link">

                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>" alt="">

                            </a>

                        </div>

                        <div class="event-item-content">

                            <div class="event-container">

                                <?php the_content(); ?>

                            </div>

                            <!-- <div class="event-bottom">

                                <div class="event-navigation">

                                    <div class="event-navigation-prev">

                                        <a href="#" class="event-navigation-link">Back to upcoming events</a>

                                    </div>

                                    <div class="event-navigation-next">

                                        <a href="#" class="event-navigation-link">Next event</a>

                                    </div>

                                </div>

                            </div> -->

                        </div>

                    </div>

                </div>

                <div class="col medium-8 small-12 large-4">

                    <div class="event-item-text">

                        <div class="event-list">

                            <div class="event-list-item">

                                <i class="fa-regular fa-calendar-days event-icon"></i>

                                <p class="event-content"><?php echo get_field('time_start'); ?></p>

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

                        <div class="event-btn">

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

            </div>

        </div>

    </section>

</div>



<?php get_footer(); ?>
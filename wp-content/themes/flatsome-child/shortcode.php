<?php

// Add ShortCode



// Tin tức 3

function NewsAndKnowledge($atts)

{

    ob_start();

    if(isset($atts['count_posts'])){

        $args = array(

            'post_type' => 'post',

            'post_status' => 'publish',

            'posts_per_page' => $atts['count_posts'],

        );

    }else{

        $args = array(

            'post_type' => 'post',

            'post_status' => 'publish',

            'posts_per_page' => 3,

        );

    }

    

    $the_query = new WP_Query($args);

?>

    <div class="wapper-news-nt">

        <div class="row" id="row-1963750479">

            <div id="col-1434463741" class="col upcoming-events-header small-12 large-12">

                <div class="col-inner text-center">

                    <h2 class="header-title"> <span><?php echo $atts['title_widget']; ?></span> – <?php echo $atts['title_widget_2']; ?></h2>

                    <p class="header-desc"><?php echo $atts['description']; ?></p>

                </div>

            </div>

        </div>

        <div class="row" id="row-70988312">

        <?php // The Loop

            if ($the_query->have_posts()) :

                while ($the_query->have_posts()) : $the_query->the_post();

            ?>

            <div class="col medium-4 small-12 large-4">

				<div class="col-inner">

			        <div class="box has-hover upcoming-events-box  has-hover box-text-bottom">

                        <div class="box-image">

                            <a href="<?php the_permalink(); ?>">

                                <div class="overlay-box"></div>

                                <div class="image-cover" style="padding-top:300px;">

                                    <a href="<?php the_permalink(); ?>">

                                        <img width="100%" height="auto" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="attachment- size- lazy-load-active" alt="" loading="lazy">

                                    </a>

                                </div>

                            </a>

					    </div>

                        <div class="box-text text-center">

			                <div class="box-text-inner">

                                <h2 class="text-title">

                                    <a href="<?php the_permalink(); ?>" class="text-link"><?php the_title(); ?></a>

                                </h2>

                                <p class="text-desc"><?php echo get_the_excerpt(); ?></p>

                            </div>

		                </div>

	                </div>

	            </div>

	        </div>

            <?php

                endwhile;

            endif;

        // Reset Post Data

        wp_reset_postdata(); ?>

        </div>

        <div class="row btn-row">

            <div  style="padding: 50px 0px 0px 0px;" class="col upcoming-events-bottom hide-for-small small-12 large-12">

				<div class="col-inner text-center">

			        <a href="<?php echo $atts['link']; ?>" target="_self" class="button primary btn-primary" style="padding:0px 30px 0px 30px;">

                        <span>Xem tất cả</span>

                    </a>

                </div>

            </div>

            <div id="col-1216622997" class="col upcoming-events-bottom show-for-small small-12 large-12">

				<div class="col-inner text-center">

                    <a href="<?php echo $atts['link']; ?>" target="_self" class="button primary btn-primary">

                        <span>Xem tất cả</span>

                    </a>

                </div>

            </div>

        </div>

    </div>

<?php

    $contentShortcode = ob_get_contents();

    ob_end_clean();

    return $contentShortcode;

}

add_shortcode('SC_NewsAndKnowledge', 'NewsAndKnowledge');



// Sự kiện đã tổ chức

function evented($atts)

{

    ob_start();

    if(isset($atts['count_posts'])){

        $args = array(

            'post_type' => 'events',

            'post_status' => 'publish',

            'meta_query'   => array(

                'relation'      => 'OR',

              // check to see if end date has been set

              array(

                'key'         => 'time_end',

                'value'       => date('Ymd'),

                'compare'     => '<',

                'type'        => 'date'

              ),

              // if no end date has been set use start date

              array(

                'key'         => 'time_start',

                'value'       => date('Ymd'),

                'compare'     => '<',

                'type'        => 'date'

              )

            ),

            'orderby' 		 => 'meta_value_num',

	        'order'        => 'ASC',

            'posts_per_page' => $atts['count_posts'],

        );

    }else{

        $args = array(

            'post_type' => 'events',

            'post_status' => 'publish',

            'meta_query'   => array(

                'relation'      => 'OR',

              // check to see if end date has been set

              array(

                'key'         => 'time_end',

                'value'       => date('Ymd'),

                'compare'     => '<',

                'type'        => 'date'

              ),

              // if no end date has been set use start date

              array(

                'key'         => 'time_start',

                'value'       => date('Ymd'),

                'compare'     => '<',

                'type'        => 'date'

              )

            ),

            'orderby' 		 => 'meta_value_num',

	        'order'        => 'ASC',

            'posts_per_page' => 4,

        );

    }

    

    $the_query = new WP_Query($args);

    ?>

    <div class="row <?php echo $atts['class']; ?>">

        <?php // The Loop

        if ($the_query->have_posts()) :

            while ($the_query->have_posts()) : $the_query->the_post();

        ?>

        <div class="col medium-6 small-12 large-6">

			<div class="col-inner">

			    <div class="box has-hover success-events-box  has-hover box-text-bottom">

                    <div class="box-image">

                        <a href="<?php the_permalink(); ?>">

                            <div class="overlay-box"></div>

                            <div class="image-cover" style="padding-top:70%;">

                                <img width="100%" height="auto" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="attachment- size-" alt="" loading="lazy">											

                            </div>

                         </a>

                    </div>

                    <div class="box-text text-left">

			            <div class="box-text-inner">

				            <h4 class="text-title"><a class="text-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            <div class="text-desc">

                                <span class="text-address">

                                    <i class="fa-solid fa-clock"></i><?php echo get_field('time_start'); ?>

                                </span><br>

                                <span class="text-time">

                                    <i class="fa-solid fa-location-dot"></i><?php

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

                                </span>

                            </div>

                        </div>

                    </div>

	            </div>

	        </div>

		</div>

        <?php

        endwhile;

            endif;

        // Reset Post Data

        wp_reset_postdata(); ?>

    </div>

<?php

    $contentShortcode = ob_get_contents();

    ob_end_clean();

    return $contentShortcode;

}

add_shortcode('SC_evented', 'evented');



// Sự kiện sắp diễn ra

function eventing($atts)

{

    ob_start();

    if(isset($atts['count_posts'])){

        $args = array(

            'post_type' => 'events',

            'post_status' => 'publish',

            'meta_query'   => array(

                'relation'      => 'OR',

              // check to see if end date has been set

              array(

                'key'         => 'acf_event_date_end',

                'value'       => date('Ymd'),

                'compare'     => '>=',

                'type'        => 'date'

              ),

              // if no end date has been set use start date

              array(

                'key'         => 'acf_event_date_start',

                'value'       => date('Ymd'),

                'compare'     => '>=',

                'type'        => 'date'

              )

            ),

            'orderby' 		 => 'meta_value_num',

	        'order'        => 'ASC',

            'posts_per_page' => $atts['count_posts'],

        );

    }else{

        $args = array(

            'post_type' => 'events',

            'post_status' => 'publish',

            'meta_query'   => array(

                'relation'      => 'OR',

              // check to see if end date has been set

              array(

                'key'         => 'time_end',

                'value'       => date('Ymd'),

                'compare'     => '>=',

                'type'        => 'date'

              ),

              // if no end date has been set use start date

              array(

                'key'         => 'time_start',

                'value'       => date('Ymd'),

                'compare'     => '>=',

                'type'        => 'date'

              )

            ),

            'orderby' 		 => 'meta_value_num',

	        'order'        => 'ASC',

            'posts_per_page' => 4,

        );

    }

    

    $the_query = new WP_Query($args);

    ?>

    <div class="row">

        <div class="col small-12 large-12">

            <div class="col-inner">

                <div class="news-header hide-for-small">

                    <p><span class="icon"><i class="fa-solid fa-file-image"></i></span></p>

                    <div class="text">

                        <h2 class="text-title">SỰ KIỆN TIẾP THEO</h2>

                        <p class="text-desc">Theo dõi sự kiễn sắp diễn ra đầy hấp dẫn với Leeking</p>

                    </div>

                </div>

                <div class="news-header show-for-small">

                    <div class="box-text">

                        <span class="icon"><i class="fa-solid fa-file-image"></i></span><p></p>

                        <h2 class="text-title">SỰ KIỆN TIẾP THEO</h2>

                    </div>

                    <p class="text-desc">Theo dõi sự kiễn sắp diễn ra đầy hấp dẫn với Leeking</p>

                </div>

            </div>

        </div>

    </div>

    <?php // The Loop

    if ($the_query->have_posts()) :

        while ($the_query->have_posts()) : $the_query->the_post();

    ?>

    <div class="row row-collapse align-equal news-content" style="background:rgb(47, 47, 47);">

        <div class="col col-news-img medium-6 small-12 large-6">

            <div class="col-inner">

                <div class="img has-hover x md-x lg-x y md-y lg-y" style="width:90%;">

                    <div class="img-inner image-cover dark" style="padding-top:50%;margin:30px 0px 30px 30px;">

                        <img width="100%" height="auto" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="attachment-original size-original" alt="" loading="lazy">

                    </div>

                </div>

            </div>

        </div>

        <div class="col news-text medium-6 small-12 large-6">

            <div class="col-inner">

                <div class="text">

                    <h3 class="text-title"><a class="text-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <p class="text-content">

                        <span>

                            <i class="fa-solid fa-calendar-days"></i>

                            <?php echo get_field('time_start'); ?>

                        </span>

                        <span>

                            <i class="fa-solid fa-location-dot"></i>

                            <a class="text-icon-link" href="javascript:void(0);">

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

                            </a>

                        </span>

                    </p>

                    <p class="text-desc"><?php echo get_the_excerpt(); ?></p>

                </div>

                <a class="button primary btn-primary" href="<?php the_permalink(); ?>">

                    <span>Xem chi tiết...</span>

                </a>

            </div>

        </div>

    </div>

    <?php

    endwhile;

    endif;

    // Reset Post Data

    wp_reset_postdata();

    $contentShortcode = ob_get_contents();

    ob_end_clean();

    return $contentShortcode;

}

add_shortcode('SC_eventing', 'eventing');






<?php
// Add ShortCode

// Footer 3
function NewsAndKnowledge($atts)
{
    ob_start();
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
    );
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
            <div id="col-110291612" class="col medium-4 small-12 large-4">
				<div class="col-inner">
			        <div class="box has-hover upcoming-events-box  has-hover box-text-bottom">
                        <div class="box-image">
                            <div class="image-cover" style="padding-top:300px;">
                                <img width="1280" height="960" src="http://localhost/Events/wp-content/uploads/2022/06/blog12.jpg" class="attachment- size- lazy-load-active" alt="" loading="lazy">											
                            </div>
					    </div>
                        <div class="box-text text-center">
			                <div class="box-text-inner">
                                <h2 class="text-title">
                                    <a href="#" class="text-link">KHAI TRƯƠNG KHÁNH THÀNH</a>
                                </h2>
                                <p class="text-desc">Lễ khai trương, khánh thành là một sự kiện trọng đại, bởi vì đây là dịp để doanh nghiệp giới thiệu cửa hàng, địa điểm kinh doanh, sản phẩm và dịch vụ tới mọi người.</p>
                            </div>
		                </div>
	                </div>
	            </div>
	        </div>
        <?php // The Loop
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>
            <div id="col-110291612" class="col medium-4 small-12 large-4">
				<div class="col-inner">
			        <div class="box has-hover upcoming-events-box  has-hover box-text-bottom">
                        <div class="box-image">
                            <div class="image-cover" style="padding-top:300px;">
                                <img width="1280" height="960" src="http://localhost/Events/wp-content/uploads/2022/06/blog12.jpg" class="attachment- size- lazy-load-active" alt="" loading="lazy">											
                            </div>
					    </div>
                        <div class="box-text text-center">
			                <div class="box-text-inner">
                                <h2 class="text-title">
                                    <a href="#" class="text-link">KHAI TRƯƠNG KHÁNH THÀNH</a>
                                </h2>
                                <p class="text-desc">Lễ khai trương, khánh thành là một sự kiện trọng đại, bởi vì đây là dịp để doanh nghiệp giới thiệu cửa hàng, địa điểm kinh doanh, sản phẩm và dịch vụ tới mọi người.</p>
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
        <div class="row btn-row" id="row-703541777">
            <div id="col-685651024" style="padding: 50px 0px 0px 0px;" class="col upcoming-events-bottom hide-for-small small-12 large-12">
				<div class="col-inner text-center">
			        <a href="#" target="_self" class="button primary btn-primary" style="padding:0px 30px 0px 30px;">
                        <span>Xem tất cả</span>
                    </a>
                </div>
            </div>
            <div id="col-1216622997" class="col upcoming-events-bottom show-for-small small-12 large-12">
				<div class="col-inner text-center">
                    <a href="#" target="_self" class="button primary btn-primary">
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



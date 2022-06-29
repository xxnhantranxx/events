<div class="entry-content single-page">
	<?php the_content(); ?>
	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'flatsome' ),
		'after'  => '</div>',
	) );
	?>
	<?php if ( get_theme_mod( 'blog_share', 1 ) ) {
		// SHARE ICONS
		echo '<div class="blog-share text-center">';
		echo '<div class="is-divider medium"></div>';
		echo do_shortcode( '[share]' );
		echo '</div>';
	} ?>
</div><!-- .entry-content2 -->
<?php if ( get_theme_mod( 'blog_single_footer_meta', 1 ) ) : ?>
	<footer class="entry-meta text-<?php echo get_theme_mod( 'blog_posts_title_align', 'center' ); ?>">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'flatsome' ) );
		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'flatsome' ) );
		// But this blog has loads of categories so we should probably display them here.
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'flatsome' );
		} else {
			$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flatsome' );
		}
		printf( $meta_text, $category_list, $tag_list, get_permalink(), the_title_attribute( 'echo=0' ) );
		?>
	</footer><!-- .entry-meta -->
<?php endif; ?>
<?php $post_type = get_post_type(); ?>
<div class="post_releated_core">
	<div class="titreleated">
		<p><?php if ($post_type == 'post') {
			echo 'Các tin liên quan';
		}else if($post_type == 'du_an'){
			echo 'Các dự án khác';
		}else if($post_type == 'dich_vu'){
			echo 'Các dịch vụ khác';
		}else{
			echo 'Tin liên quan';
		} ?></p>
	</div>
	<div class="ulreleated_core">
		<?php
			if ($post_type == 'post') {
				$categories = get_the_category(get_the_ID());
					if ($categories){
				    echo '<div class="relatedcat">';
				    $category_ids = array();
				    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				    $args=array(
				        'category__in' => $category_ids,
				        'post__not_in' => array(get_the_ID()),
				        'posts_per_page' => 5, // So bai viet dc hien thi
				    );
				    $my_query = new wp_query($args);
				    if( $my_query->have_posts() ):
				        echo '<ul>';
				        while ($my_query->have_posts()):$my_query->the_post();
				            ?>
				            <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				            <?php
				        endwhile;
				        echo '</ul>';
				    endif; wp_reset_query();
				    echo '</div>';
					}
		 	}else if ($post_type == 'du_an'){
		 		//get the taxonomy terms of custom post type
					$customTaxonomyTerms = wp_get_object_terms( $post->ID, array('fields' => 'ids') );
					//query arguments
					$args = array(
					    'post_type' => 'du_an',
					    'post_status' => 'publish',
					    'posts_per_page' => 5,
					    'orderby' => 'rand',
					    'post__not_in' => array ($post->ID),
					);

					//the query
					$relatedPosts = new WP_Query( $args );

					//loop through query
					if($relatedPosts->have_posts()){
					    echo '<div class="relatedcat du_an"><ul>';
					    while($relatedPosts->have_posts()){ 
					        $relatedPosts->the_post();
					?>
					        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
					    }
					    echo '</ul></div>';
					}else{
					    //no posts found
					}

					//restore original post data
					wp_reset_postdata();
		 	}else if ($post_type == 'dich_vu'){
		 		//get the taxonomy terms of custom post type
					$customTaxonomyTerms = wp_get_object_terms( $post->ID, array('fields' => 'ids') );
					//query arguments
					$args = array(
					    'post_type' => 'dich_vu',
					    'post_status' => 'publish',
					    'posts_per_page' => 5,
					    'orderby' => 'rand',
					    'post__not_in' => array ($post->ID),
					);

					//the query
					$relatedPosts_1 = new WP_Query( $args );

					//loop through query
					if($relatedPosts_1->have_posts()){
					    echo '<div class="relatedcat dic_vu"><ul>';
					    while($relatedPosts_1->have_posts()){ 
					        $relatedPosts_1->the_post();
					?>
					        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
					    }
					    echo '</ul></div>';
					}else{
					    //no posts found
					}

					//restore original post data
					wp_reset_postdata();
		 	}else{
		 		echo "chỉ dành cho nhà phát triển : hãy tạo lại seting post type cho trang này vị trí conten-single.php";
		 	}?>
	</div>
</div>
<?php if ( get_theme_mod( 'blog_author_box', 1 ) ) : ?>
	<div class="entry-author author-box">
		<div class="flex-row align-top">
			<div class="flex-col mr circle">
				<div class="blog-author-image">
					<?php
					$user = get_the_author_meta( 'ID' );
					echo get_avatar( $user, 90 );
					?>
				</div>
			</div><!-- .flex-col -->
			<div class="flex-col flex-grow">
				<h5 class="author-name uppercase pt-half">
					<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
				</h5>
				<p class="author-desc small"><?php echo esc_html( get_the_author_meta( 'user_description' ) ); ?></p>
			</div><!-- .flex-col -->
		</div>
	</div>
<?php endif; ?>



<?php if ( get_theme_mod( 'blog_single_next_prev_nav', 1 ) ) :

	flatsome_content_nav( 'nav-below' );

endif; ?>


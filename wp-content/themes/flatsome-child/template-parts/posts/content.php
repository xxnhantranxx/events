<div class="entry-content">
	<?php if ( flatsome_option('blog_show_excerpt') || is_search())  { ?>
	<div class="entry-summary">
		<p class="excert_core_post"><?php $the_excerpt1 = get_the_excerpt(); echo flatsome_string_limit_words($the_excerpt1, 30) //the_excerpt(20); ?></p>
		<!-- <div class="text-<?php //echo get_theme_mod( 'blog_posts_title_align', 'center' );?>">
			<a class="more-link button primary is-outline is-smaller" href="<?php //echo get_the_permalink(); ?>"><?php //echo _e('Continue reading <span class="meta-nav">&rarr;</span>', 'flatsome'); ?></a>
		</div> -->
	</div><!-- .entry-summary -->
	<?php } else { ?>
	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'flatsome' ) ); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'flatsome' ),
			'after'  => '</div>',
		) );
	?>
<?php }; ?>

</div><!-- .entry-content -->
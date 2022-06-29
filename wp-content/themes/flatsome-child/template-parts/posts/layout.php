<?php
	do_action('flatsome_before_blog');
?>

<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="row align-center">
	<div class="large-12 core_layout_archive col">
	<?php if(!is_single() && flatsome_option('blog_featured') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>

	<?php
		if(is_single()){
			get_template_part( 'template-parts/posts/single'); ?>
			<?php //comments_template();
		} else{
			get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style') );
		}
	?>
	</div> <!-- .large-9 -->

</div><!-- .row -->

<?php do_action('flatsome_after_blog');

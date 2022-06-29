<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package flatsome
 */

?>

<section class="no-results not-found">
	<header class="page-title">
		<h4 class="page-title"><?php esc_html_e( 'Nội dung đang được cập nhật...', 'flatsome' ); ?></h4>
	</header><!-- .page-title -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'flatsome' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'flatsome' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p class="page_none"><?php esc_html_e( 'Có vẻ như nội dung chưa được tìm thấy, hãy thử quay lại sau.', 'flatsome' ); ?>
			</p>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

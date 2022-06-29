<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package flatsome
 */

get_header(); 
header("HTTP/2 301 Moved Permanently");
header("Location:".get_bloginfo('url')); 
exit();
?>
<?php do_action( 'flatsome_before_404' ); ?>
<?php
if ( get_theme_mod( '404_block' ) ) :
	echo do_shortcode( '[block id="' . get_theme_mod( '404_block' ) . '"]' );
else :
?>
<div class="container-full demo-2">
    <div class="content">
        <div id="large-header" class="large-header">
            <h1 class="header-w3ls">Trang Lỗi</h1>
         	<a href="<?php echo home_url();?>" class="bnt_way_back_home">Quay lại trang chủ</a>
         	<canvas id="demo-canvas"></canvas>
         	<img src="<?php echo home_url();?>/wp-content/themes/flatsome-child/img/owl.gif" alt="flashy" class="w3l">
         	<h2 class="main-title">404</span></h2>
         	<p class="w3-agileits2">Chúng tôi dường như không thể tìm thấy trang bạn đang tìm kiếm.</p>
         	<p class="copyright-404">© <?php echo do_shortcode('[shortcode_nam]'); ?> Trang lỗi. Đã đăng ký Bản quyền | Thiết kế bởi <a href="<?php echo home_url();?>" target="_blank">
            <?php echo get_bloginfo('name');?></a>
         	</p>
        </div>
    </div>
</div>
<!-- js files -->
<script src="<?php echo home_url();?>/wp-content/themes/flatsome-child/js/time-delay-404.js"></script>
<script src="<?php echo home_url();?>/wp-content/themes/flatsome-child/js/seting-404.js"></script>
<?php endif; ?>
<?php do_action( 'flatsome_after_404' ); ?>
<?php get_footer(); ?>

<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php do_action( 'flatsome_after_body_open' ); ?>
  <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>
  <div id="wrapper">
    <?php do_action( 'flatsome_before_header' ); ?>
    <header id="header" class="header <?php flatsome_header_classes(); ?>">
      <div class="header-wrapper">
        <?php get_template_part( 'template-parts/header/header', 'wrapper' ); ?>
      </div><!-- header-wrapper-->
    </header>
      <?php do_action( 'flatsome_after_header' ); ?>
      <main id="main" class="<?php flatsome_main_classes(); ?>">
        <?php  if(!is_home() && !is_front_page() && !is_404() && !is_search('product')){ ?>
      <div class="breadcrumd_core not-product" style="background: url(<?php echo $a4 = get_theme_mod( 'img-upload'); ?>) no-repeat;background-size: cover;">
        <div class="row rowbread_core">
          <div class="large-12 col">
            <div class="titbread_addnew tit_archive_core">
              <?php if(is_singular('post')){ ?>
                <h3 class="visible-last-text"><?php $category = get_the_category(); echo $firstCategory = $category[0]->cat_name; ?></h3>
              <?php }elseif (is_singular('page')) {?>
                <h3 class="visible-last-text"><?php the_title(); ?></h3>
              <?php }elseif (is_category()) {?>
                <h3 class="visible-last-text"><?php single_cat_title(); ?></h3>
              <?php }elseif (function_exists('yoast_breadcrumb') && $category == NULL) {?>
                <div class="titbread_addnew tit_archive_core">
                  <h3 class="visible-last-text">
                    <?php
                    if(is_post_type_archive()) {
                      post_type_archive_title();
                    }elseif (is_search()) {
                      echo 'Kết quả tìm kiếm';
                    }elseif (is_tax('product_cat')) {
                      single_cat_title();
                    }elseif (is_singular('product')) {
                     $terms = get_the_terms( get_the_ID(), 'product_cat' );
                      if ( ! empty( $terms ) ) :
                        $term = array_pop( $terms );
                        $parent_term = ( $term->parent ? get_term( $term->parent, 'product_cat' ) : $term );
                        echo $parent_term->name;
                      endif; // ( ! empty( $terms ) ) 
                    }else{
                      echo 'Chưa Cài Đặt';
                    }?>    
                  </h3>
                </div>
              <?php } ?>
              <?php if(function_exists('yoast_breadcrumb')){
                yoast_breadcrumb('<p id="breadcrumbs" class="clearfix">','</p>');
              }else{
                echo '<p id="breadcrumbs" class="clearfix">Hãy bật chức năng breadcrumb trong yoat seo để sử dụng</p>';
              }?>
            </div>
          </div>
        </div>
      </div>
      <?php }
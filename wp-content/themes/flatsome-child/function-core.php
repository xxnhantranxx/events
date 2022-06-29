<?php
// shortcode Năm
function create_year() {
return date('Y');
} 
add_shortcode( 'shortcode_nam', 'create_year' );

// Add All Css header
function style_core_devmd(){
  wp_register_style('css_screen_first', get_stylesheet_directory_uri() .'/css/homepage-first-screen.css');
  wp_enqueue_style('css_screen_first');
}
add_action( 'wp_enqueue_scripts', 'style_core_devmd', 101 );

//Add All CSS AND SCRIPT TO FOOTER
function prefix_add_footer_styles() {
  wp_register_style('style_slick', get_stylesheet_directory_uri() .'/css/slick-style.css');
  wp_enqueue_style('style_slick');
  wp_register_style('style_system', get_stylesheet_directory_uri() .'/css/system-core.css');
  wp_enqueue_style('style_system');
  wp_register_style('style_footer', get_stylesheet_directory_uri() .'/css/footer.css');
  wp_enqueue_style('style_footer');
  wp_register_style('style_customize', get_stylesheet_directory_uri() .'/css/customize.css');
  wp_enqueue_style('style_customize');
  wp_register_style('css_responsive', get_stylesheet_directory_uri() .'/css/responsive.css');
  wp_enqueue_style('css_responsive');
  wp_register_script('slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js');
  wp_enqueue_script('slickjs');
  wp_register_script('js_custom_slick', get_stylesheet_directory_uri() . '/js/js_all_slick_custom.js');
  wp_enqueue_script('js_custom_slick');
  wp_register_script('jscore', get_stylesheet_directory_uri() . '/js/js-core.js');
  wp_enqueue_script('jscore');
};
add_action( 'get_footer', 'prefix_add_footer_styles' );

function nt_custom_logo() { ?>
 <style type="text/css">
   body {
    background-image: url('<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/admin/bg_admin.jpg')!important;
    background-size: cover !important;
    background-repeat: no-repeat;
  }
  .login #nav a,
  .login #backtoblog a,
  .login label {
    color: #f3f3f3 !important;
  }
  .wp-core-ui .button-primary {
    background: #31b36b !important;
    border: none !important;
    text-shadow: none !important;
    box-shadow: none !important;
  }
  .login form {
    box-shadow: none !important;
    background-color: #00000073 !important;
    box-shadow: 0 3px 15px rgba(0, 55, 0) !important;
  }
  #login h1 a {
    background-image: url('<?php echo home_url();?>/wp-content/themes/flatsome-child/img/admin/logo.png');
    /* background-size: 280px 80px; */
    width: 280px;
    height: 30px;
  }
  #login {
    margin-top: 50px !important;
  }
  .itsec-pwls-login--show #loginform>p,
  .itsec-pwls-login--show #loginform .user-pass-wrap {
    display: block !important;
  }
  .itsec-pwls-login-wrap,
  .itsec-pwls-login-fallback {
    display: none !important;
  }
</style>
<?php }
add_action('login_enqueue_scripts', 'nt_custom_logo');
/**
 * Tự đánh dấu vào nút Remember Me để ghi nhớ lần đăng nhập sau
 */
function nt_rememberme_check() {
    add_filter( 'login_footer', 'tp_rememberme_checked' );
}
add_action( 'init', 'nt_rememberme_check' );
 
function tp_rememberme_checked() {
    echo "<script>document.getElementById('rememberme').checked = true</scrip>";
}
/*Xóa widget */
function nt_remove_default_admin_widget_1() {
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    // remove_meta_box('woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
    remove_meta_box('e-dashboard-overview', 'dashboard', 'normal');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    remove_meta_box('dashboard_php_nag', 'dashboard', 'normal');
    remove_meta_box('themeisle', 'dashboard', 'normal');
    remove_meta_box('yith_dashboard_blog_news', 'dashboard', 'normal');
    //remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal');
    remove_meta_box('yith_dashboard_products_news', 'dashboard', 'normal');
}
add_action( 'wp_dashboard_setup', 'nt_remove_default_admin_widget_1' );
remove_action('welcome_panel', 'wp_welcome_panel'); // Xóa cái ML welcome. 
// remove logo
function remove_logo_and_submenu() {
 global $wp_admin_bar;
 //the following codes is to remove sub menu
 $wp_admin_bar->remove_menu('wp-logo');
 $wp_admin_bar->remove_menu('about');
 $wp_admin_bar->remove_menu('wporg');
 $wp_admin_bar->remove_menu('documentation');
 $wp_admin_bar->remove_menu('support-forums');
 $wp_admin_bar->remove_menu('feedback');
 $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'remove_logo_and_submenu' );
//Change footer
function remove_footer_admin () {
 echo 'Production CNTT <a href="https://weblinks.vn/" target="_blank">Theme</a> | System by <a href="#" target="_blank">CNTT VN Developer</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Sửa lại title trang đăng nhập
function my_admin_title($admin_title, $title){
    return get_bloginfo('name').' &bull; '.$title;
}
add_filter('admin_title', 'my_admin_title', 10, 2);

function custom_login_title($origtitle) { 
  return get_bloginfo('name').' - Đăng Nhập';
}
add_filter('login_title', 'custom_login_title', 99);

// change url of login logo link
add_filter( 'login_headerurl', 'custom_loginlogo_url');

function custom_loginlogo_url($url) {

return "https://weblinks.vn/";

}
//Khởi tạo menu
function register_settings_link(){
  register_setting( 'my-settings-group-2', 'link_video' );
  register_setting( 'my-settings-group-2', 'hidden_plugins' );
  register_setting( 'my-settings-group-2', 'hidden_themes' );
  register_setting( 'my-settings-group-2', 'hidden_acf' );
  register_setting( 'my-settings-group-2', 'hidden_ctf7' );
  register_setting( 'my-settings-group-2', 'hidden_comment' );
  register_setting( 'my-settings-group-2', 'hidden_dgwt' );
  register_setting( 'my-settings-group-2', 'hidden_tool' );
  register_setting( 'my-settings-group-2', 'hidden_block' );
  register_setting( 'my-settings-group-2', 'hidden_itsec' );
  register_setting( 'my-settings-group-2', 'turn_off_update');
  register_setting( 'my-settings-group-2', 'mode_theme' );
}
add_action( 'admin_init', 'register_settings_link' );
if(!function_exists('my_create_menu_link')){
  function my_create_menu_link() {
  $page=add_submenu_page( 'options-general.php','Hướng Dẫn', 'Hướng Dẫn', 'manage_options', 'my-optionpage-docs', 'my_settings_page_link', 'dashicons-welcome-write-blog', 56 );
  }
}
add_action('admin_menu', 'my_create_menu_link');

if(!function_exists('my_settings_page_link')){
function my_settings_page_link() {?>
  <form id="page_link" method="post" action= "options.php">
    <?php settings_fields( 'my-settings-group-2' ); ?>
    <div class="wrap">
      <h2 class="title-link-setting">Điền mã nhúng video</h2>
      <div class="input_docs"><textarea name="link_video" placeholder="Mã nhúng" style="width: 100%;height: 5em;margin-top: 15px;"><?php echo get_option('link_video');?></textarea></div>
      <div class="group_2_option">
        <h2 class="title-link-setting">Ẩn Menu Quản Trị</h2>
        <div class="side_bar_op">
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-tagcloud"></div><label>Ẩn Chân Trang</label><input name="hidden_block" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_block' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-admin-comments"></div><label>Ẩn Phản Hồi</label><input name="hidden_comment" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_comment' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-email"></div><label>Ẩn Form Liên Hệ</label><input name="hidden_ctf7" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_ctf7' )  ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before"><img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/admin/admin-icon.png" alt=""></div><label>Ẩn Justified Gallery</label><input name="hidden_dgwt" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_dgwt' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-admin-appearance"></div><label>Ẩn Giao Diện</label><input name="hidden_themes" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_themes' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-admin-plugins"></div><label>Ẩn Plugin</label><input name="hidden_plugins" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_plugins' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-welcome-widgets-menus"></div><label>Ẩn Custom Fields</label><input name="hidden_acf" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_acf' )  ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-admin-tools"></div><label>Ẩn Công Cụ</label><input name="hidden_tool" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_tool' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons-before dashicons-admin-generic"></div><label>Ẩn Security</label><input name="hidden_itsec" type="checkbox" value="1" <?php checked( '1', get_option( 'hidden_itsec' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons dashicons-update"></div><label>Tắt Update</label><input name="turn_off_update" type="checkbox" value="1" <?php checked( '1', get_option( 'turn_off_update' ) ); ?> />
        </div>
        <div class="input_docs"><div class="wp-menu-image dashicons dashicons-star-filled"></div><label>Mode Giáng Sinh: </label><input name="mode_theme" type="checkbox" value="1" <?php checked( '1', get_option( 'mode_theme' ) ); ?> />
        </div>
      </div>
      <div class="main_op_cus">
        <?php if (get_option('mode_theme') == 1) {?>
          <img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/admin/bg_giangsinh_admin.png" alt="">
        <?php }else{?>
          <img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/admin/bg_macdinh.png" alt="">
        <?php } ?>
        
      </div>
      </div>
      <p class="submit">
       <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </p>
  </div>
  </form>
<?php }
}
/*Hướng dẫn box*/
function nt_add_widget_media(){
  wp_add_dashboard_widget('nt-media', 'Hướng dẫn quản trị', 'nt_create_admin_widget_media');
}
add_action('wp_dashboard_setup','nt_add_widget_media');
function nt_create_admin_widget_media(){
  echo '<div class="video-wrapper">';
  echo get_option('link_video');
  echo '</div>';
}
function custom_admin_js() {?>
  <style type="text/css">
    .acf-image-uploader .image-wrap{
      height:350px !important;
      overflow:hidden;
    }
    .video-wrapper {
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
    }
    .video-wrapper video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
    .video-wrapper iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
    body {
      overflow-x: hidden;
    }
    table #home-description {
      display: none;
    }
    .group_2_option {
      padding: 20px;
      background: #cccccc;
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
    }
    .group_2_option .title-link-setting {
      font-weight: 900;
      font-size: 23px;
      text-transform: uppercase;
      color: rgb(8, 94, 15);
      width: 100%;
    }
    .group_2_option .input_docs {
      display: flex;
      align-items: center;
      padding: 0 10px;
      cursor: pointer;
    }
    .group_2_option .input_docs input {
      margin: 0;
      margin-left: auto;
    }
    .group_2_option .input_docs:hover {
      background: #000;
    }
    .group_2_option .input_docs:hover label {
      color: #00b9eb;
    }
    .group_2_option .side_bar_op {
      width: 220px;
      padding-top: 5px;
      background-color: #23282d;
    }
    .group_2_option .input_docs label {
      font-size: 14px;
      font-weight: normal;
      padding: 10px 0;
      color: #eee;
      margin-left: 8px;
    }
    .group_2_option .main_op_cus {
      width: calc(100% - 220px);
    }
    #toplevel_page_wc-admin-path--analytics-overview,
    #toplevel_page_woocommerce-marketing {
      display: none;
    }
    .main_op_cus img {
      width: 100%;
      height: auto;
    }
  </style>
<?php }
add_action('admin_footer', 'custom_admin_js');

if (get_option('mode_theme') == 1) {
  function custom_admin_js_mode(){ ?>
    <style type="text/css">
      .wrap>h1:first-child,
      #plugin-fw-wc h2 {
        color: #ff2805 !important;
        font-weight: bold !important;
        text-align: center !important;
        text-transform: uppercase;
        width: max-content;
        margin: 0 auto;
        border-bottom: 1px solid;
        padding: 8px 20px;
      }
      body.wp-admin.index-php {
        background-image: url('<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/admin/crestock-bg-admin.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 30% 79%;
      }
      body.wp-admin:not(.index-php) {
        background-image: url('<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/admin/crestock-bg-admin.jpg');
        background-size: cover;
        background-repeat: repeat;
        background-position: center bottom;
      }
      body #wpcontent {
        padding-left: 0 !important;
        z-index: 9;
        position: relative;
      }
      body:not(.index-php) #wpbody {
        background: #ffffffd9;
        height: 100%;
      }
      .nav-tab-wrapper.yith-nav-tab-wrapper {
        padding-left: 160px !important;
      }
      #plugin-fw-wc h2 {
        margin-bottom: 10px;
      }
      #adminmenuwrap {
        z-index: 99;
      }
      #wpbody-content {
        padding: 0 15px;
      }
      #footer-left {
        color: #fff;
      }
      #footer a {
        color: yellow;
      }
      .group_2_option .main_op_cus {
        width: calc(100% - 220px);
        background: url('<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/admin/bg_giangsinh_admin.png') no-repeat;
        background-size: 100% auto;
      }
    </style>
    
  <?php }
  add_action('admin_footer', 'custom_admin_js_mode', 10);
}

//Hiden Help Tab
add_filter( 'contextual_help', 'wpse50723_remove_help', 999, 3 );
function wpse50723_remove_help($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}

// hide update notifications
if (get_option('turn_off_update') == 1) {
  function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
  }
  add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
  add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
  add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes
  //add_filter('admin_menu', 'admin_menu_filter',500);
}

function wcs_remove_submenus() {
    global $submenu;
    global $menu;
  // dashboard menu
    unset( $submenu['index.php'][10] ); // removes updates
    unset( $submenu['themes.php'][5] ); // removes themes
    unset( $submenu['themes.php'][15] ); // removes theme installer
    unset( $submenu['themes.php'][6] ); // Xoá Cutomize
    unset( $submenu['themes.php'][20] );
    $menu[26][0] = 'Chân Trang';
}
add_action( 'admin_menu', 'wcs_remove_submenus' );
//xóa menu p1
function remove_menus(){  
  remove_menu_page( 'jetpack' );                   //Jetpack*
  if (get_option('hidden_comment') == 1) {
      remove_menu_page( 'edit-comments.php' );          //Comments
  }
  if (get_option('hidden_plugins') == 1) {
      remove_menu_page( 'plugins.php' );                //Plugins
  }
  if (get_option('hidden_tool') == 1) {
      remove_menu_page( 'tools.php' );                           //Tools
  }
  if (get_option('hidden_acf') == 1) {
      remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Customfield
  }
  if (get_option('hidden_block') == 1) {
      remove_menu_page( 'edit.php?post_type=blocks' ); // Block
  }
  if (get_option('hidden_themes') == 1) {
      remove_menu_page( 'themes.php' );                //Plugins
  }
}
add_action( 'admin_menu', 'remove_menus' );
// Xóa menu
function wpse_136059_remove_menu_pages() {
  remove_menu_page( 'edit.php?post_type=acf' );
  remove_menu_page( 'flatsome-panel' );
  if (get_option('hidden_dgwt')) {
    remove_menu_page('dgwt_jg_settings');
  }
  if (get_option('hidden_ctf7')) {
    remove_menu_page('wpcf7');
  }
  if (get_option('hidden_itsec')) {
    remove_menu_page('itsec');
  }
}
add_action( 'admin_init', 'wpse_136059_remove_menu_pages' );   //Flatsome Panel
//remove woocommerce
function plt_hide_woocommerce_menus() {
  //Hide "Marketing".
  remove_menu_page('wc-admin&path=/marketing');
  //Hide "Analytics".
  remove_menu_page('wc-admin&path=/analytics/revenue');
  //Hide "Analytics → Revenue".
}
add_action('admin_menu', 'plt_hide_woocommerce_menus', 71);

// Remove Editor 5.1.1
add_filter('use_block_editor_for_post', '__return_false');

//add banner
function customizer_a( $wp_customize ) {
  // Tạo section
  $wp_customize->add_section (
  'section_kmsp',
    array(
      'title' => 'Banner Breadcrumb',
      'description' => 'Banner Breadcrumb',
      'priority' => 1
    )
  );
  $wp_customize->add_setting( 'img-upload' );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'img-upload',
      array(
        'label' => 'Banner Breadcrumb',
        'section' => 'section_kmsp',
        'settings' => 'img-upload'
      )
    )
  );
}
add_action( 'customize_register', 'customizer_a' );

/*Show title and price next product*/
if(!function_exists('flatsome_next_post_link_product')) {
  function flatsome_next_post_link_product() {
  global $post;
  $next_post = get_next_post(true,'','product_cat');
  if ( is_a( $next_post , 'WP_Post' ) ) { ?>
  <li class="prod-dropdown has-dropdown">
    <a href="<?php echo get_the_permalink( $next_post->ID ); ?>"  rel="next" class="button icon is-outline circle">
      <?php echo get_flatsome_icon('icon-angle-left'); ?>
    </a>
    <div class="nav-dropdown navvvvv">
      <a title="<?php echo get_the_title( $next_post->ID ); ?>" href="<?php echo get_the_permalink( $next_post->ID ); ?>">
        <?php echo get_the_post_thumbnail($next_post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' )) ?>
        <p class="titpro_nextpreview"><?php echo get_the_title( $prev_post->ID ); ?></p>
        <!-- <p><?php //global $product; $pricenext = get_post_meta( get_the_ID(), '_regular_price', true); echo $pricenext; ?></p>
        <p><?php //global $product; echo $id = $product->get_id(); ?></p> -->
      </a>
    </div>
  </li>
  <?php }
  }
}

if(!function_exists('flatsome_previous_post_link_product')) {
  function flatsome_previous_post_link_product() {
  global $post;
  $prev_post = get_previous_post(true,'','product_cat');
  if ( is_a( $prev_post , 'WP_Post' ) ) { ?>
  <li class="prod-dropdown has-dropdown">
    <a href="<?php echo get_the_permalink( $prev_post->ID ); ?>" rel="next" class="button icon is-outline circle">
      <?php echo get_flatsome_icon('icon-angle-right'); ?>
    </a>
    <div class="nav-dropdown">
      <a title="<?php echo get_the_title( $prev_post->ID ); ?>" href="<?php echo get_the_permalink( $prev_post->ID ); ?>">
      <?php echo get_the_post_thumbnail($prev_post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' )) ?></a>
      <p class="titpro_nextpreview"><?php echo get_the_title( $prev_post->ID ); ?></p>
      <!-- <p><?php //global $product; $pricenext = get_post_meta( get_the_ID(), '_regular_price', true); echo $pricenext; ?></p> -->
    </div>
  </li>
  <?php }
  }
}
 
// Replace stock woocommerce
add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
  global $product;
  if ( $_product->is_in_stock() && $product->get_stock_quantity() > 2 ) {
  $availability['availability'] = sprintf( __('(Còn %s sản phẩm)', 'woocommerce'), $product->get_stock_quantity());
  }
  if ( ! $_product->is_in_stock() ) {
  $availability['availability'] = __('Sorry, All sold out!', 'woocommerce');
  }
  return $availability;
}

function cntt_wc_custom_get_price_html( $price, $product ) {
  if ( $product->get_price() == 0 ) {
    if ( $product->is_on_sale() && $product->get_regular_price() ) {
      $regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );
      $price = wc_format_price_range( $regular_price, __( 'Free!', 'woocommerce' ) );
    } else {
      $price = '<span class="amount-custom">'.'<a href="tel:'.get_option('phone').'" id="contact-product">'. __( 'Liên hệ', 'woocommerce' ) .'</a>'. '</span>';
    }
  }
  return $price;
}
add_filter( 'woocommerce_get_price_html', 'cntt_wc_custom_get_price_html', 10, 2 );

// Add lightbox if product dont have price
function popup_form_contact(){
  echo do_shortcode('[lightbox id="popup-form" width="400px" padding="0px"][contact-form-7 id="79" title="popup form"][/lightbox]');
}
add_action('wp_footer', 'popup_form_contact');

// custom fields check out woocommecere customize
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_last_name']);
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_city']);
  return $fields;
}
add_filter( 'woocommerce_billing_fields', 'remove_required_fields');
function remove_required_fields( $fields ) {
  $fields['billing_email']['required'] = false;
  $fields['billing_state']['required'] = false;
  $fields['billing_address_2']['required'] = false;
  $fields['billing_last_name']['required'] = false;
  $fields['billing_company']['required'] = false;
  $fields['billing_country']['required'] = false;
  $fields['billing_city']['required'] = false;
  return $fields;
}
add_filter('woocommerce_default_address_fields', 'override_address_fields');

function override_address_fields( $address_fields ) {
  $address_fields['first_name']['placeholder'] = 'Họ tên *';
  $address_fields['address_1']['placeholder'] = 'Địa chỉ *';
  return $address_fields;
}
add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );

function override_billing_checkout_fields( $fields ) {
  $fields['billing']['billing_phone']['placeholder'] = 'Số điện thoại *';
  $fields['billing']['billing_email']['placeholder'] = 'Email';
  return $fields;
}

// Add widget bottom single product
register_sidebar(array(
  'name' => 'Bottom single product',
  'id' => 'bottom-single-product',
  'description' => 'Sử dụng module HTML tùy chỉnh thêm shortcode [woocommerce_recently_viewed_products] để hiển thị slider sản phẩm đã xem',
  'before_widget' => '<div class="sp_dx related-products-wrapper row">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">',
  'after_title' => '</h3>'
));
// Sản phẩm đã xem ở footer single product
function rc_woocommerce_recently_viewed_products( $atts, $content = null ) {
  // Get shortcode parameters
  extract(shortcode_atts(array(
    "per_page" => '6'
  ), $atts));
  // Get WooCommerce Global
  global $woocommerce;
  // Get recently viewed product cookies data
  $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
  $viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
  // If no data, quit
  if ( empty( $viewed_products ) )
    return __( '<p>Bạn chưa xem sản phẩm nào !</p>', 'rc_wc_rvp' );
  // Create the object
  ob_start();
  // Get products per page
  if( !isset( $per_page ) ? $number = 10 : $number = $per_page )
  // Create query arguments array
    $query_args = array(
    'posts_per_page' => 10,
    'no_found_rows'  => 1,
    'post_status'    => 'publish',
    'post_type'      => 'product',
    'post__in'       => $viewed_products,
    'orderby'        => 'DESC'
  );
  // Add meta_query to query args
  $query_args['meta_query'] = array();
  // Check products stock status
  $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
  // Create a new query
  $r = new WP_Query($query_args);
  // If query return results
  if ( $r->have_posts() ) {?>
    <div class="rc_wc_rvp_product_list_widget product-carousel">
    <?php
    // Start the loop
    while ( $r->have_posts()) {
    $r->the_post();
    global $product; ?>
    <!-- Templete customize product -->
      <div class="product-small product box-text-products ">
        <div class="product-top">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail("full",array( "class" => "product-image" ,"title" => get_the_title(),"alt" => get_the_title() ));?>
          </a>
        </div>
        <div class="product-bottom">
          <p class="product-prices">
            <span class="name product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
            <span class="woocommerce-Price-amount amount amount-custom"><a href="tel:<?php echo get_option('phone');?>" id="contact-product"><?php if ($product->get_price() == NULL) {
              echo "Liên hệ";
              }else{
              echo $product->get_price_html();
            } ?></a></span>
          </p>
        </div>
      </div>
    <?php }
    }
  // Get clean object
  $content .= ob_get_clean();  
  // Return whole content
  return $content;
}
// Register the shortcode
add_shortcode("woocommerce_recently_viewed_products", "rc_woocommerce_recently_viewed_products");

// define the woocommerce_after_single_product callback 
function action_woocommerce_after_single_product(  ) { 
  dynamic_sidebar('bottom-single-product');
}; 
add_action( 'woocommerce_after_single_product', 'action_woocommerce_after_single_product', 10, 0 ); 

// Custom share
function my_link_here(){ ?>
  <div class="social-icons share-icons share-row relative">
    <span>Chia sẻ:  </span>
    <div class="zalo-share-button" data-href="<?php echo get_permalink(); ?>" data-oaid="579745863508352884" data-customize=true></div>
    <a href="//www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" data-label="Facebook" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip facebook tooltipstered"><i class="icon-facebook"></i></a>
    <a href="//twitter.com/share?url=<?php echo get_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip twitter tooltipstered"><i class="icon-twitter"></i></a>
    <a href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip pinterest tooltipstered"><i class="icon-pinterest"></i></a>
    <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip linkedin tooltipstered"><i class="icon-linkedin"></i></a>
  </div>
  <?php }
add_shortcode( 'my_link_shortcode', 'my_link_here' );

// Custom isocal ALL WEB
function all_isoca_page(){ ?>
<li class="html header-social-icons">
  <div class="social-icons follow-icons">
    <a href="<?php echo get_option('fanpage');?>" target="_blank" rel="nofollow" class="icon facebook"><i class="icon-facebook"></i></a>
    <a href="mailto:<?php echo get_option('gmail');?>" rel="nofollow" class="icon email"><i class="icon-envelop"></i></a>
    <a href="<?php echo get_option('youtube');?>" target="_blank" rel="nofollow" class="icon youtube"><i class="icon-youtube"></i></a>
    <a href="<?php echo get_option('instagram');?>" target="_blank" rel="nofollow" class="icon instagram"><i class="fab fa-instagram"></i></a>
    <a href="<?php echo get_option('messenger');?>" target="_blank" class="icon messenger"><i class="fab fa-facebook-messenger"></i></a>
  </div>
</li>
<?php }
add_shortcode( 'my_isocal', 'all_isoca_page' );

// Setting Smtp websiter
add_action( 'phpmailer_init', function( $phpmailer ) {
  if ( !is_object( $phpmailer ) )
  $phpmailer = (object) $phpmailer;
  $phpmailer->Mailer     = 'smtp';
  $phpmailer->Host       = 'smtp.gmail.com';
  $phpmailer->SMTPAuth   = 1;
  $phpmailer->Port       = 587;
  $phpmailer->SMTPSecure = 'TLS';
  $phpmailer->FromName   = 'CNTT Việt Nam - Dịch vụ chăm sóc website chuyên nghiệp';
  // $phpmailer->Username   = 'dulieuweb.cntt@gmail.com';
  // $phpmailer->Password   = 'zflkfmxppfjwupkn';
  // $phpmailer->From       = 'dulieuweb.cntt@gmail.com';
  $phpmailer->Username   = 'phamductdh92@gmail.com';
  $phpmailer->Password   = 'okbdxevxpfywilil';
  $phpmailer->From       = 'phamductdh92@gmail.com';
});


// Chuyển font chữ soạn thảo sang px
if ( ! function_exists( 'hiepdesign_mce_text_sizes' ) ) {
  function hiepdesign_mce_text_sizes( $initArray ){
    $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
    return $initArray;
  }
  add_filter( 'tiny_mce_before_init', 'hiepdesign_mce_text_sizes', 99 );
}

// Tạo box đăng nhập trong header customize
function login_menu_element( $nav_elements ) {
  $nav_elements['box_login_woo'] = __( '<span style="background-color: green;">Đăng ký - Đăng Nhập</span>', 'flatsome-admin' );
  return $nav_elements;
}
add_filter( 'flatsome_header_element','login_menu_element');
// function login_menu_template( $value ) {
//   if ( $value == $nav_elements ) {
//     echo do_shortcode('[show_loggedin_as]');
//   }
// }
// add_action( 'flatsome_header_elements','login_menu_template');

//Change option link
function option_customize(){
  global $wp_admin_bar;
  $icon_style = 'font: normal 20px/1 \'dashicons\';-webkit-font-smoothing: antialiased;padding-right: 4px;margin-top:3px;'; 
  $flatsome_icon = '<span class="dashicons dashicons-art" style="'.$icon_style.'margin-top:6px;"></span>';
  $wp_admin_bar->add_menu( array(
   'id' => 'flatsome_panel',
   'title' => $flatsome_icon.' Tuỳ Chọn',
  ));
  $wp_admin_bar->add_menu( array(
   'id' => 'theme_options',
   'title' => '<span class="dashicons dashicons-admin-generic" style="'.$icon_style.'"></span> Tuỳ Biến',
  ));
  $wp_admin_bar->add_menu( array(
   'id' => 'options_advanced',
   'title' => '<span class="dashicons dashicons-admin-tools" style="'.$icon_style.'"></span> Nâng Cao',
  ));
  $wp_admin_bar->remove_node('flatsome_panel_license');
  $wp_admin_bar->remove_node('flatsome_panel_support');
  $wp_admin_bar->remove_node('flatsome_panel_changelog');
  $wp_admin_bar->remove_node('flatsome_panel_setup_wizard');
  $wp_admin_bar->remove_node('flatsome-activate');
}
add_action( 'admin_bar_menu', 'option_customize' , 40);
// Disable Woocommerce Header in WP Admin 
add_action('admin_head', 'Hide_WooCommerce_Breadcrumb');

function Hide_WooCommerce_Breadcrumb() {
  echo '<style>
    .woocommerce-embed-page #wpbody .woocommerce-layout, .woocommerce-embed-page .woocommerce-layout__notice-list-hide+.wrap{
      padding-top:0;
    }
    .woocommerce-layout__header {
        display: none;
    }
    .woocommerce-layout__activity-panel-tabs {
        display: none;
    }
    .woocommerce-layout__header-breadcrumbs {
        display: none;
    }
    .woocommerce-embed-page .woocommerce-layout__primary{
        display: none;
    }
    .woocommerce-embed-page #screen-meta, .woocommerce-embed-page #screen-meta-links{top:0;}
    </style>';
}
remove_action( 'in_admin_header', array( 'WC_Admin_Loader', 'embed_page_header' ) );


function enqueuing_admin_scripts(){
  wp_enqueue_script('wp-google-media-driver', home_url().'/wp-content/themes/flatsome-child/js/translate-cloud-media.js');
}

add_action( 'admin_enqueue_scripts', 'enqueuing_admin_scripts' );
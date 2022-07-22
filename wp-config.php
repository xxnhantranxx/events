<?php
define( 'FS_METHOD', 'direct' );
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'events' );

/** Username của database */
define( 'DB_USER', 'events' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '123456' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'pw#I0UTF/?$7L0C LV51y]s U.K?c[F2Xr8z_O>f7w41d5KoPm.7? Rz.sCwQIso' );
define( 'SECURE_AUTH_KEY',  'h=HWt)T@67QCb&,Q,,ii4:^1hc9ntLeY]gp{cvr)$*7QW7&$QM&f@)>O-u`TDk`.' );
define( 'LOGGED_IN_KEY',    'XKYhd6#9Nj>X5<WhD3vLQVV.cD?2XoFskxw;Q[gA:z[bkA~0zLm7RDo<50[@^aFo' );
define( 'NONCE_KEY',        '}*4i6j=r{@.<,12{De78{;-q.-{%M3m,y:X:^0cstA,B:?c7cF$]7AJc &,++TNo' );
define( 'AUTH_SALT',        'we`;G,MXh9J95{d;9jE*kA#:I(tC|h`+$<(OsX{ljah_L,|/1cW<nwA;?Qdl]>I;' );
define( 'SECURE_AUTH_SALT', '4-)HTy8VS_qJ-P-K,2h$P{[s=@^:n::L-u=qX.Ods}z{dm]G*|j8*y4$Hkn)?@%4' );
define( 'LOGGED_IN_SALT',   'd9uhk3#6S`=N4`J,Fl^g<{p9d{m3WDev*iAP/tX)rs7H{(M)ab:hF~1#x%dhZL49' );
define( 'NONCE_SALT',       '!XxVc5D_GN0f]1@?#xMB7y2xexfQz(/L^0e${/1^<iTtWu7J8*,3[ <;$nC%U#ZY' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'cntt_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

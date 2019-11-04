<?php
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
define( 'DB_NAME', 'test30' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'miLxCE!4PFS&7M7p5ZkATw5hhx2EQ<8#tDJ;iB>?=#mkc>|LDY }C+GT>?L7c7S|' );
define( 'SECURE_AUTH_KEY',  'C;*,btxXH9Eo6K~yElh_>va+]B30JEX+e0O0Ld1t1eDx7niK`i}bsu}PSybZo[+K' );
define( 'LOGGED_IN_KEY',    'kzX%u3C(,D{8h4UJWm=:B4&T8VAr&O,Ht-QAu*SwfWSi8<WvK:kure;t&m giEqT' );
define( 'NONCE_KEY',        'VZyl^]r(a_v&Tv!Nk%-p.*6t[az$(_[Am*i8Xd6ODvScw#14UG,b;LlC2pO{ca1X' );
define( 'AUTH_SALT',        '.9h-p9sCSUMf5R0EIL$<DN4x[mvf%.;X!2:kE6F>U5*xu@YU 7iJ-&bv~3tNP$EX' );
define( 'SECURE_AUTH_SALT', '>]qH=/n^?re O?IjVq3=Ni,1+i$2Elo|epY82S ,JS;6Wac_r#)_x6T0P;6~OmH3' );
define( 'LOGGED_IN_SALT',   '*3oS)FV2M|ZI?ZR%S|&uh4kZ5$w<#*X=JxgeMrQ`NE`.|s#UgDJn%tK5/EwwbQ~+' );
define( 'NONCE_SALT',       'F<|en!.aSoPY5bov|&KPm9|cM*yzg-2pr=Rt!B@( A}L4[;@h*wbeZ/b:hwm8X[9' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

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

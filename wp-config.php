<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

define('WP_HOME', 'http://104.43.232.253/');
define('WP_SITEURL', 'http://104.43.232.253/');
 //define('WP_HOME', 'http://localhost/wordpress');
 //define('WP_SITEURL', 'http://localhost/wordpress');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dfc');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'dLZe{TjKBx={:>{GFR3Prnx%Gk}4kJyXRy<Q;qa3@H8f6ct=y46OvZ8{Vcqr M2(');
define('SECURE_AUTH_KEY',  ',w/AOt2P,nk7%l.-t_+am.g(l?#>-bAHYrdHP/YSxc()4g6NG#p6#FeJOB)%7XnS');
define('LOGGED_IN_KEY',    '3M%FqN_Smyb_h$_fFe(d56$?1]viS?VoA&s:4mO +-^pM@GYRYrwEt;A;jyv|/#Z');
define('NONCE_KEY',        'c+kHcx_x/Z!8rtdSxtO.5S y[-Wn:+QTXBg]Bb^sd[Wb.P>>Jh5}dNZbzBWghTLs');
define('AUTH_SALT',        '|-z& ,`_oITQ%4raUYAVgB(01c9R2vkKSENXkgN)|tX2})72ngX50#Rb$f8h(7Jb');
define('SECURE_AUTH_SALT', 'KIf%7%bV4F|?3OL8AeRe0V:4j[+i@jt]e.]?`g!me Z-&yX4;W&p-Y>F.~E9tzuz');
define('LOGGED_IN_SALT',   '7FlvV<j5Z(nC~.HWVBkV]PZb|-0kui4%vZ{Z<-2!(?)2qA|Cnld|agGt-&pTsehM');
define('NONCE_SALT',       'zP`l+-2XMVsp+0M|C|Tl}8ylqxWW#n_}8#G-<@.;],ww>nR9o`T7#liKWg1CQpS~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

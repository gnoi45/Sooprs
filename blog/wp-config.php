<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'shopndto_sooprs_blog' );

/** MySQL database username */
define( 'DB_USER', 'shopndto_nzb' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S@4)puPz98' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'gyoymi30abo89rdg2nwenzsve0dbb9h0cdfwobrgoxv87b7ka7bsag0nsrunwd1o' );
define( 'SECURE_AUTH_KEY',  'h6b81epfbgdkcwt7ac0aqpvalfud7el5ujd0vzhrwl5ebzigkfd83yqmajfmeo7i' );
define( 'LOGGED_IN_KEY',    'ptbr7juqj1hk8ag5ry7iqwllywxr4tz4qehfl8mym2ji6y634mmqmhufhv6li48g' );
define( 'NONCE_KEY',        'wvh2o82stfwvlujfhubfujpe3bexemcxozits8ulmupy7rfuuaf8qnqgm8yspu72' );
define( 'AUTH_SALT',        'vzu02c71ykq5c0zxbmgkbevbv3xapyc0k8lrhktepldks7rwkbnoe9hmkpjn0wm4' );
define( 'SECURE_AUTH_SALT', '6ihjg6rnoka4prtnha2eolp1qot0qxwixsx58o9iw70d9zk0a3lkiiugmpkynko9' );
define( 'LOGGED_IN_SALT',   'ixja00kjjvyqqtcitcxi3ku5oasakcka4dt20roil9scbixdeivziabyew2fvjrw' );
define( 'NONCE_SALT',       '7xdehyhwmovxlfnl4neshvq68xyfqwqrjtdvrz81feswuyb1apuvbmc0wojdg4xh' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpai_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

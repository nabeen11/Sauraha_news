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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sauraha_online' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'WP_ALLOW_MULTISITE', true );


define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/sauraha/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mA8|8`@|@%.cav1#jMRN(J,D|/Wl <p<?3DMVWkgw%<){>V7Fzg&P@.r[3$p/Fbd' );
define( 'SECURE_AUTH_KEY',  '2xC@qLc@H[npOw$egoCq`b1WQ7)-/-i58+$Eqanv46H`9CG3@7{J`Feh{|K}S_M0' );
define( 'LOGGED_IN_KEY',    'jZ]R`pQ[Nx1WI?7.%`)xK}t)!H~V|66od$3@vyXf8d9Dr;S7v`wiPinw>Th/!-EE' );
define( 'NONCE_KEY',        's?Hnm.j,EG6D6%/`2)gbRLp^&ZX=R/Ac.mpuLF}(<`g8#[u{$?~Fn:QH=)8#a=zi' );
define( 'AUTH_SALT',        '=yf{vVk0=oD/.Tb;I>M,$<eIk!i%<KTfYxq%&65Z:$sifs9Wn{,j<[hM-0_4><<u' );
define( 'SECURE_AUTH_SALT', 't>[Y_<zuke4J]:x[:QPjeul.pJPEX1^bJFRy20l3tC,0/|IQ|g7VdGrZ&8>>l+aO' );
define( 'LOGGED_IN_SALT',   'q9ocsL00[-G&q/sQ{,_9>N0Bq&cRPh}lqxp^;OEJ~4`dt, *`$w <(y[r{o8(,,m' );
define( 'NONCE_SALT',       '%dur:vuvC>uXa-s(_)-[s<:+36Y3T*V1;B]1H%RY(odN,rKMCvYeyk&IH;yRq/Kk' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

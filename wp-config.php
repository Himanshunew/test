<?php
define( 'WP_CACHE', true );




/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u334332733_vkN6F' );

/** Database username */
define( 'DB_USER', 'u334332733_xj37j' );

/** Database password */
define( 'DB_PASSWORD', 'sULeXvvaVv' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Rr8vC^LUl Jb:E&-+}Wd{J2#i)#@O=VL.EySPJ=G`lGBq{xwO[d6JjoDV9k}s_L(' );
define( 'SECURE_AUTH_KEY',   'fNPN#q$|sJv@`e]U,kI%mroO#a(LYb6Q{~hywLr@jeYDTg+c}(#2Ca3msiuBk&VO' );
define( 'LOGGED_IN_KEY',     'F6k/KoLDt_;FpY:PUn&W^`0YWX^WS>aT>i ZaxLW?bR| t1lwv][jp2JN_I5r7c)' );
define( 'NONCE_KEY',         '-4DH: z;~[DZB}{gVe~$+Q/-)lG&nKSF?1=%WMK+5~w+1n}rTz$R(oH!k25:f.{d' );
define( 'AUTH_SALT',         'dfCR%YOj;wOuk=xZUuX8a>AL8`sk}?@*BwZYO$cpJ`#d?-LCpjxsHsPHi%e-y]E.' );
define( 'SECURE_AUTH_SALT',  '4_{4$)F~UP^|NDV? 4z5;N~O_{QNp753y?bM*~q(Fuj;dJ$t&xS)Xl_SowzjB8rW' );
define( 'LOGGED_IN_SALT',    'RKi9l2Y,J;(voY55%RU /QG6Hvu@!P`>5USG38|USCUC|%}V4TCkT,}oj&*A~i|R' );
define( 'NONCE_SALT',        ' OU9<Z&`w~e;7;Bvp!xhB||u7kZQNh[*$P|KP3!SFFCdq%)rF?eP>}c}fg2@huD~' );
define( 'WP_CACHE_KEY_SALT', '4+4I 8<H]Mj$esP/dnN,2PIwB[X:{ge_+B/vX2dD,xJRY3f2G_?c8eIpG3[Ge#yM' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

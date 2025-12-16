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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

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
define( 'AUTH_KEY',          '3yt`CYX [{oT?Az!M]8&;MZg5^rOE5ITP2C+g$9/ Ue],q+|#w4H7@_^STW%4RYL' );
define( 'SECURE_AUTH_KEY',   '+*}Mp:SRavu-n:Xtd*p.&.a>wm5O$FM&BlZ5_ROEOjk{|Sr4s:MY,(F<z;ne$bdd' );
define( 'LOGGED_IN_KEY',     'TEUo+S!&/m)}zQ>Vrd^[@/#{S`BP_slQ#04f~L/scC&wxFbF)E!$fEWZSsgE:6WT' );
define( 'NONCE_KEY',         ')BQ*,.bTno:E,H|zdKo6G_J~:E/Y#n<8Ee1i_G)[LzjqnzqJp-j9b++C_E^tgq=5' );
define( 'AUTH_SALT',         'YMm*=VQO]0SdBuL&al2Y!YOJC5;S,S_*TVcgU9FB-X+Wu{zoXbQ]/GU(RSmvyG*A' );
define( 'SECURE_AUTH_SALT',  '9xPfAh9A99,,.h+-8oNly`K80T+=bt^lZtRAoBM1ZJf3YfEodMTOi]tN5]FQN*ZG' );
define( 'LOGGED_IN_SALT',    'Rp0K Udn(k{sD=Z^y_6CB;ztJMSZ&7!,~/gQ5Sg}#u*6TOx_GD}Z2mQKYX0SRWK.' );
define( 'NONCE_SALT',        'C.UM|N!S.1#^(.We>9VtlmyOk,8qC!<a%3~r/An_$5}#%p;r;$`_7[lq*(XJpNu)' );
define( 'WP_CACHE_KEY_SALT', 'q+Gg<..(R?TO9#{(_GYWIh_tB]6wsT,*g{c7 Is-:fa7M,6q20bO~_0:npfz0,pu' );


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
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

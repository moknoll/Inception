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
define( 'AUTH_KEY',          'A#{Oo??t!UkL0Mx($OVg&^(AbG^n#jU+M:XcW;2{1&4SkZszB6r!7JldLrCDY]*5' );
define( 'SECURE_AUTH_KEY',   '8[l_bO=;7@Xfy7q9tsvvP-rmpIgMe}sr|Q>8vCwW<J9`TI#MmI8x&$x{i:VA:0*g' );
define( 'LOGGED_IN_KEY',     'C]$FA}NKC03]QRAPLMsQ,Q5W;Fte$mq;w^Apy7?oty87R3/EqC#PPrSAB4FS^E:B' );
define( 'NONCE_KEY',         'uw)U4vp-[qt9YeEKSoe`DPisKgXSLDxWZmzzQzcx:_#p{r2cIN31I4qlg-9$1~4^' );
define( 'AUTH_SALT',         ' bRSOoKB,] uQHq%&p:_BIP$dYgwlkf(yItZ@>kE>O^q:z i^g5Hl~ORe/aI=bwD' );
define( 'SECURE_AUTH_SALT',  '=K{E9jd1%yCv{`]gUF$^bo|tfi%f]9Ao$B;T(,VSj+-T<d31.pknSzk$=^xa{^J<' );
define( 'LOGGED_IN_SALT',    'Ez!HGWp?tAe,fa>@*iCW<};fG?42,D%-x]`)c7H9wZbw+(A$YMNGHl.9.)#)E-Ri' );
define( 'NONCE_SALT',        '5Y^:}<e%)Ibd_XX+!+RUW#Elj~w9j9{hT9;<0>]$ /-[Zu)&tR!*E>X5)KJVT|lP' );
define( 'WP_CACHE_KEY_SALT', '7CD)_V^~xDd;t.F?sA6c_n;ukG{UY^<4>C2Non[xlGJw>:n]jzc@-gQ0c2Kel,?#' );


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

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
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', '/GERkG2UmO9tCjJgOnS4GeHS' );

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
define( 'AUTH_KEY',          'FR?:hBonH_(7VGY4@DCjq=zp&4@Y*^yr$YUZT[upmiT:g-drjc0jYr.|VjSQ>JB)' );
define( 'SECURE_AUTH_KEY',   'C5h5gYELxoQ2i/l+&|mx-un1CznUCW]z*ll/_I3q,CuqcfD,;&@7i]r5n&*@~n:D' );
define( 'LOGGED_IN_KEY',     'O%0yur4+>Lm;k]*`jK!]Flc`Dp3I;InQsjeClIw|vPkZpIxOBd-%<a9||CtShc$A' );
define( 'NONCE_KEY',         'kK@v}.aa-eY:>y=UAp}Kf5h9M5yZmX*dt![py&Y$_q:1lbDd%dxnDy)=ABC+h(#8' );
define( 'AUTH_SALT',         'v! l0UJ#@In!RP:OKI:_)>3^A1&Fjl+fa0RsutiZz0-}pG){_}+<B3V*[=An}rTA' );
define( 'SECURE_AUTH_SALT',  '|TU;qR-EF#-G&0^>l4Fvpd[O.0=#7:@4nDI <dlX@7Ijm?%2<cY7#Qt8!56y:kco' );
define( 'LOGGED_IN_SALT',    '^:WV5sn* hQkD^,lVVXcwN*ii]P~4AaZ5u$rw{by5I$TQ-U#SqQd;H#q%1K&^ C<' );
define( 'NONCE_SALT',        '6GZy+|dqFEKIuj)|E[>c)yMv}y:?v=_!|lQO)VY$NzH7;2A0uC~hKgrNw[CTr2==' );
define( 'WP_CACHE_KEY_SALT', 'V0pI:EzLxsJM[Saf~am7y^qzG<#Q(Bj3plr9BB{ wBp/G>LII#>yZb)(O_:;8FzH' );


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

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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'w4' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',         'n;#rB6D{dAHTn+#3o(K6@E.xZ<>JaIPw*CP)Npj|SX*Z-yz/ZR|<7[TY|O8qm!x+' );
define( 'SECURE_AUTH_KEY',  'qM}zs:1rQP[av06@je=9Rh/#x.h+#VHYa1nuwUp]`-&eYu8fzu528cM{vfVy0#~C' );
define( 'LOGGED_IN_KEY',    'x/p,8ggC~7Vn!p8]IF/SxS[^iUBM&;W#IhNjdii;P`yLZ-F%+tF&4CQZtT(%Q@UH' );
define( 'NONCE_KEY',        '#X6f}WryXR@l_u0%7]8^yIFk2_^.sv7ocIfbmy3d30jy^hMu{u#3|,F{.P;ng-}X' );
define( 'AUTH_SALT',        'w13Oda.:^{ WPq6sh03c=MNG%T%Uqz}qtNNA^DsvU8_z*[&<|Z9$jIOj[^w2Cvci' );
define( 'SECURE_AUTH_SALT', 'A</[I-h 6tzE;d9:m-2h?~5Oj9CYhr{2MR}34%!Kp0}b1V~/5+:w/!%Cr [-`)nH' );
define( 'LOGGED_IN_SALT',   'o@&}Y3ng5BsZ~>(`^i:x5tH53QfR~#vN 7)~ltn:/mpITOsMe~7nSbh8{wwNOK-,' );
define( 'NONCE_SALT',       'vwmUa4A3;Wz<(/RY<zj--~mT^Ea_Sgvd[7q&4U|Bw9ij_<Z2I]do/Xx;9VGl.lBK' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'w_';

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

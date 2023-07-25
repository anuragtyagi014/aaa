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
define( 'DB_NAME', 'aaa' );

/** MySQL database username */
define( 'DB_USER', 'aaa' );

/** MySQL database password */
define( 'DB_PASSWORD', 'aaa#50#' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'FS_METHOD', 'direct' );
set_time_limit(600);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Fsp;$W/7K*7|224E|c|6.aC(XBokAC/lkU6|H{}wmm`@1ZCT:uPMpT*< hIoxt<z' );
define( 'SECURE_AUTH_KEY',  '-h]~rD71a)U_;J|U<U%J4&6R}JXXX=t$;_;)GBE:V127MW]/r#*3#f%@hr,#(dH0' );
define( 'LOGGED_IN_KEY',    'GPme(L7 hRIiZCxdc>+[HfK={+>:1/FP5S^gZ0Y(d5;}7S b2p8WtC|qAoaN;z6q' );
define( 'NONCE_KEY',        '5L.GH].)W&wu[J^%YjIPqmf?!RV,=VU6vW-R=;P?<W~=je+8(l`V(h4KratZTJ1b' );
define( 'AUTH_SALT',        '3(hC_29r/7}n.[&7N{pdcI@~pQxJ3aAnn{)M6!MX{VB]Uyn_a<Jg.dt)zN<`AW5Q' );
define( 'SECURE_AUTH_SALT', '!ZPi|+#,6f^~eq!d5P?1o%C(>h_n2cLT*I-HWdY>KLvOoJ!mOAQNa[aM( -P3Fm;' );
define( 'LOGGED_IN_SALT',   '<8@V^KybLPP@543-a//chD#N^;o(}iiY=;~cs@~PN|p2!6b1@WQ_rtYw7T1-qx>_' );
define( 'NONCE_SALT',       'bMxnMh2#VB-4{GlSx>GnsVi((yOl.sFObS99e_kv_bkW8u~r:mXTijC;P6;WZIy4' );

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

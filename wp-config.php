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
define( 'DB_NAME', 'dell_evento' );

/** Database username */
define( 'DB_USER', 'user_external' );

/** Database password */
define( 'DB_PASSWORD', '@OkC_2022*Serv3r' );

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
define( 'AUTH_KEY',         'Tld7N`/^ZpC CY$WkM21R?4h!-+HWC@f_Sgi=-@R|L+pWw#l+n0]ZU~oJjl4Ko:C' );
define( 'SECURE_AUTH_KEY',  't(uxl$l-p}M}91b<ccC5!Re4J;9T-3#l}bpW UBRioSf`~{J}+Ji6gD]Fs%.L&PC' );
define( 'LOGGED_IN_KEY',    'y$s~*d%b q%%x1pinFENfFtV&mu#JSD8)sv$dd/$1:Yd5xC8{jAyTwtI1#CMIJZ ' );
define( 'NONCE_KEY',        'Kddgj[R0SdxOGJS&Q=y?sC|RTRgEVAn_72G>2+mF%2+p/eu0j .`YFue^s6I93fY' );
define( 'AUTH_SALT',        '@mM#J5+.EM[jVkJ8EI#t`yt|+1BJiqPn]UM;aZFitZGD[sC~:VDasdW(A;rw4wl*' );
define( 'SECURE_AUTH_SALT', '&=vRp ({.RRzB&3F<Ni&_m!icd`Uvv;l</h(D]b(19:1IwN=JXh&y1H-[#m>_/U]' );
define( 'LOGGED_IN_SALT',   'G]qN4SAS*hVPG?dj;dc3saMjNkI>zNQk>,el9kk3R vVW.ms^mx^{cC[a&K%(.h7' );
define( 'NONCE_SALT',       '6o XcGisb,#`W.&iOzwgp}mR*X;Wk01CPXA#51-r(N4;eOON_V6a{?zsq,TA@~]]' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'V4hKK1E.rr|`cns#@D@e@M%cOCT(0>V$+tQzFh[xE$;tB[%jvu^*/LVEuj!fmAI$' );
define( 'SECURE_AUTH_KEY',   'y!s<;|C6$nh .{>1etOXd5wRI)Eksz%%q:kJ<,,rcE*~+H?G/^!UsPCck Y9 X57' );
define( 'LOGGED_IN_KEY',     'P|(H~7L/Nftv`vFP2<HBgD6rzj ,%DW*cg^qGt/x/0U*@3v1Q*)G1e$>#tFy1wM/' );
define( 'NONCE_KEY',         'Yq&fN6M=R5/@gH Pv-z@A:n9UMl[Jk7h |+4ZAVthOCZWb]f^LXfiso%POt|H7!-' );
define( 'AUTH_SALT',         'CCYlt`Lw6b,7,7 C}Y[r]#$A*S1S<^pi/$jwHLz[a6O>sf^IlI`j(S^A.M7u;N|_' );
define( 'SECURE_AUTH_SALT',  'Es%Dw|6PQU7}H<w-:c19XU$Z%f^w>>*2bbY[}g0gf_IMJH?U7doz=tIMrxq7?ial' );
define( 'LOGGED_IN_SALT',    'U2m?+ER0fOC^]%}F5z3-2nY|4[F[<,je@GTD[%xTTWt[PuO2@S4pP3::5EiC;lJc' );
define( 'NONCE_SALT',        'a[4#`O>88y@ggt7i{c3fnZL/dPE6pU4ibS=v[rXk0{Y)TjutvDnx>2x5J!vaR}ul' );
define( 'WP_CACHE_KEY_SALT', '8O7-K-V*RJA|X=j+hxY>@;Fznh!qxofhtZ{5:~epsGu$HBRcvH~ahcdsWe^APC-M' );


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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

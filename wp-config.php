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
define( 'DB_NAME', 'vape' );
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
define( 'AUTH_KEY',         'pu*O6l!y-&ve|OIgf7y2&4?3&$RDW<!;LJ`]^aw!h>)[E0dEl;%!TO{Y2cOcVsZq' );
define( 'SECURE_AUTH_KEY',  'nS>e5,{eVsZ;S!s%a!KR9OhPX3/uzQDvcCr)Q80Z@e/n3mfJJ.Yd7[>5}=}*(5kf' );
define( 'LOGGED_IN_KEY',    '[v$;@Wnr2$zCL3kyjZGUHTivbXN%U9]NIEj*ZG-$<@l?P4aDIumRCz.LdG9X+7[q' );
define( 'NONCE_KEY',        'b^itz3JNoKP5/R$yS4+i,z,C4V%K&ZCSV>n=7qXOhc1ruI#&v]KJ7[}Dktg*!S5O' );
define( 'AUTH_SALT',        'sp+%xl#zkA1+KQyo89+[$A|OQ:`n0(Gk$6340>*#}?bq-*qeqV1.oOH/z^=L2F-g' );
define( 'SECURE_AUTH_SALT', 'SdR@g$P2g6Nwzh2H@DtYw:pz!2&Wn.:TTpZ|scV)U[YECt >9,SlE&:{uKz5)b%z' );
define( 'LOGGED_IN_SALT',   'JNl:o|rd)%|T*XGk>#It_(k FQ/5Fmg-Q*h%DgYkX2U,c~eLI3c+/du|ia.[iSf#' );
define( 'NONCE_SALT',       '/9z.;oskA>05&D~z9@c)fqO&(phRy0yB2`:a00F_K#?%+/@XwlbBDU;Clb8/YykC' );
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
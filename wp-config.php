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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "rtbatteries_db" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define('AUTH_KEY',         'kVg,Xa7#afJmFz@ws _6KkkpVk#|`|S.ezft$/E|UE{|p-,q7H(1rg5^VE*Sj2|)');
define('SECURE_AUTH_KEY',  'wIm~gXOua1M*%>T3-2)G3#jt-~|b2*qSfPPU7<)<09H/@5oH=u5?3}EK{>6$D!pu');
define('LOGGED_IN_KEY',    '&vdGfBuTJ%0-&JWO<gt7w2k#d%C*o*5#-5ucTv+<rBmF0+5>$YF|%8GTD.i6/~xo');
define('NONCE_KEY',        'j0yF<47m-ynIhpWGuf.+4Fx0a])1`#kW`|Lm)f/s$`Fbr[5&4cH0gh Q:#BK(VFX');
define('AUTH_SALT',        '%la?K@L8Y%!.*L7G)+o- U;[v]?`|,W*}eR:z+u67:+CY:.n+g^f+@^;[nM}vIF+');
define('SECURE_AUTH_SALT', '!0:LC|V,9W1`N:-~A-e;AD2p-|UF1l_zH`t9tBM_[LG+c)oQPm@NumHDV^2+Qe88');
define('LOGGED_IN_SALT',   'sta(G_eF|3s#6mB US(0w*Dbb_6g aav+3_K(Z0!.af(q|%.N+Qx~amqzX:-8e#(');
define('NONCE_SALT',       '=K8Sn| bl^]; .ti7lLLV6,HzC a)REHu1jA=+HG`%A.$TM6Srmve{+5+w ijl/n');

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_SITEURL', 'http://rtb/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

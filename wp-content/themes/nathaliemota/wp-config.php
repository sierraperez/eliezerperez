<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eliezerperez' );

/** Database username */
define( 'DB_USER', 'eliezerperez' );

/** Database password */
define( 'DB_PASSWORD', 'P@sswordb2025' );

/** Database hostname */
define( 'DB_HOST', 'mysql.eliezerperez.com' );

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
define( 'AUTH_KEY',         'g9O;G9*bh;dP|?2!^JfP(z<vI8>f{^B/a/X%  -CYt)}Lg .pRHnoD++(r_pt&vk' );
define( 'SECURE_AUTH_KEY',  'ppj28mX1eZv7BNzuog(?W.]h<UpEr,}Tr$e?3+<D90+pFa.qMQ,lu1$5)tk,d@w6' );
define( 'LOGGED_IN_KEY',    'LaO8w;`z6q(_72S]wNG`%!DC+!=4w{g2Tm#s<]BUv,0cE=w^OM2E`.g)6 %q8ed^' );
define( 'NONCE_KEY',        '$|>30DNMRcPjK8nL4 ?`LLbhZ^,g<F-WUM)@@LHQAW|Y8A<Ze3cXfw1aTE`#DXyg' );
define( 'AUTH_SALT',        'FTr;0yxxJe(L-|K{IaepZFw6pt[.W)Iph+8ebsJZs3:}w~7<n,~TT]s8bPhLD{!Q' );
define( 'SECURE_AUTH_SALT', 'o:j01CD#!GPyAj24Wx{[+nbh>?t{hodI;ITT%5jG}qf,-_kra(MhnF,dx7C+{Q$C' );
define( 'LOGGED_IN_SALT',   'M~R.C_1X3,#&0Z7uV4:ad#IKYac<-n/R0t&ye+~B/bZWH0bP8G.(>}M.kK#<uRJq' );
define( 'NONCE_SALT',       'g,$hmaTNaJx;l/TB9T0|={}8^556?JQ5W_s% uipT%xCNuBQG})y`Se$DNGB-fS;' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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

@ini_set('upload_max_filesize', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

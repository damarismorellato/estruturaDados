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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'portifolio');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(29YsFBV0;!yqxqhYFR49`quL_7# ,vbv kfX7e~lp8G;GE/-%3&}R~hE@kx+QNG');
define('SECURE_AUTH_KEY',  '(9TN@y1vG<VIM]4|i9-El@O^v~iRGjHOQVkIOZA{)r3=)VTu76;LuA$IkLP>/9}m');
define('LOGGED_IN_KEY',    'b[ZiCLeG1wC-pb0;{)ikXawF1_!w2qOEV)67oHh>2$]hj3MQ+e3-M,:6{>3Ah`MG');
define('NONCE_KEY',        ']d>)O3ijg4mVuz7<wX>c^,gWH$u&5:+q`TpwIUNxpq!_YLU#a7xh(h/8Bz/44ayk');
define('AUTH_SALT',        '/W_/L,fDS{z1#/>LCYg36!W9){T-)D+%W^_J.6a}A@5Fp*0eAQSg7g9.|3Nc%Hg_');
define('SECURE_AUTH_SALT', '*><UU0[(:$+zV0`Mfdlad>{L)dqmDM%yytDS7<f7air~+};70O< cfp&Pg#E@@K2');
define('LOGGED_IN_SALT',   '|[05BM8p`Hr~GyC5w ;,P18G`v%~0{bDvb/J%h=C$X=v9zf!b+]HOD>L=JS3l#Dh');
define('NONCE_SALT',       'VO;d@h42*t: Hge!!l$:Ym;> S!e.c0Xk<lGT/#WTXA)6CEXV}D5WMeU9&`ISj,S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

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
define('DB_NAME', 'espacoellotie');

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
define('AUTH_KEY',         '4ymVt;&Q)L^w*@CTy-c)vyVBm.(9=KIT.$rnq;l~>R61up*7T?v7R/=8OqXe[0};');
define('SECURE_AUTH_KEY',  '^lc4:1vA}h{k_9xZo.=/#2R}`Sdc[-/V4-z~>zn8?<s3|j{BQ?qB7FBP8m[<f!.Y');
define('LOGGED_IN_KEY',    'W@CF7mYgNg0]}ehAkIvL:|17D9Cj,vN[1/TEb5HVijY3vNB;~j]n!I0Ej=d.67y.');
define('NONCE_KEY',        'm)=dn?-M1t*/LlRB8 y>%/y;pES5i:qpPg]] B+Q%3(1YN<?IZJ*IPIL2V]TV||Z');
define('AUTH_SALT',        'eeP6O~N30u4c6t;7SUS<1S.ThEZzDlD{$<ajAL,8N`_my$tn_HbG#,P:*DvkDJ^m');
define('SECURE_AUTH_SALT', '0Ub-E&9|X|e<23X(R9V*!3f*c|!0[fKO#5eAY5Nf!l]}C)tGLh!EgCCU8N:>q`9z');
define('LOGGED_IN_SALT',   'Q-^DjGec{*1UECY?lrclfR=U8I$(@ $q^:fJ-:q0z[hf+y/HQZ,:f)MxSJ2SHt%9');
define('NONCE_SALT',       '+H@%v]LJ%[l!.$]mvP|fRpzUpFH&/U7rLhc?QkG}Ab;+ct|]LHqqyl7:A;qFYu+,');

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

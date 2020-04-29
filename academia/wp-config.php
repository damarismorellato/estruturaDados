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
define('DB_NAME', 'academia');

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
define('AUTH_KEY',         'e8a2h42z]b<`ETNnM!S S?YU/_a3gWrN=Dl:}DBC(z{==Bb)s=sxL~Tl8fi`|ldW');
define('SECURE_AUTH_KEY',  '-F@IXA0-?QtwZa5ljY;GVpqYM~|7L~2C,:5^<U0R&)v-ri3A;h#D5ZH[rl=7<t&3');
define('LOGGED_IN_KEY',    'AJPy_;Kwnb,Kb,Hb5 351~F#@{<`+`UBE{TtA=6OD[.JeBhi<y~*qz8g,:5T!D&y');
define('NONCE_KEY',        'mk;2o=M] H2#<K0/YKIk3,F5!8K}gc2x)|WETv<`ze$DIiOquU1i6VJS2s$T~AD|');
define('AUTH_SALT',        'Ldh_kM{IGDunJG<!7BeRF{Mai8v&6*`)b?U}}|>Z8n[&ms!%Y21[=^i^)w%p$so,');
define('SECURE_AUTH_SALT', '2KC_P>VEn_w0p,4Q?X*ADB[SH!kc!+,]dd+J,<,2$JxH5W<Qwf?wy*;vSq)%oq={');
define('LOGGED_IN_SALT',   '8glXQuGfH+1J|X]%H%|Aw`*P,~&1s@< Tds+FgosK+ 0A#)qyiU>s+D1*_tt/k6+');
define('NONCE_SALT',       '1xb&K@s9_7UoO&EA>x9<!I~Ptyj7wd^%C021S2h<|tkYqoW4~8.3=O5m92XcC@s@');

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

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
define('DB_NAME', 'host');

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
define('AUTH_KEY',         'Q}Nw-Kq)[+h4!ori&sw]+$^C/4fQl72BnGqAm#zcw&u%WWh7#t/+F4jLm(GDuw4R');
define('SECURE_AUTH_KEY',  '$Hhy#6YGy~}0zmu,^piX#Z_)F4=wfk-NBT1N.1%JG8%.~d;0SW9>6k*clX}WPB75');
define('LOGGED_IN_KEY',    'd#^8[hvFP+$Te8*KdY1dZ/1s _)*X}&jZ:h] ZQ($~SX$QmiZzD1B<mdQV3sN%NS');
define('NONCE_KEY',        '9&dGRt3(2XGkpiD^j>-1i%DZ$0cusX[Ow6|PwAZHgELR^UR4qZGL!}o:v1rnEUSK');
define('AUTH_SALT',        '4T^}]#/#rc|4Hs`Ys$)?gN6VDP_vbpro.]>k)Ms>,ZT|R1Jn;/~Z#-N*m5NiVM$0');
define('SECURE_AUTH_SALT', 'ovhkm%xsx_^aa.%nf|+]nI7nq(m/,RIxr6(l2ZWB@^-{(3CR1&c-|5Oq53EU6z!e');
define('LOGGED_IN_SALT',   'YNbd4~x/e(yl.2K66aq^{Tq~24%n/O;**dEz[UPR(fpG#!9&n9CF}Ur/LiygZ6~9');
define('NONCE_SALT',       'K-^gbEx+8j0-w+& lY)Vp_POr$[I zs8!Yz!85iuFBB|iL_gRmQR!e`&UUsLTN&B');

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

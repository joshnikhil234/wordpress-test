<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'knolskape123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'M^b&xDrZmnkWs-Tg ),0cV5?w,X2l[.~/UzU%:u5sK2=M92yUX9H}PsF0&x(2y2h');
define('SECURE_AUTH_KEY',  '?-$]ie@1{>xsgNr8itMq[JN_2&Ve|CJNcR!3f H|PM&[xy#$phVnI2MZ.AG_hWo4');
define('LOGGED_IN_KEY',    'CUd>o%mtl1]X_8Q m4);a7e2X|q?f5Fzu9$WxPES%N%WV.I2V%*5TN<+lC|!;h5~');
define('NONCE_KEY',        'M&ms*^#^W)LcJQ/}[duk]iz_PkNj/n5R4oe]tC7a(WImqE@NXfbV0(7hO`MjtV.8');
define('AUTH_SALT',        '{MJA)]SkKM0g7H=fm:J+RDv5wG={oc`MDv+mSl*z]Fn&t#e^)|Nz[Wg$ $yii 0M');
define('SECURE_AUTH_SALT', 'sZp5]8CMXYf!bTBEB]A{-Ss!]abiL-&iY@mbLo<Cx/a{f)h:}n6;S$Nd!VJx|:,@');
define('LOGGED_IN_SALT',   'Ul`SD-*r*{4`ab.-&m?szV?!;R(^s7.=}4_jMuu+.fjkwC^-~#n~Le_j!]q/;zNX');
define('NONCE_SALT',       '@i`lamG`I|3^AE;t/a/P6ayE>fZQJ2`Q4b0o0Ch[j?_1I/oy;sPkhY~?FM#S4AkQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

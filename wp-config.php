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
define('DB_NAME', 'merperle.info');

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
define('AUTH_KEY',         'a/N7[-6]pu-.PDv#CpPvoM&)1M2a@|GG]R!rII3e`&0lYZa~EeR*ID(>{R#pM>5+');
define('SECURE_AUTH_KEY',  '$t%,=nfL&}d.$MRF3.%#*O_vEDs@&Vp4K_QcDG7J@`HDUJfb]P3imSdWj1!cv(Jd');
define('LOGGED_IN_KEY',    '0LQE0&gu/p&j`TCTRU>,a~.B6qOXB)g){Ub6@F-D[-OtLg[H4dav![4M F_97r[f');
define('NONCE_KEY',        'ZZu,;G?Zvx&kXtVjqPK(]1D-$fD;$J-_Dl`-v=9G//:{KATW5P,sinS7pfpST X/');
define('AUTH_SALT',        '{8%>cn`%)a)d7X6`Cw0~z4|>)be(zHO9icmlLVI+>7@IDUo6V^<PR!Y8{WWN52oB');
define('SECURE_AUTH_SALT', '[^`~%lbwx80*uXIaZGgYG~%M#mryRH&(4upM$s8w]@YA Ph#j|0/glJ[#nfKgkI@');
define('LOGGED_IN_SALT',   '&Q}s=]b</WdKg+pWJyN73O^p&}9AA}wn__!F2%#@x}|E)%@i2o_82QJ9x^a/.M(v');
define('NONCE_SALT',       'wx,ARd1u( Z$_ilyHg9)|:r0$1buBGgqmRwj*XJb~MMIjAo1AtSkmYg9+.R<~/YP');

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

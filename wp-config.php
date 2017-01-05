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
define('DB_NAME', 'alanahotel.info');

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
define('AUTH_KEY',         'l mq>4].Ll6PPmScP?&?35%h6u%c&b?ogDkL@1M)p&y(p[[4T`t<:fV)16>)D8F#');
define('SECURE_AUTH_KEY',  'nfY knlYI[_tcF!ytL7N@BG,ec{djtk5sHTY~v`u~RhtMsqifY4r?qJwWV7VnpW$');
define('LOGGED_IN_KEY',    '|SHS]8Nwb(!_e5_rb6@0Vd;~`P>vw<+|.39JessVTETiD^(16vBl]_,VEn7@:o2n');
define('NONCE_KEY',        'qN[Bp4+xu-6g}zPamq)P+Dg~tf^ug#}$+L;p+r#^rbXsWQU%Ooy92q2L[l7X+WJ}');
define('AUTH_SALT',        '<q4}l4~[;Bw0<C!^)M/xA!S5%K>DjSW_-8dxUC-eFN.0; ?LNoac/=NKFQ5u!M@C');
define('SECURE_AUTH_SALT', 'wqn70Q_kFn!7 f?SUXH4uuFSw]siW#eQ|=yry A+@{ ld-!f36`1*aJZ4)f&=]fb');
define('LOGGED_IN_SALT',   '{oG$:Xftvj _{fat4Y(8 q+:w7e<&ND@-8:{QOR9`aJY>?]`$,4z5VC&@r2h(<s4');
define('NONCE_SALT',       'iHtJ4_`%+9X+nTUP4YDCd&4%!sI{VC2Q>gi@.Z~R(O1l7h:o|>MFu/*`oAXw_R{:');

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

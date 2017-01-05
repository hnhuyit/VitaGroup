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
define('DB_NAME', 'rivieraresortspa.vn');

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
define('AUTH_KEY',         'XZ#@1Grcg!QDVv&NEVRhi+YhOi;+:Y[@YQE2<)If6Wk#S&*D6P,R5qe`ZwG?9!R{');
define('SECURE_AUTH_KEY',  'avtg;Yk;`hazYVPeQ{W7jFwzI1,K6x-qj*{.mWUD%IR*r*{Pz&qRwM@YG2M4Ih$/');
define('LOGGED_IN_KEY',    'q{7VfckvQf}W}{MNs.-1![R&^d`:IB-1rK$i>Vh`Ll~zprIw;Z)h)yx~,D~YfS1!');
define('NONCE_KEY',        'R)6$aIK|LmN uzV>_SWk_9!O+lqk`q|>crb_X]#S2d.I~YE(4h:)jhFa!&c6R7:/');
define('AUTH_SALT',        '5_q^,W:zq{xg&K,q uW.n`m1MvgJD(`. ~NfP__mr9*Zb78a.>YQ<p)9 ];e[/V~');
define('SECURE_AUTH_SALT', 'OHX@z;G@82[{Hl-r3najEP>cV~OMj5ZCw$MZSc&haX0Iqv-`2WRV=NG}+Z{^nkIM');
define('LOGGED_IN_SALT',   'aTv:2F6(5(_=0*I*-tX7T]-lwLcD1+b44?01~H*0C&@g|7AXP2BliJ,Y<{U<Yc1)');
define('NONCE_SALT',       'k;,0?801Wyu>.G)B&c:<+vH%VWB ]RDSXVq;N6UoZ[neiVHY&r8dDjcnd|m@j?7c');

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

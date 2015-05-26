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
# wpuser
# useradminpass

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sang_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', "");

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
define('AUTH_KEY',         '{:x+4,h,w.u#]][y5r$@]?]z!U2-F)WO`eDo?9PjNNeUlIazxyZ{}FXat8:vXX_$');
define('SECURE_AUTH_KEY',  'w@RO#+SB=t|1f]J++B2y+U>Dzf#5U33cof1mdv+ThRes7[U$F+u,/*JC@VQ:B]&H');
define('LOGGED_IN_KEY',    'rNx`S|dvBiU.d+RR=&2tR6^Od[uRRPOK-0){CA-8TXSq<hP]U^Nj5]BuhPc(+dOu');
define('NONCE_KEY',        's?zJ!y6uw),.|85ns1N3m2q#Hx,yyn$q3m5f1Dhn6EYL&Xc`cAl(7V5P5.ND{8wt');
define('AUTH_SALT',        'F)T1SIXA+u=/[TxPX6y^ &QhSEdZ|J>~,1PWeTk 1=jKd<a|&*|3<owbSm)Wg:jA');
define('SECURE_AUTH_SALT', '=@ZU=&S@39g:<=^-<VS)n;R_xe g=T9[JIxEe|6!.n=_+~-#E-{-%zhhhK|}[-hs');
define('LOGGED_IN_SALT',   '^f+4zVYX8H@Br`v+#1`1Cv>shXzz)M8H{-|WDF?GJ~j;eX*f0Ky~6tfbWP!77jeI');
define('NONCE_SALT',       'BG>c<PwOII*xPGp>zZ9R)Usth?a1o7L|F+4Myf-#TF^Qa5d4#:|F|Mx!}ElR7x/t');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpinner_';

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

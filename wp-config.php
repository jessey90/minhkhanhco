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
define('DB_NAME', 'min45ec5_minhkhanhco');

/** MySQL database username */
define('DB_USER', 'min45ec5_admin');

/** MySQL database password */
define('DB_PASSWORD', '=pcb*E4lue?t');

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
define('AUTH_KEY',         'OMa(kLi:cIYL]4T~ZhCTP}-)q_)B+cq+`tcaHWpDSr+5AjHvb#/+,<r$lx-oS>mz');
define('SECURE_AUTH_KEY',  '{nYwA`eu&?1Q|~H}-nhGa8V$NT~S=Cl {0$ZmL=,?e6Jutp_c|rQ{qKCPJrZ*rZ`');
define('LOGGED_IN_KEY',    '*|,OEN]*:wa+4:Y+]b{z9g;;QXBUj@Pmht6)nG-z/`|poFd9NO|e(9NFg?;|B{T+');
define('NONCE_KEY',        ':8(|?a;:Nxp;4=up4KQ|*6KmmNk1o]kFLW+%o]~K64QTv`K/G<O:k<!hV<g&eI&|');
define('AUTH_SALT',        'LmNt`G(Uj$[]LIu 7?h5^0.-mg=k|yK;?`O6 Bkaex1^C+V|3%JB-]Ng@=?baH[%');
define('SECURE_AUTH_SALT', 'N`Wre99Y-M1t7?qn;?GdL51<z;~B0,uj764Z|M(rsrU)Ty7xo_`-%HPF;tgzTwiE');
define('LOGGED_IN_SALT',   '|L]-!Lkp53]pn$h!L|(z}qH 48a42d9b-UUcti@%z2}H{dsC@hvA@(^3UE,}-4cP');
define('NONCE_SALT',       'C=f!F!|qk[U!6g!5`v:M)%,dqz!f8}1$n-3Pg6UhHy-,=H?p:IFO<RmDg-|Yz?AQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mk_';

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

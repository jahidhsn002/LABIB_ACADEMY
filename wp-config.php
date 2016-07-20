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
define('DB_NAME', 'labib');

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
define('AUTH_KEY',         'wON6Bb9?f)*8+lAh#118u4(b#akof(Iq%Haex;D)~I<Ht5u1EUeP{48F/PzD-X1l');
define('SECURE_AUTH_KEY',  'k/Pm68?NdEwJKP9]CFYFVl};Ha|~8/YFgom[xn>TGb%EH=y:V~%D?:vl-9aIcU7D');
define('LOGGED_IN_KEY',    ')[5[#s5h4K*Qoi/ K/7,EIk0UV`n5nz-#pDSVvxS.WiSLl[I.kDg?3L8gB> 9n(X');
define('NONCE_KEY',        '>_G%llR2$86!(t_2G&yDhFj(5OpR0-Hkx7t,CXKB>m<3u*Uar]T(B` ?&>IsDk]Y');
define('AUTH_SALT',        'k_^$G%-**HxKw6HKv`Dd<:|!{`)a7Y6A_L11av]s#yXuIZ+PC899dIE~A3WkAeP,');
define('SECURE_AUTH_SALT', '8YB*[Ky}YT7KBxlSU0[j%,t9 FSFtsJs&UnfOeZK8nK[km^sN*onQ;!1Yvfyi6tR');
define('LOGGED_IN_SALT',   'F|hPX3x(=@5-GK1v{XeIC`F{_lRV<mg*zc$6(?fD4 MU77s*;$H#G_zeFh ;L`Jm');
define('NONCE_SALT',       '6dVI/eYGH(>x.x7|v:T{FQEt~IH*xWtT //}1/~=h^MO:Wpidi&cpSc{kQ-:l[El');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'scool_';

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

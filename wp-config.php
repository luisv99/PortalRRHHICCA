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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ICCA RRHH' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' hLLag)rRj2+hpF+cED%qiiL2;r@i&&CMUdBVTV}zSH3.]c`Lv!m&5I&frX^P3BF' );
define( 'SECURE_AUTH_KEY',  '?e+#]nB:l;ntk~[ut]/dO>|x.A)G$x)GMvvQt^b5{jXQZi)gNUd)xe#oW2 RA>c1' );
define( 'LOGGED_IN_KEY',    'Xh9-FB#0--qe&iL_Td=$#w[>-ZM3tO]q{v2M2]R_G1Eh X JICtoP{8tN4;=HR$^' );
define( 'NONCE_KEY',        ' `wUi5E1]8N}%L6AEU$IwM<FXf~.`8sAS@---Yn[e`zP:/Jq)[I8%kQq|>)k(fNK' );
define( 'AUTH_SALT',        'frs2Z,D92Ewe) iR*[Flb 72G)(#*l+S9|%&57YozYQp_dJ%j =NiOS8apHQk/ns' );
define( 'SECURE_AUTH_SALT', '$?;#De,o~FX]92g(B/Yi3JrS(prO(bA(Ab5Cb|+{9b(4`gvV4yJt*%.t-wbwx]Ei' );
define( 'LOGGED_IN_SALT',   '-Ri5np9;MmaO3O~BlN-?Zd}Yc<~8x()Dfu&xU7@?qm2%5MtM2lT@BvH)q&cH6f]V' );
define( 'NONCE_SALT',       '+:9E<:VX2L)T`IQydu(4NNv09&5y(eYmR%0~G+ST@NhvF<@drrr#|+e!d}(mFrfs' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

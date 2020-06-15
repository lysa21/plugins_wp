<?php

// Configuration common to all environments
include_once __DIR__ . '/wp-config.common.php';

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
define( 'DB_NAME', 'portfolio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '(DOb@EZNF&Kai@N:2_:bG*6|3H}m5l/!O~y{vn!+Z:5vwk^(<BR}09h6=IclYU,M' );
define( 'SECURE_AUTH_KEY',   ' =.&TmQUwk?Zq#|}oWGugO&#nc4H5.&kW)OT6b)at{MbR:J{ee~[-v0|Wj:#b|b9' );
define( 'LOGGED_IN_KEY',     '0sC%W/0lxMLFR-, =lKuX~O)7IIsR8r|JGoe9[#XOI7-lAg-F0B(^K/W{?4xp8ZQ' );
define( 'NONCE_KEY',         'HF>S03kENl@#CTYf3,@2.?6m@*T68NqqKgV#J8,JBIpu4>STbEIY3vblNgxrmzU:' );
define( 'AUTH_SALT',         '#S:=t[!]si|?BpCDP8xeFX~?zEl~cyBrEf6.8*5 !~<5i29c=C2YPfVV0+9Q)<rM' );
define( 'SECURE_AUTH_SALT',  'byk6kqUQcw`.x5QFdZ|[]o4U5J)L@9~uYS,>k1D=F,18uf*Y@(w<-|J-Y6qv=4SK' );
define( 'LOGGED_IN_SALT',    'Sg/LM)0oG]mBPZE3HV`XjaGDGY>T,+Wc21y0CALjY #x^z;G=<Z]V*n|H*B]}P,}' );
define( 'NONCE_SALT',        'dz6Br;vj$CaY1+eR,6DUoAqxWfi=%5>.*bj<xMB6IjLa=A1u&^]HSb][g+c%Q i:' );
define( 'WP_CACHE_KEY_SALT', 'Du?+sZX7T)IF56{6#d3;$l1@jn|l,,PnJ~WAz%qA=L|Lub!C;ATFN5T,2l,fmpiL' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




define('VP_ENVIRONMENT', 'dev');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

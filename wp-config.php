<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'tp_wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0[ZLrvFf(j3hgjrzb*IQj0YWX~dvNVH|eN}:DbEViHG-8CO-TKY3if@*,oTeU6U}' );
define( 'SECURE_AUTH_KEY',  'p~{D7^fR>a]FSx;F%{4U5.JBDm7e|CZx>Mt<5=z*6?m!H>k>Q]?O`AI:z;v[X*W}' );
define( 'LOGGED_IN_KEY',    'z7lQGlGZ)1RE[,V@|*@dR8DLr]X4#8A:N~ <}&DMo-/T.XCElcycC/e}[B)V97=]' );
define( 'NONCE_KEY',        '1o1b:pyq9$R>]+Qw*okH)a5Dawh!k$AV/K&+~I{y9#&^4%Tkg<EB)AKBd,5iyjbF' );
define( 'AUTH_SALT',        ':dWL/y&sTZMqYd>1b h3m%xP>eB3NR&pw1:?{!,*`DEs`@(Bp*$^097YPNds%)+w' );
define( 'SECURE_AUTH_SALT', ']j9mvYTw=+c8WGO`vmIHx~=6v:TTcHC.V  Q}+g;~Y2c[53?*|Y=/fTj,,c~y5fJ' );
define( 'LOGGED_IN_SALT',   '`Ucbq[Pf<9h(FSP@30g~|H^{2Gfv^!K8dP g+a6]&`3_xbT$~Q.>VSjw|lp~_XE5' );
define( 'NONCE_SALT',       'Sx}|<E-DVe^/Xat?}J0F`D$8$5!Kh,r^p;^x,*[I}5[xn:GvnGw&3hJ`3;eEV+mH' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

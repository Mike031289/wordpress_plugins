<?php

/*
Plugin Name: exercice plugin
Plugin URI: https://github.com/Mike031289/mon_premier_plugin
Description:Ceci est mon premier plugin que j'ai crée au tp lors de ma formation
Author: Adjoukou AGBELOU
Version: 1.0
Author URI: http://mon_site.tt/
*/
    //Sa désactive les accès direct au fichier sur lequel on se trouve
if (!defined('ABSPATH')){
    exit;
}
    //Nous allon créer un formulaire qui va afficher la page de paramètrage de plugin
function exercice_plugin_page_parametres(){
    //Verifier si l'utilisateur à le droit d'activer le plugin
    if(!current_user_can('activate_plugin'))
    return;
    ?>

    <div class="wrap">
       <!-- affiche le titre du plugin -->
       <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <!-- les données saisies dans le formullaire sont envoyées uniquement vers le fichier option.php et uniquement via la methode POST -->
       <form action="options.php" method="post">
            <?php
                //On va afficher les champs de saisies.
                settings_fields('exercice_plugin_options');
                do_settings_sections('exercice_plugin');
                    //On ajoute le bouton submit.
                submit_button();

            ?>
       </form>
    </div> 
<?php
}
/*
//Ajouter un menu d'administration de premier niveau
function exercice_plugin_top_menu(){
        //1-menu principal
        //2-le titre de la page, c'est l'id stoqué dans la bd
        //3-le titre du menu d'administration
        //4-les permissions du menu(wordpress)
        //5-le menu slug (ça apparait dans l'URL)
        //6-appel cd la fonction qui va afficher le formulaiore défini plus haut
        //7-les icones (wordpress)
    add_menu_page(
    'exercice_plugin_parametres',
    'menu principal',
    'manage_options',
    'exercice_plugin',
    'exercice_plugin_afficher_parametres',
    'dashicons-admin-generic',
    null
    );
    }
add_action('admin_menu', 'exercice_plugin_top_menu');

*/


//creation d'un sous-menu pour
     //1-menu parent : options-general.php(reglage)
     //1-a plugins.php (plugins)
    //2-le titre de la page,
    //3-le titre du menu 
    //4-les permissions du menu(wordpress)
    //5-le menu slug (ça apparait dans l'URL)
    //6-appel cd la fonction qui va afficher le formulaiore défini plus haut
function  exercice_plugin_sous_menu() {
    add_submenu_page('options-general.php', //pour le metre dans le menu règlages
                        //'tools.php', //pour mertre le sous menu dans le menu des outils
                        //'plugins.php', //pour mettre le sous-menu dans le menu extension (plugins)
                       // 'users.php', //pour metre le sous-menu dans le menu compte (compte utilisateur)
                        'menu_secondaire',
                        'menu principal',
                        'manage_options',
                        'exercice_plugin',
                        'exercice_plugin_page_parametres',
                        null);
                        
}
add_action('admin_menu', 'exercice_plugin_sous_menu');

//Planifions la page qu'on veut créer
//On va créer une page avec 2 block
    //1- Personnalisation de la page de login
        //1-a URL pour le lien de login (Zone de texte)
        //1-b Un attribue titre pour lelien de login (Zone de texte)
        //1-c On aura une zone d'activation du style personnalisé (bouton radio)
        //1-d Zonz de message de login personnalisé (texte area)
    //2- Personnalisation de la zonne admin
        //2-a Texte de pied de page personnalisé (zone de texte)
        //2-b supprimer les items de la barre d'outils (une checkbox)
        //2-c Choix de la couleur d'administration (select)

//POur définir l'ensemble des paramètres de la page ci-dessu dans WordPress, il faut les enregistrer grâce à la fonction register_setting()
function exercice_plugin_register_setting(){
    register_setting(
                        'exercice_plugin_options', //represente le goupe d'options défini dans settings_fields('exercice_plugin_options')
                        'exercice_plugin_options', //nom pour netrouver les options dans la base de données
                        'exercice_plugin_callback_validate_option' //fonction de callback qui sera appelé lorsqu'on va cliquer sur le bouton submit
                        );
    //On ajoute les sections pour paramétrer les pages de login et d'administration 
add_settings_section(
                    'exercice_plugin_section_login', //id de la section qui sera utilisé pour afficher les champs
                    'personnalisation de la page de login', //Nom de la section
                    'exercice_plugin_callback_section_login', //la fonction callback a afficher la section
                    'exercice_plugin', //Page dans laquelle afficher cette section
                    );
add_settings_section(
                    'exercice_plugin_section_admin', //id de la section qui sera utilisé pour afficher les champs
                    'personnalisation de la page de admin', //Nom de la section
                    'exercice_plugin_callback_section_admin', //la fonction callback a afficher la section
                    'exercice_plugin', //Page dans laquelle afficher cette section
                    );
}

    //On va definir la fonction callback
function exercice_plugin_callback_validate_option($input) {
        //Valide et insert les données dans la base de données WordPress
    wp_die('ici on récupere les données');
    return $input;
}
    //On enregistre la fonction exercice_plugin_register_setting() via le hook admin_init
add_action('admin_init', 'exercice_plugin_register_setting');



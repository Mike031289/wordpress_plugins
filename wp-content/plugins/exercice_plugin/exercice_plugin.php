<?php

/*
Plugin Name: exercice plugin
Plugin URI: https://github.com/Mike031289/mon_premier_plugin
Description:Ceci est mon premier plugin que j'ai crée au tp lors de ma formation
Author: Adjoukou AGBELOU
Version: 1.7.2
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

<?php

/*
Plugin Name: Mon premier plugin
Plugin URI: https://github.com/Mike031289/mon_premier_plugin
Description:Ceci est mon premier plugin que j'ai crée au tp lors de ma formation
Author: Adjoukou AGBELOU
Version: 1.0
Author URI: http://mon_site.tt/
*/


/*
    //On va créer une action c'est à dire une fonction qui va se déclancher à l'initialisation de wordPress
add_action("init", "sendmail");
function sendmail(){
    wp_mail('mike.agbelou@gmail.com', 'Nos Voeux', 'Bonne année à tout l\'équipe de DMD Company');
}
     //On va créer un filtre c'est à dire une fonction qui va modifier le contenu de wordpress
     add_filter("the_content","ajoutcontenu");
function ajoutcontenu($content){
        global $post;
            if(is_singular("post")){
                $after_content = '<div id="wpquick-article-ads" style="padding:20px;text-align:center;font-
                size:20px;background:red;color:#FFF;">DEVENEZ MEMBRE AVEC 25% DE RABAIS</div>';
                //On retourne alors le contenu et le contenu qui sera inscrit apres l’article seule
                $content=$content.$after_content;
            }
     return $content;
     }  
*/

    //Lors qu'on crée un plugin, celui-ci doit parfois ecrire des donées dans la db de wordpress à l'activation
register_activation_hook(__FILE__, "myplugin_activation");
function myplugin_activation(){
    if(!current_user_can('activate_plugin')) return;
    add_option('myplugin_nmbredepost_parpage', 10);
    add_option('myplugin_afficher_logo', true);
}

register_deactivation_hook(__FILE__, "myplugin_desactivation");
function myplugin_desactivation(){
    if(!current_user_can('activate_plugin')) return;
    // delete_option('myplugin_nmbredepost_parpage', 10);
    // delete_option('myplugin_afficher_logo', true);
}
register_uninstall_hook(__FILE__, "myplugin_uninstall");
function myplugin_uninstall(){
    if(!current_user_can('activate_plugin')) return;
    delete_option('myplugin_nmbredepost_parpage', 10);
    delete_option('myplugin_afficher_logo', true);
}






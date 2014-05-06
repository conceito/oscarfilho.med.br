<?php
/**
 * Configurações para painel administrativo
 * 
 * @package OOWPtheme
 * @subpackage core
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright   Copyright (c) 2013 Bruno Barros
 * 
 */

/** ========================================================================
 * 	Desativação de alguns boxes no painel principal
 * ------------------------------------------------------------------------
 */
function disable_default_dashboard_widgets() {
	// remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}
// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');


/** ========================================================================
 * 	Rodapé personalizado
 * ------------------------------------------------------------------------
 */
// Custom Backend Footer
function oowptheme_custom_admin_footer() {
	_e('<span id="footer-thankyou">Desenvolvido por <a href="http://www.brunobarros.com" target="_blank">Bruno Barros</a></span> utilizando o tema  <a href="https://github.com/bruno-barros/OOWPtheme" target="_blank">OOWPtheme</a>.');
}

// adding it to the admin area
add_filter('admin_footer_text', 'oowptheme_custom_admin_footer');


/** ========================================================================
 * 	Remove itens de menu
 * ------------------------------------------------------------------------
 */
// add_action('admin_menu', 'oowptheme_remove_menus');
function oowptheme_remove_menus () {
	global $menu;
	$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Adicionar post';
    // $submenu['edit.php'][15][0] = 'Status'; // Change name for categories
    // $submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );



/** ========================================================================
 * 	Adiciona folha de estilo no editor tinymce
 * ------------------------------------------------------------------------
 */
//add_action( 'init', 'oowptheme_add_editor_styles' );
 function oowptheme_add_editor_styles() {
    add_editor_style( 'assets/css/tinymce.css' );
}



/**
 * ========================================
 * Plugin Name: Page Excerpt
Plugin URI: http://masseltech.com/plugins/page-excerpt/
Description: Adds support for page excerpts - uses WordPress code
Author: Jeremy Massel
Version: 1.3
Author URI: http://www.masseltech.com/
 */

add_action( 'edit_page_form', 'pe_add_box');
add_action('init', 'pe_init');

function pe_init() {
    if(function_exists("add_post_type_support")) //support 3.1 and greater
    {
        add_post_type_support( 'page', 'excerpt' );
    }
}

function pe_page_excerpt_meta_box($post) {
    ?>
    <label class="hidden" for="excerpt"><?php _e('Excerpt') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
    <p><?php //_e('Excerpts are optional hand-crafted summaries of your content. You can <a href="http://codex.wordpress.org/Template_Tags/the_excerpt" target="_blank">use them in your template</a>'); ?></p>
<?php
}


function pe_add_box()
{
    if(!function_exists("add_post_type_support")) //legacy
    {		add_meta_box('postexcerpt', __('Page Excerpt'), 'pe_page_excerpt_meta_box', 'page', 'advanced', 'core');
    }
}


<?php
/* *
 * @package OOWPtheme
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright   Copyright (c) 2013 Bruno Barros
 * 
 */
add_action('init', 'oowp_start_session', 1);

define('ENVIROMENT', ($_SERVER['HTTP_HOST'] == 'localhost') ? 'development' : 'production');
// bootstrap do tema
require_once TEMPLATEPATH . '/core/WpThemeStart.php';

/**
 * =======================================================================
 *  Sistema de template
 *  Arquivos de template devem estar dentro da pasta 'templates'
 * @see libraries/template_lite/demo
 * -----------------------------------------------------------------------
 */
//$tmpl = new Wtmpl();
//$tmpl->assign('array');
//echo $tmpl->fetch($file);

/**
 * =======================================================================
 *  Assets
 * -----------------------------------------------------------------------
 * Classe para injeção de scripts
 * -----------------------------------------------------------------------
 */
$assets = new Wassets();
// scripts padrão
$assets->add('bootstrap', 'bootstrap.css');
//$assets->add('flexslider', 'flexslider.css', 'bootstrap');
$assets->add('base', 'base-layout.css', 'bootstrap');
$assets->add('modules', 'module-template.css', 'base');

function jquery_enqueue()
{
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'jquery_enqueue');

$assets->add('bootstrap-js', 'bootstrap.min.js', 'jquery');
$assets->add('jquery.flexslider', 'jquery.flexslider.js', 'jquery');

/** ========================================================================
 *     Menus personalizados
 *     Na view: io('menuPrincipal')->render();
 * ------------------------------------------------------------------------
 */
$menuPrincipal = new Wmenu('Principal', array(
    'container'  => '',
    'menu_class' => 'nav navbar-nav navbar-right',
));

/** ========================================================================
 *     Execuções no momento da geração do header
 *     Injeção de scripts seletivos
 * ------------------------------------------------------------------------
 */
function oowptheme_header_actions()
{
    if (is_home()) {
        //io('assets')->add('personalslider', 'personalslider.js', 'jquery');
    } else if (is_page('contato')) {
        //io('assets')->add('validate', 'jquery.validate.min.js', 'jquery');
    }
    else if (is_page('calculadora-de-ovulacao')) {
        wp_enqueue_script('jquery-ui-datepicker');
        io('assets')->add('animate-css', 'animate.css', 'bootstrap');
        io('assets')->add('moment', 'moment.min.js', 'jquery');
        io('assets')->add('jquery-ui-theme', 'jquery-ui/jquery-ui-1.10.4.custom.css');
        io('assets')->add('datepicker-pt-BR', 'jquery.ui.datepicker-pt-BR.js');
    }
    else if (is_page('teste-de-chance-de-gravidez')) {
        io('assets')->add('animate-css', 'animate.css', 'bootstrap');
        io('assets')->add('angular', 'angular/1.2.16/angular.min.js', 'jquery');
//        io('assets')->add('angular-route', 'angular/1.2.16/angular-route.min.js', 'angular');
        io('assets')->add('angular-animate', 'angular/1.2.16/angular-animate.min.js', 'angular');
        io('assets')->add('teste-chance-gravidez', 'teste-chance-gravidez.js', 'angular');
    }

    // angular.min.js
}
add_action('get_header', 'oowptheme_header_actions');



//wp_enqueue_script( 'jquery-ui-core' );
//wp_enqueue_script( 'jquery-ui-datepicker' );
//wp_enqueue_script( 'jquery-ui-widget' );
//wp_enqueue_script( 'jquery-ui-mouse' );
//wp_enqueue_script( 'jquery-ui-accordion' );
//wp_enqueue_script( 'jquery-ui-autocomplete' );
//wp_enqueue_script( 'jquery-ui-slider' );
//wp_enqueue_script( 'jquery-ui-tabs' );
//wp_enqueue_script( 'jquery-ui-sortable' );
//wp_enqueue_script( 'jquery-ui-draggable' );
//wp_enqueue_script( 'jquery-ui-droppable' );
//wp_enqueue_script( 'jquery-ui-resize' );
//wp_enqueue_script( 'jquery-ui-dialog' );
//wp_enqueue_script( 'jquery-ui-button' );
//wp_enqueue_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', array('jquery'), '1.8.16');
/**
 * ========================================================================
 *     Altera o comportamento das queries principais
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 * ------------------------------------------------------------------------
 */
function oowptheme_special_filters($query)
{
    if (!is_admin() && $query->is_main_query()) {
        // adiciona custom post types na busca
        if ($query->is_search) {
            $query->set('post_type', array('post', 'movies'));
        }
    }
}

add_action('pre_get_posts', 'oowptheme_special_filters');

/** ========================================================================
 *     Configurações e personalizações
 * @link http://codex.wordpress.org/add_theme_support
 * ------------------------------------------------------------------------
 */
require config_folder('post-hooks.php');

/** ========================================================================
 *    Registra widgets e sidebars
 * ------------------------------------------------------------------------
 */
require config_folder('sidebars.php');
require widgets_folder('widgets.php');

/** ========================================================================
 *     Custom Post types
 * ------------------------------------------------------------------------
 */
require config_folder('custom-post-types.php');

/** ========================================================================
 *     Templates de comentários
 * ------------------------------------------------------------------------
 */
require templates_folder('comments/list-callback.php');

/** ========================================================================
 *     Templates de metadados de posts
 * ------------------------------------------------------------------------
 */
require templates_folder('entry-meta.php');
require templates_folder('content-nav.php');

/**
 * ========================================================================
 *  ADMIN. Configurações da administração.
 * ------------------------------------------------------------------------
 */
if (is_admin()) {
    //Alterações no painel de administração
    require config_folder('admin-config.php');

    // Plugins necessários
    require plugins_folder('plugin-activation.php');

    // Opções para site na administração
    require config_folder('theme-options.php');

    // Carregando framework de opções de tema
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/config/theme-options/');
    require_once config_folder('theme-options/options-framework.php');

}



/**
 * Configuração de FTP que deve ser colocado em wp-config.php
 * @link http://codex.wordpress.org/Editing_wp-config.php#WordPress_Upgrade_Constants
 *
 * define('FS_METHOD', 'ftpext');
 * define('FTP_BASE', '/var/www/vhosts/username/httpdocs/');
 * define('FTP_USER', 'username');
 * define('FTP_PASS', 'password');
 * define('FTP_HOST', 'host');
 * define('FTP_SSL', false);
 */

<?php 
/**
 * Sidebars
 * 
 * @package OOWPtheme
 * @subpackage widgets
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright   Copyright (c) 2013 Bruno Barros
 * 
 */
function wptheme_widgets_init()
{
    register_sidebar(array(
        'name' => 'Sidebar páginas',
        'id' => 'sidebar-1',
        'description' => 'Sidebar de páginas fixas.',
        'before_widget' => '<aside id="%1$s" class="widget widget-page %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Sidebar blog',
        'id' => 'sidebar-2',
        'description' => 'Sidebar para páginas dp blog',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '<div class="division"> <div class="bull"></div> </div></aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Sidebar atendimento',
        'id' => 'sidebar-3',
        'description' => 'Dados para contato',
        'before_widget' => '<aside id="%1$s" class="widget widget-atendimento %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'wptheme_widgets_init');
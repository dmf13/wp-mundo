<?php
/**
 * Arquivo que carrega as configurações de programação do tema wordpress
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Wordpress_Theme
 * @package   
 * @author    Danielle <danielle@agenciai3.com.br>
 * @copyright 2013 Agência I3 (www.agenciai3.com.br)
 * @license   http://www.php.net/license/3_02.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      /mundo-em-volta/functions.php
 * @since     Arquivo disponível desde Release 0.1
 */


// Arquivos adicionais
//require 'functions/theme_options.php';
//require 'functions/pagination.php';
require 'functions/post_types.php';
//require 'functions/taxonomies.php';
//require 'functions/metaboxes.php';



/**
 *
 * Adicionando suporte a Thumbnails 
 *
 * @return none
 * @author Agência I3 Developer <developer@agenciai3.com.br>
 *
 *
 */
 
    add_theme_support('post-thumbnails', array( 'page' ) );
    set_post_thumbnail_size( 1100, 412 );


/**
 *
 * Adiciona o item de menu no Admin do Tema
 *
 * @return none
 * @author Agência I3 Developer <developer@agenciai3.com.br>
 *
 *
 */

    if (function_exists('register_nav_menus')) {
        register_nav_menus(
            array(
                'header-menu' => 'Header Menu', 
                'footer-menu' => 'Footer Menu'
            )
        );
    }



/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function mundoemvolta_widgets_init() {
    // Area 1, located at the top of the sidebar.
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'mundoemvolta' ),
        'id' => 'primary-widget-area',
        'description' => __( 'Add widgets here to appear in your sidebar.', 'mundoemvolta' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'mundoemvolta' ),
        'id' => 'secondary-widget-area',
        'description' => __( 'An optional secondary widget area, displays below the primary widget area in your sidebar.', 'twentyten' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => __( 'Tertiary Widget Area', 'mundoemvolta' ),
        'id' => 'tertiary-widget-area',
        'description' => __( 'An optional tertiary widget area, displays below the primary widget area in your sidebar.', 'twentyten' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Area 3, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'mundoemvolta' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'An optional widget area for your site footer.', 'mundoemvolta' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Area 4, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area', 'mundoemvolta' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'An optional widget area for your site footer.', 'mundoemvolta' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Area 5, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area', 'mundoemvolta' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'An optional widget area for your site footer.', 'mundoemvolta' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Area 6, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Fourth Footer Widget Area', 'mundoemvolta' ),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'An optional widget area for your site footer.', 'mundoemvolta' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'mundoemvolta_widgets_init' );

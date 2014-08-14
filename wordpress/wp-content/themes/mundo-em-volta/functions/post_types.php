<?php
/**
 * Post Types
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
 * @link      /mundo-em-volta/functions/page-type.php
 * @since     Arquivo disponível desde Release 0.1
 */

/**
 * Inicializa todos os posttypes juntos
 * 
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Init_posttypes ()
{
    $types = array(
        array(
            'nome' => 'dica',
            'genero' => 'f',
            'plural' => 'Dicas',
            'singular' => 'Dica',
            'support' => array('custom-fields', 'editor', 'thumbnail', 'title')
        ),
        array(
            'nome' => 'video',
            'genero' => 'm',
            'plural' => 'Vídeos',
            'singular' => 'Vídeo',
            'support' => array('editor', 'thumbnail', 'title', 'excerpt')
        ),
        array(
            'nome' => 'foto',
            'genero' => 'm',
            'plural' => 'Fotos',
            'singular' => 'Foto',
            'support' => array('editor', 'thumbnail', 'title', 'excerpt')
        )  
    );  
    
    foreach ($types as $type) {
        Register_pt($type);
    }
}
add_action('init', 'Init_posttypes');

/**
 * Registra o Post Type
 *
 * @param array $_args Itens de configuração
 * 
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Register_pt($_args)
{
    $gen = ($_args['genero'] == "f") ? 'a' : 'o';
    $_nenhum = ($gen == 'a') ? 'a' : '';
    $_nenhum = "Nenhum" . $_nenhum;
    
    $args = array(
        'description' => 'PostType '.$_args['nome'],
        'show_ui' => true,
        'menu_position' => 5,
        'exclude_from_search' => true,
        'labels' => array(
            'name'=> __($_args['plural'], 'azul'),
            'singular_name' => __($_args['singular'], 'azul'),
            'all_items' => __('Tod'.$gen.'s '.$gen.'s '.$_args['plural'], 'azul'),
            'add_new' => __('Nov'.$gen.' '.$_args['singular'], 'azul'),
            'add_new_item' => __('Nov'.$gen.' '.$_args['singular'], 'azul'),
            'edit' => __('Editar '.$_args['singular'], 'azul'),
            'edit_item' => __('Editar '.$_args['singular'], 'azul'),
            'new-item' => __('Nov'.$gen.' '.$_args['singular'], 'azul'),
            'view' => __('Ver '.$_args['singular'], 'azul'),
            'view_item' => __('Ver '.$_args['singular'], 'azul'),
            'search_items' => __('Buscar '.$_args['singular'], 'azul'),
            'not_found' => __($_nenhum . ' '.$_args['singular'].' Encontrad'.$gen, 'azul'),
            'not_found_in_trash' => __($_nenhum . ' '.$_args['singular'].' na Lixeira', 'azul'),
            'parent' => __($_args['singular'].' Relacionad'.$gen, 'azul'),
        ),
        'public' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'query_var' => true,
        'supports' => $_args['support']
    );
    register_post_type($_args['nome'], $args);
}

/**
 * Posttype para notícias.
 *
 * Função para usar o posttype post no cadastro de notícias,
 * renomeado os campos de cadastros e categorias.
 *
 * @return none
 * @author Taggus Developer <taggus@taggus.com.br>
 */
function Posttype_noticia()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = __('Notícias', 'mundoemvolta');
    $labels->singular_name = __('Notícia', 'mundoemvolta');
    $labels->add_new = __('Nova Notícia', 'mundoemvolta');
    $labels->add_new_item = __('Nova Notícia', 'mundoemvolta');
    $labels->edit_item = __('Editar Notícia', 'mundoemvolta');
    $labels->new_item = __('Nova Notícia', 'mundoemvolta');
    $labels->view_item = __('Ver Notícia', 'mundoemvolta');
    $labels->search_items = __('Buscar Notícias', 'mundoemvolta');
    $labels->not_found = __('Nenhuma Notícia Encontrada', 'mundoemvolta');
    $labels->not_found_in_trash = __('Nenhuma Notícia na lixeira', 'mundoemvolta');
}
add_action('init', 'Posttype_noticia');

/**
 * Renomea os itens de menu do posttype post.
 *
 * Renomea os itens de menu de posts para os itens do posttype
 * de notícias.
 *
 * @return none
 * @author Taggus Developer <taggus@taggus.com.br>
 */
function Posttype_Menu_noticia()
{
    global $menu;
    global $submenu;
    $menu[5][0] = __('Notícias', 'mundoemvolta');
    $submenu['edit.php'][5][0] = __('Notícias', 'mundoemvolta');
    $submenu['edit.php'][10][0] = __('Nova Notícia', 'mundoemvolta');
}
add_action('admin_menu', 'Posttype_Menu_noticia');
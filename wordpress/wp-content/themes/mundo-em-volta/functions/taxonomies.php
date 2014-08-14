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
 * @package   Azul_Azul
 * @author    Fábio de Assis <fabio@agenciaazul.com.br>
 * @copyright 2013 Agência Azul (www.agenciaazul.com.br)
 * @license   http://www.php.net/license/3_02.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      /azul-azul/functions/taxonomies.php
 * @since     Arquivo disponível desde Release 0.1
 */

// Guardando post_types para auto-taxs
$GLOBALS['auto_tax'] = array();

/**
 * Inicializa todos os posttypes juntos
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Init_taxonomies ()
{
    global $auto_tax;
    
    $taxes = array(
        array(
            'auto' => true,
            'genero' => 'm',
            'nome' => 'profissional',
            'plural' => 'Profissionais',
            'singular' => 'Profissional',
            'types' => array('post', 'profissional')
        )
    );

    foreach ($taxes as $tax) {
        Register_tax($tax);
        if ($tax["auto"]) {
            $GLOBALS['tax_info'] = $tax;
            $auto_tax[] = $tax["nome"];
            add_action('admin_menu', 'Remove_Menu_itens', 10, 1);
        }
    }
}
add_action('init', 'Init_taxonomies');

/**
 * Remove as Auto Taxonomies do Admin Menu
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Remove_Menu_itens()
{
    global $tax_info;
    
    $tax = $tax_info;
    $types = $tax["types"];

    foreach ($types as $type) {
        remove_submenu_page(
            'edit.php?post_type='.$type,
            'edit-tags.php?taxonomy=' . $tax['nome'] . '&amp;post_type=' . $type
        );
        if ($type = "post") {
            remove_submenu_page(
                'edit.php',
                'edit-tags.php?taxonomy=' . $tax['nome']
            );
        }
    }
    $GLOBALS['tax_info'] = null;
}

/**
 * Remove Link de Edição Rápida 
 *
 *@param array $actions Global das Ações do Wordpress
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Remove_Quick_edit($actions)
{
    global $auto_tax;
    
    if (in_array(get_post_type(), $auto_tax)) {
        unset($actions['inline hide-if-no-js']);
    }
    return $actions;
}
add_filter('post_row_actions', 'remove_quick_edit', 10, 1);

/**
 * Registra o Post Type
 *
 * @param array $_args Itens de configuração
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Register_tax($_args)
{
    $gen = ($_args['genero'] == "f") ? 'a' : 'o';
    $pai = ($gen == 'a') ? 'Mãe' : 'Pai';
    $show = 1;
    
    if ($_args["auto"]) {
        $posttype = (array_key_exists("post_type", $_GET) ? $_GET['post_type'] : get_post_type(@$_GET['post']));
        if ($posttype == $_args['nome']) {
            $show = 0;
        }
    }
    
    $args = array(
        'labels' => array(
            'name' => __($_args['plural'], 'azul'),
            'singluar_name' => __($_args['plural'], 'azul'),
            'search_items' => __('Buscar '.$_args['singular'], 'azul'),
            'popular_items' => __('Mais Populares', 'azul'),
            'all_items' => __('Tod'.$gen.'s '.$gen.'s '.$_args['plural'], 'azul'),
            'parent_item' => __($_args['singular'].' '.$pai, 'azul'),
            'parent_item_colon' => __($_args['singular'].' '.$pai, 'azul'),
            'edit_item' => __('Editar '.$_args['singular'], 'azul'),
            'update_item' => __('Editar '.$_args['singular'], 'azul'),
            'add_new_item' => __('Nov'.$gen.' '.$_args['singular'], 'azul'),
            'new_item_name' => __('Nov'.$gen.' '.$_args['singular'], 'azul'),
        ),
        'hierarchical' => $show,
        'show_ui' => $show,
        'show_tagcloud' => true,
        'rewrite' => false,
        'public'=> true,
    );
    register_taxonomy($_args['nome'], $_args['types'], $args);
}



/**
 * Salva os dados de inserção, edição e deleção das Taxonomias automáticas
 *
 * @param int $post_id id do post a ser utilizado
 *
 * @return none
 * @author Fábio de Assis <fabio@taggus.com.br>
 */
function Save_postdata($post_id)
{
    global $post;
    global $auto_tax;
    
    // verifica se o atual usuário tem permissão de gravar os dados
    if (!empty($_POST['post_type']) == 'page') {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }
    
    // Deletando o Taxonomy quando o post for para a Lixeira
    if (isset($_GET['action']) && $_GET['action'] == 'trash') {
        $terms = wp_get_post_terms($post_id, get_post_type());
        foreach ($terms as $tag) {
            wp_delete_term($tag->term_id, get_post_type());
        }
    } else {
        
        if (isset($_GET['action']) && $_GET['action'] == 'untrash') {
            $_p = get_post($post_id);
            $_POST['post_title'] = $_p->post_title;
            $_POST['post_name'] = $_p->post_name;
        }
        // verifica se atualiza a tag de personagem ou não
        if (in_array(get_post_type(), $auto_tax)) {
        
            $tag = wp_get_post_terms($post_id, get_post_type());
            
            $args = array(
                'name' => $_POST['post_title'],
                'slug' => $_POST['post_name'],
            );
            if ($tag) {
                wp_update_term($tag[0]->term_id, get_post_type(), $args);
                 
            } else {
                wp_set_object_terms($post_id, @$_POST['post_title'], get_post_type(), true);
        
            }
        }
    }
}
add_action('save_post', 'Save_postdata');
?>
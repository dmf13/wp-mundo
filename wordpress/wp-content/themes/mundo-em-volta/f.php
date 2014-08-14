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
 * @link      /mundo-em-volta/function.php
 * @since     Arquivo disponível desde Release 0.1
 */


// Arquivos adicionais
//require 'functions/theme_options.php';
//require 'functions/pagination.php';
//require 'functions/post_types.php';
//require 'functions/taxonomies.php';
//require 'functions/metaboxes.php';

// Adicionando suporte a Thumbnails e Menus
//add_theme_support('post-thumbnails');
//add_theme_support('menus');

// Adicionando Suporte a Resumos (excerpt) nas páginas (page)
//add_post_type_support('page', 'excerpt');
/* 
 * Adicionando Thumbnails adicionais
 * param $name   string Nome da Thumbnail
 * param $width  int    Width
 * param $height int    Height
 * param $crop   bool   Se deve cortar ou redimensionar proporcionalmente
 * 
 */
//add_image_size('w-198', 198, 198, false); // foto thumb

// custom menu support
if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'header-menu' => 'Header Menu', 
            'footer-menu' => 'Footer Menu'
        )
    );
}

/**
 * Remove itens esnecessários do Menu Admin
 *
 * @return none
 * @author Taggus Developer <taggus@taggus.com.br>
 */
function Tg_Remove_Adm_links()
{
    //remove_menu_page('index.php'); // Dashboard
    // remove_menu_page('edit.php'); // Posts
    // remove_menu_page('upload.php'); // Media
    remove_menu_page('link-manager.php'); // Links
    // remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('edit-comments.php'); // Comments
    // remove_menu_page('themes.php'); // Appearance
    // remove_menu_page('plugins.php'); // Plugins
    // remove_menu_page('users.php'); // Users
    remove_menu_page('tools.php'); // Tools
    // remove_menu_page('options-general.php'); // Settings
}
add_action('admin_menu', 'Tg_Remove_Adm_links');


/**
 * Função de Customização do Form de Busca
 * 
 * @param string $form paraetro adicinal
 *
 * @return html
 * @author Taggus Developer <taggus@taggus.com.br>
 * 
 */
function My_Search_form ($form) 
{
    $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div>
    <input placeholder="PESQUISAR" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit" id="searchsubmit">OK</button>
    </div>
    </form>';

    return $form;
}
//add_filter('get_search_form', 'My_Search_form');

/**
 * Limpa uma string para torná-la URL amigável
 *
 * @param string  $uri    o termo que deve ser modificado
 * @param int     $length quantidade de caracteres que deve retornar
 * @param boolean $dot    define se retira o ponto
 * 
 * @return string
 * @author Taggus Developer <taggus@taggus.com.br>
 */
function Taggus_Clean_uri($uri, $length=100, $dot=true)
{
    // Remove tags
    $uri = strip_tags($uri);

    // Diminui a caixa
    $uri = trim(mb_strtolower($uri));

    // Remove acentos
    $uri = str_replace(array('á','à','ã','â','ä'), 'a', $uri);
    $uri = str_replace(array('é','è','ê','ë'), 'e', $uri);
    $uri = str_replace(array('í','ì','î','ï'), 'i', $uri);
    $uri = str_replace(array('ó','ò','õ','ô', 'ö'), 'o', $uri);
    $uri = str_replace(array('ú','ù','û','ü'), 'u', $uri);

    // Remove caracteres especiais
    $uri = str_replace('º', 'o', $uri);
    $uri = str_replace('ª', 'a', $uri);
    $uri = str_replace('ç', 'c', $uri);
    $uri = str_replace('ñ', 'n', $uri);

    // Remove preposições
    $useless = array('a','as','e','o','os','da','das','de','do','dos','em','na','nas','no','nos');
    $replace = array();
    $with = array();
    
    foreach ($useless as $word) {
        $replace[] = "/^{$word}\s+/i";
        $replace[] = "/\s+{$word}\s+/i";
        $replace[] = "/\s+{$word}$/i";
    }
    $uri = trim(preg_replace($replace, " ", $uri));

    // Remove pontos e virgulas
    if ($dot) {
    	$uri = str_replace(".", "", $uri);
    }
    $uri = str_replace(",", "", $uri);
    $uri = str_replace(";", "", $uri);
    $uri = str_replace("(", "", $uri);
    $uri = str_replace(")", "", $uri);
    $uri = str_replace("“", "", $uri);
    $uri = str_replace("”", "", $uri);
    $uri = str_replace("!", "", $uri);
    $uri = str_replace("?", "", $uri);
    $uri = str_replace("/", "-", $uri);
    $uri = str_replace("\\", "-", $uri);

    // Troca hífen por underscore
    $uri = preg_replace("/-+/", "-", $uri);
    $uri = str_replace('-', '_', $uri);

    // Troca espaços para +
    $uri = preg_replace("/\s+/", " ", $uri);
    $uri = preg_replace("/\s/", '-', $uri);

    // Limita o tamanho
    $uri = substr($uri, 0, $length);

    return $uri;
}

/**
 * Retorna o Nome do Mês
 *
 * @param int $month Representação numérica do mês
 *
 * @return string
 * @author Taggus Developer <taggus@taggus.com.br>
 */
function Month_name ($month)
{
    $_mes = Array(
        1 => __("Janeiro", "azul"),
        2 => __("Fevereiro", "azul"),
        3 => __("Março", "azul"),
        4 => __("Abril", "azul"),
        5 => __("Maio", "azul"),
        6 => __("Junho", "azul"),
        7 => __("Julho", "azul"),
        8 => __("Agosto", "azul"),
        9 => __("Setembro", "azul"),
        10 => __("Outubro", "azul"),
        11 => __("Novembro", "azul"),
        12 => __("Dezembro", "azul")
    );

    return $_mes[$month];
}

/**
 * Limita string por quantidade de caracter
 *
 * @param string $string variável a ser modificada
 * @param int    $chars  Quantidade de caracteres disponíveis
 *
 * @return none
 * @author Taggus Developer <taggus@taggus.com.br>
 */
function Tg_resumo ($string, $chars=140)
{
    // Removendo tags
    $string = preg_replace("/<img[^>]+\>/i", "", $string); // img
    $string = preg_replace("/\[caption[^>]+\[\/caption\]/i", "", $string);

    if (strlen($string) > $chars) {
        while (substr($string, $chars, 1) <> ' ' && ($chars < strlen($string))) {
            $chars++;
        };
        $string = substr($string, 0, $chars) . " ...";
    }

    return $string;
}






/**
 * Customizando a tela de login do seu painel administrativo WordPress
 *
 * 
 * @author Agência Azul <contato@agenciaazul.com.br>
 */

add_action( 'login_head', 'wpmidia_custom_login' );
function wpmidia_custom_login() {
    echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/style.css" rel="stylesheet">';
}
    //Alterando o texto do rodapé do painel administrativo
    function wpmidia_change_footer_admin () {
        echo "<strong>Agência Azul</strong>";
    } 
    add_filter('admin_footer_text', 'wpmidia_change_footer_admin');


    // CUSTOM ADMIN DASHBOARD HEADER LOGO
    function custom_admin_logo()
    {
        echo '<style type="text/css">#header-logo { background-image: url(' . get_bloginfo('template_directory') . '/images/logo-agencia-azul.png) !important; }</style>';
    }
    add_action('admin_head', 'custom_admin_logo');

    //Customizando a tela de login do seu painel administrativo WordPress -  alterar a URL do logo
    add_filter('login_headerurl', 'wpmidia_custom_wp_login_url');
    function wpmidia_custom_wp_login_url() {
        return home_url();
    }
    //Customizando a tela de login do seu painel administrativo WordPress - alterar o título do logo
    add_filter('login_headertitle', 'wpmidia_custom_wp_login_title');
    function wpmidia_custom_wp_login_title() {
        return get_option('blogname');
    }
    //hook the administrative header output
    add_action('admin_head', 'my_custom_logo');
    function my_custom_logo() {
      echo '<style>
      #wp-admin-bar-wp-logo>.ab-item .ab-icon {background: url('.get_bloginfo('template_directory').'/images/admin-bar-sprite.png) no-repeat center top !important; } }
      </style>
      ';
    }

    // Custom admin dashboard header logo
    add_action('admin_head', 'rvam_custom_admin_logo');
    function rvam_custom_admin_logo() {
        echo '<style type="text/css">#icon-index { background-image: url('.get_stylesheet_directory_uri().'/images/logo-dashboard.png) !important; background-position: 0 0;}</style>';
    }
    //Customizando a fonte do login
    add_action('login_head', 'custom_fonts');
    function custom_fonts() {
    echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">';
    }



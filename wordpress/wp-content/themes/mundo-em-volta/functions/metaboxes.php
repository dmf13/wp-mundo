<?php 
/**
 * Configuração do Metaboxes Adicionais ao tema.
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
 * @link      /azul-azul/functions/metaboxes.php
 * @since     Arquivo disponível desde Release 0.1
 */

add_action('do_meta_boxes', 'All_metabox');
add_action('save_post', 'Gmaps_save');
add_action('save_post', 'Case_save');
add_action('save_post', 'Azul_save');
add_action('save_post', 'Color_save');


/**
 * Inicializa todos os Metaboxes
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function All_metabox()
{
    add_meta_box(
        'gmaps',
        'GoogleMaps',
        'Gmaps_create',
        'unidade',
        'side'
    );
    add_meta_box(
        'case_info',
        'Case Info',
        'Case_info',
        'case',
        'normal'
    );
    add_meta_box(
        'azul_info',
        'Azul Info',
        'Azul_info',
        'page',
        'normal'
    );
    add_meta_box(
        'color_hex',
        'Background',
        'Color_info',
        'projeto',
        'normal'
    );
    
}

/**
 * Conteudo do Metabox
 * 
 * @param int $post Id do post
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Gmaps_create($post)
{
    $gmaps_meta = get_post_meta($post->ID, '_gmaps_meta', true);
    ?>
    <label>Endereço no Google Maps:</label><br />
    <textarea cols="35" name="gmaps_meta"><?php echo $gmaps_meta; ?></textarea><?php
}

/**
 * Salva os Dados do Metabox
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Gmaps_save()
{
    global $post;

    // Get our form field
    if ($_POST && isset($_POST['gmaps_meta'])) {
        $gmaps_meta = esc_attr($_POST['gmaps_meta']);
        // Update post meta
        update_post_meta($post->ID, '_gmaps_meta', $gmaps_meta);
    }
}

/**
 * Conteudo do Metabox
 *
 * @param int $post Id do post
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Case_info($post)
{
    $desafio = get_post_meta($post->ID, '_desafio_meta', true);
    $solucao = get_post_meta($post->ID, '_solucao_meta', true);
    $resultado = get_post_meta($post->ID, '_resultado_meta', true);
    ?>
    <h2>Desafio:</h2>
    <?php wp_editor($desafio, 'desafio_meta', array('textarea_rows'=>5)); ?><br />
    
    <h2>Solução:</h2>
    <?php wp_editor($solucao, 'solucao_meta', array('textarea_rows'=>5)); ?><br />
    
    <h2>Resultado:</h2>
    <?php wp_editor($resultado, 'resultado_meta', array('textarea_rows'=>5)); ?><br /><?php
}

/**
 * Salva os Dados do Metabox
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Case_save()
{
    global $post;

    // Get our form field
    if ($_POST && isset($_POST['desafio_meta'])) {
        $desafio = esc_attr($_POST['desafio_meta']);
        // Update post meta
        update_post_meta($post->ID, '_desafio_meta', $desafio);
    }
    // Get our form field
    if ($_POST && isset($_POST['solucao_meta'])) {
        $solucao = esc_attr($_POST['solucao_meta']);
        // Update post meta
        update_post_meta($post->ID, '_solucao_meta', $solucao);
    }
    // Get our form field
    if ($_POST && isset($_POST['resultado_meta'])) {
        $resultado = esc_attr($_POST['resultado_meta']);
        // Update post meta
        update_post_meta($post->ID, '_resultado_meta', $resultado);
    }
}


/**
 * Conteudo do Metabox
 *
 * @param int $post Id do post
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Azul_info($post)
{
    $col_um = get_post_meta($post->ID, '_col_um_meta', true);
    $col_dois = get_post_meta($post->ID, '_col_dois_meta', true);
    $col_tres = get_post_meta($post->ID, '_col_tres_meta', true);
   
    ?>
    <h2>Coluna Left:</h2>
    <?php wp_editor($col_um, 'col_um_meta', array('textarea_rows'=>5)); ?><br />
    
    <h2>Coluna Center:</h2>
    <?php wp_editor($col_dois, 'col_dois_meta', array('textarea_rows'=>5)); ?><br />
    
    <h2>Coluna Right:</h2>
    <?php wp_editor($col_tres, 'col_tres_meta', array('textarea_rows'=>5)); ?><br />
   <?php
}

/**
 * Salva os Dados do Metabox
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Azul_save()
{
    global $post;

    // Get our form field
    if ($_POST && isset($_POST['col_um_meta'])) {
        $col_um = $_POST['col_um_meta'];
        // Update post meta
        update_post_meta($post->ID, '_col_um_meta', $col_um);
    }
    // Get our form field
    if ($_POST && isset($_POST['col_dois_meta'])) {
        $col_dois = $_POST['col_dois_meta'];
        // Update post meta
        update_post_meta($post->ID, '_col_dois_meta', $col_dois);
    }

     // Get our form field
    if ($_POST && isset($_POST['col_tres_meta'])) {
        $col_tres = $_POST['col_tres_meta'];
        // Update post meta
        update_post_meta($post->ID, '_col_tres_meta', $col_tres);
    }
   
}


/**
 * Conteudo do Metabox
 *
 * @param int $post Id do post
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Color_info($post)
{
    $color = get_post_meta($post->ID, '_color_meta', true);
     
    ?>
    <label>Defina a Cor:</label>
    <input type="text" name="color_meta" value="<?php echo ($color) ? $color : "#c5c5c5"; ?>">
    <br />
    <small>Use Hexadecimal (#AABBCC), Hexadecimal reduzido (#ABC), RGB (rgb(0, 0, 0)) ou Nome (red, black, blue)</small><?php
}

/**
 * Salva os Dados do Metabox
 *
 * @return none
 * @author Fábio de Assis <fabio@agenciaazul.com.br>
 */
function Color_save()
{
    global $post;

    // Get our form field
    if ($_POST && isset($_POST['color_meta'])) {
        $color = $_POST['color_meta'];
        // Update post meta
        update_post_meta($post->ID, '_color_meta', $color);
    }
}



?>
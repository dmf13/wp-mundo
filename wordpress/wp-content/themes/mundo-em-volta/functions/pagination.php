<?php
/**
 * Arquivo com as configurações globais de Paginação
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
 * @link      /azul-azul/functions/pagination.php
 * @since     Arquivo disponível desde Release 0.1
 */

/**
 * Criação da paginação de Posts
 *
 * Função que cria a paginação dos posts
 *
 * @param int  $atual   Página atual
 * @param int  $paginas Número total de páginas
 * @param bool $ajax    Define se deve atualizar por Ajax
 * @param bool $links   Define se deve mostrar links ou input
 *
 * @return html
 * @author Taggus Developer <taggus@taggus.com.br>
 */

function Taggus_pagination($atual = 1, $paginas = "", $ajax = null, $links = true)
{
    
    global $paged;
    
    $numlinks = 2;
    $qtde = ($numlinks * 2)+1;
    
    if (!empty($paged)) {
        $atual = $paged;
    }
    
    if ($paginas == "") {
        global $wp_query;
        $paginas = $wp_query->max_num_pages;
        if (!$paginas) {
            $paginas = 1;
        }
    }
    
    $_cssclass = ($ajax) ? "paginacao ajax" : "paginacao no-ajax";
    
    if ($paginas != 1) {
        echo '<div class="' . $_cssclass . '">';
        
        if ($atual > 1) {
            echo '<a id="pag-' . ($atual - 1) . '" class="prev" href="' . 
                get_pagenum_link($atual - 1) . 
                '">&laquo;</a>';
        }
        
        if ($links) {
            for ($i=1; $i <= $paginas; $i++) {
                if (1 != $paginas && (!($i >= $atual + $numlinks + 1 || $i <= $atual - $numlinks - 1) || $paginas <= $qtde)) {
                    echo ($atual == $i) ? '<span class="atual">' . $i . '</span>' : '<a id="pag-'. $i . '" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
                }
            }
        } else {
            echo '<div class="paginas">' .
                '<span>Página </span>' .
                '<input type="text" value="' . $atual . '" name="page" />' .
                '<span> de </span>' .
                '<strong class="total">' . $paginas . '</strong></div>';
        }
        
        if ($atual < $paginas) {
            echo '<a id="pag-' . ($atual + 1) . '" class="next" href="' . 
                get_pagenum_link($atual + 1) . 
                '">&raquo;</a>';
        }
        echo '</div>';
    }
}

?>
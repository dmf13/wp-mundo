<?php
/**
 * Page Not Found
 *
 * PHP version 5
 *
 * LICENSE: Comercial.
 *
 * LICENSE: Comercial.
 *
 * @category  Wordpress_Theme
 * @package   Azul_Azul
 * @author    Fábio de Assis <fabio@agenciaazul.com.br>
 * @copyright 2013 Agência Azul (www.agenciaazul.com.br)
 * @license   http://www.php.net/license/3_02.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      /azul-azul/index.php
 * @since     Arquivo disponível desde Release 0.1
 */

get_header();
?>
<h1>Página não encontrada</h1>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <div class="section">
            <h2><?php the_title(); ?></h2>
            <div>
                <?php the_content(); ?>
            </div><!-- row -->
        </div><?php
    }
}
?>
<?php
get_footer();
?>
<?php
/**
 * Página de Dicas
 *
 * PHP version 5
 *
 * LICENSE: Comercial.
 *
 * @category  Wordpress_Theme
 * @package   
 * @author    Danielle <danielle@agenciai3.com.br>
 * @copyright 2013 Agência I3 (www.agenciai3.com.br)
 * @license   http://www.php.net/license/3_02.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      /mundo-em-volta/page-dicas.php
 * @since     Arquivo disponível desde Release 0.1
 */


get_header();

if (have_posts()) {
    ?>
    <div class="section client-list">
    <div class="add-bg">
        <div class="container"><?php
    while (have_posts()) {
        the_post();
		?>
		<h2><?php the_title(); ?></h2><?php
		the_content();

		$args = array(
			'posts_per_page'  => -1,
			'orderby'         => 'post_date',
			'order'           => 'ASC',
			'post_type'       => 'dica'
		);

		$clientes = get_posts($args);

		if ($clientes) {
		    ?>
            <ul><?php
			foreach ($clientes as $cliente) {
			    ?>
		        <li>
		            <?php echo get_the_post_thumbnail($cliente->ID, 'full'); ?>
		        </li><?php
			} // end foreach clientes
			?>
	        </ul>
	        <span class="clear"></span><?php
		} //endif $clientes
	} // end while have_posts
	?>
        </div>
        <div class="add-bg2"></div>
    </div>
    </div><?php
} // end if have_posts

get_footer();
?>
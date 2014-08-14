<?php
/**
 * Página de Contato
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
 * @link      /mundo-em-volta/page-contato.php
 * @since     Arquivo disponível desde Release 0.1
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
		?>
		
			<!-- .content-left -->
			<div class="content-left">
				<article>
					<div class="article-theme">
						<div class="article-header">
							
							<h3><?php the_title(); ?></h3>
						</div>
						<div class="article-content">
							<?php the_content(); ?>		
						</div>
					</div>

				</article>
			</div>
			<!-- end of .content-left -->
			
			<?php
			get_sidebar();
			?>
			
	<?php	
	} // end while have_posts
	?>
        
    <?php
} // end if have_posts

get_footer();
?>
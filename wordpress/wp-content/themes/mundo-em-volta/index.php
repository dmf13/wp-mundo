<?php
/**
 * Página de Segurança e listagem das notícias. É utilizada na falta de outros arquivos.
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
?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
			<!-- .content-left -->
			<div class="content-left">
				<article>
					<div class="article-theme">
						<div class="article-header">
							<span class="date">
								 <?php echo get_the_date('j  M'); ?>
							</span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<div class="article-content">
							<?php the_content(); ?>
						</div>
						<div class="article-bottom">

								<span class="article-social">
									COMPARTILHE
									<ul>
										<li class="sm-1"><a href="">facebook</a></li>
										<li class="sm-2"><a href="">twitter</a></li>
										<li class="sm-3"><a href="">pinterest</a></li>
									</ul>

								</span>
							
								<span class="comentario-pub">
									DEIXE UM COMENTÁRIO
								</span>
								<span class="comentario-view">
									<p>VER COMENTARIOS</p>
								</span>			
							
						</div>
					</div>

				</article>
				<div class="paginator">
					
				</div><!-- end of .paginator -->
			</div>
			<!-- end of .content-left -->
			 <?php
			get_sidebar();
			?>
			
			

 <?php
    }
}
?>
<?php
get_footer();
?>
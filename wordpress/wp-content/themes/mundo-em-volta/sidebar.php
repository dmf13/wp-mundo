<?php
/**
 * The Sidebar containing the main widget area
 *
 * @category  Wordpress_Theme
 * @package   
 * @author    Danielle <danielle@agenciai3.com.br>
 * @copyright 2013 Agência I3 (www.agenciai3.com.br)
 * @license   http://www.php.net/license/3_02.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      /azul-azul/page-comece-aqui.php
 * @since     Arquivo disponível desde Release 0.1
 */
?>
	<!-- .content-right -->
			<div class="content-right">
				<div class="search-theme">
					<?php
					if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
						<div id="primary" class="widget-area" role="complementary">
							<div id="search" class="widget-container widget_search search-theme">
								<?php get_search_form(); ?>
							</div>
						</div><!-- #primary .widget-area -->
					<?php endif; // end primary widget area ?>
				</div><!-- end of .search-theme -->
				
				<div class="onde-estou-theme">
					<div class="onde-estou-theme-bg"></div>

					<img src="images/mapa.jpg" alt="">
				</div><!-- end of .onde-estou-theme -->

				<div class="social-media-theme">
					<ul>
						<li class="sm-1"><a href="">facebook</a></li>
						<li class="sm-2"><a href="">you tube</a></li>
						<li class="sm-3"><a href="">pinterest</a></li>
						<li class="sm-4"><a href="">rss</a></li>
					</ul>
				</div><!-- end of .social-media-theme -->

				<div class="newsletter-theme">
					<form>
						<input type="text" />
					</form>
					
				</div><!-- end of .newsletter-theme -->

				<div class="anuncie-theme">
					<img src="images/anuncie.png" alt="">
						
				</div><!-- end of .anuncie-theme -->

				<div class="parceiros-theme">
					<img src="images/parceiros.png" alt="">			
				</div><!-- end of .parceiros-theme -->

				<div class="publicidade-theme">
					<div class="public-1">
						<?php
						// A second sidebar for widgets, just because.
						if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

							<div id="secondary" class="widget-area" role="complementary">
								<ul class="xoxo">
									<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
								</ul>
							</div><!-- #secondary .widget-area -->

						<?php endif; ?>	
					</div>
					<div class="public-2">
						<img src="images/parceiros.png" alt="">
					</div>
					<div class="public-3">
						<img src="images/parceiros.png" alt="">
					</div>
				</div>

	
	
			




			</div>
			<!-- end of .content-right -->
		

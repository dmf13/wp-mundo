<?php
/**
 * Carrega as Opções personalizadas para o Tema
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
 * @link      /azul-azul/functions/theme_options.php
 * @since     Arquivo disponível desde Release 0.1
 */


/**
 * Criando o Formulário Personalizado
 *
 * @return HTML
 */
function Custom_Options_form()
{
    ?>
	<div class="wrap">
	    <div class="icon32" id="icon-options-general"><br></div>
		<h2>Opções do Tema</h2>
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options') ?>
			<h3>Redes Sociais</h3>
			<table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">Twitter:</th>
                        <td>
				            <label>ID:</label>
				            <input type="text" name="twitterid" size="25" value="<?php echo get_option('twitterid'); ?>" /> | 
				            <label>App ID:</label>
				            <input type="text" name="twitter_appid" size="25" value="<?php echo get_option('twitter_appid'); ?>" /> | 
				            <label>Link Color:</label>
				            <input type="text" name="twitter_color" size="25" value="<?php echo get_option('twitter_color'); ?>" />
				        </td>
				    </tr>
                    <tr>
                        <th scope="row">Página no Facebook:</th>
                        <td>
				            <input type="text" name="facebook_page" size="25" value="<?php echo get_option('facebook_page'); ?>" />
				        </td>
				    </tr>
				    <tr>
                        <th scope="row">Google+ ID:</th>
                        <td>
				            <input type="text" name="googleplus_id" size="25" value="<?php echo get_option('googleplus_id'); ?>" />
				        </td>
				    </tr>
				    <tr>
                        <th scope="row">Instagram Profile:</th>
                        <td>
				            <input type="text" name="instagram_id" size="25" value="<?php echo get_option('instagram_id'); ?>" />
				        </td>
				    </tr>
				    <tr>
                        <th scope="row">Pinterest Profile:</th>
                        <td>
				            <input type="text" name="pinterest_id" size="25" value="<?php echo get_option('pinterest_id'); ?>" />
				        </td>
				    </tr>
				    <tr>
                        <th scope="row">Linkedin:</th>
                        <td>
				            <input type="text" name="linkedin_page" size="25" value="<?php echo get_option('linkedin_page'); ?>" />
				        </td>
				    </tr>
				</tbody>
			</table><br />
			
			<h3>Ferramentas de Análise de Tráfego</h3>
			<table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">Código do Google Analytics</th>
                        <td>
				             <textarea class="large-text code" cols="50" rows="10" name="analytics"><?php echo get_option('analytics'); ?></textarea>
				        </td>
				    </tr>
                    <tr>
                        <th scope="row">Outra Ferramenta de Análise:</th>
                        <td>
                            <textarea class="large-text code" cols="50" rows="10" name="other_analytics"><?php echo get_option('other_analytics'); ?></textarea>
				        </td>
				    </tr>
				</tbody>
			</table>
			<p class="submit"><input class="button-primary" type="submit" name="Submit" value="Salvar Configurações" /></p>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" 
			value="twitterid,
			twitter_appid,
			twitter_color,
			facebook_page,
			googleplus_id,
			instagram_id,
			pinterest_id,
			linkedin_page,
			analytics,
			other_analytics" />
		</form>
	</div>
    <?php
}

/**
 * Inicializando os menus customizados
 *
 * @return none
 */
function Custom_Admin_menu()
{
    // Sobre a Taggus
    add_menu_page(
        'Opções',
        'Opções do Site',
        'manage_options',
        'theme-options',
        'Custom_Options_form'
    );
}
add_action('admin_menu', 'Custom_Admin_menu');
?>
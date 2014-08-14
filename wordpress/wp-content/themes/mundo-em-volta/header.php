<?php
/**
 *
 * PHP version 5
 *
 * LICENSE: Comercial.
 *
 * @category  Wordpress_Theme
 * @package   Azul_Azul
 * @author    Fábio de Assis <fabio@agenciaazul.com.br>
 * @copyright 2013 Agência Azul (www.agenciaazul.com.br)
 * @license   http://www.php.net/license/3_02.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      /azul-azul/header.php
 * @since     Arquivo disponível desde Release 0.1
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="ie ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
    <title><?php 
if (is_home()) {
    bloginfo('name'); 
} else { 
    bloginfo('name');
    wp_title();
} 
    ?></title>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta property="og:title" content="<?php wp_title(); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="icon" 
          href="<?php bloginfo('template_url'); ?>/images/favicon.png" 
          type="image/x-icon" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="alternate" 
          type="application/rss+xml" 
          title="<?php bloginfo('name'); ?>"
          href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml"
          title="<?php bloginfo('name'); ?>" 
          href="<?php bloginfo('atom_url'); ?>" />
    <meta name="author" 
          content="Agência I3, developer@agenciai3.com.br" />
    <?php 
        if (get_option('googleplus_id')) {
            ?>
            <link 
            rel="publisher" 
            href="<?php echo get_option('googleplus_id'); ?>" />
            <?php
        }
    ?>
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    
        <!-- google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900italic,900,700italic,700,400italic,300italic,300,100italic,100|Special+Elite|Nova+Round|Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" 
          type="text/css" 
          media="all" 
          href="<?php bloginfo('stylesheet_url'); ?>" />
</head>

    
    
<body>
    <div id="main" class="container">   
        <!-- header -->
        <header>
            <div id="header">
                <div class="brand">
                    <h1 id="logo" class="img-replace">
                        <a href="<?php
                        bloginfo('url');
                        ?>" title="<?php
                        bloginfo('name');
                        ?> <?php
                        bloginfo('description');
                        ?>"><?php
                        bloginfo('name');
                        ?></a>
                    </h1>
                    <h2 id="tagline"><?php bloginfo('description'); ?></h2>
                </div><!-- end of .brand -->
                <div class="menu header-menu">
                    <nav>
                     
                    <?php
                    $defaults = array(
                        'theme_location'  => 'header-menu',
                        'container'       => '',
                        'menu_class'      => '',
                        'menu_id'         => '',
                        'after'      => '<li class="separador"><span>&nbsp;</span></li>'
                    );
                    wp_nav_menu( $defaults );
                    ?>

                    <span class="clear"></span>
                
                            
                    </nav>
                </div><!-- end of .header-menu -->
            </div>
        </header>
        <!-- end of .header -->


        <!-- banner-theme -->
        <div class="banner-theme">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
               
                
            } 
            ?>
            <div class="description">
                <h2><?php if ( has_post_thumbnail() ) { echo get_post(get_post_thumbnail_id())->post_title; } ?> </h2>
                <p><?php if ( has_post_thumbnail() ) { echo get_post(get_post_thumbnail_id())->post_content; } ?> </p>  
                 
            </div>
            
        </div>
        <!-- end of .banner-theme -->

        <!-- content-theme -->
        <div class="content-theme">
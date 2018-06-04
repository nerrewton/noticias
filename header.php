<?php
/**
 * Template Name: Chistes Colombianos
 * Created by PhpStorm.
 * User: Rene Arteaga
 * Date: 3/05/2018
 * Time: 21:11
 */
ini_set('display_errors', true);
//$custom_options = get_option(CHISTES_COL);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <!--[if IE ]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title><?php wp_title(''); ?></title>
    <link href="<?php bloginfo('stylesheet_url')?>" rel="stylesheet">
    <link href="<?php bloginfo('template_directory')?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory')?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory')?>/css/animate.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory')?>/css/style.css" rel="stylesheet">
    <script src="<?php bloginfo('template_directory')?>/js/jquery-2.1.1.js" ></script>
    <script src="<?php bloginfo('template_directory')?>/js/bootstrap.min.js" ></script>
    <script src="<?php bloginfo('template_directory')?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php bloginfo('template_directory')?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php bloginfo('template_directory')?>/js/inspinia.js" ></script>
    <script src="<?php bloginfo('template_directory')?>/js/plugins/pace/pace.min.js"></script>
    <?php wp_head(); ?>
</head>
<body class="mini-navbar" >
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" src="<?php bloginfo('template_directory')?>/img/logo_chi.png" class="img_menu"/>
                            </span>
                        </div>
                        <div class="logo-element">
                            <i class="fa fa-tachometer"></i>
                        </div>
                    </li>
                    <li>
                        <a href="<?php bloginfo('url'); ?>"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
                    </li>
                    <li>
                        <a href="<?php bloginfo('url'); ?>"><i class="fa fa-smile-o"></i> <span class="nav-label">Quienes s&oacute;mos</span></a>
                    </li>
                    <li>
                        <a href="<?php bloginfo('url'); ?>"><i class="fa fa-flag"></i> <span class="nav-label">Pol&iacute;tica y privacidad</span></a>
                    </li>
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Qu&eacute; buscabas ? ..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info icon_facebook" data-toggle="dropdown" href="#">
                                <span class="p-xs b-r-sm"><i class="fa fa-facebook-square"></i> Facebook</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <!-- parte para colocar codigo de la pagina de facebook -->
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>



<?php
/**
 * The Header for our theme.
 *
 *
 * @package OOWPtheme
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="pt-BR" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="pt-BR" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="pt-BR" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="pt-BR" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width" />

<title><?php wp_title( '&gt;', true, 'right' )?> <?php bloginfo('name')?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo js_folder('html5shiv.respond.min.js'); ?>" type="text/javascript"></script>
<![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,700,300' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 

//var_dump(get_template_directory_uri());

?>

<header id="header" class="clearfix">

	<div class="container">
		
		<div class="row">
			
			<div class="col-xs-12">

                <nav class="navbar navbar-default" role="navigation">


                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo img_folder('logo-oscar.png')?>" alt="<?php bloginfo( 'name' ); ?>"/>

                        </a></h1>
<!--                    <a class="navbar-brand" href="#">Brand</a>-->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <?php
                    /** ========================================================================
                     * 	Escreve HTML do menu personalizado
                     * ------------------------------------------------------------------------
                     */
                    io('menuPrincipal')->render();
                    ?>
                </div><!-- /.navbar-collapse -->

                </nav>
				




			</div>

		</div><!-- row -->

	</div><!-- container -->

    <?php
    /**
     * pages has a single line
     */
    if( is_front_page() || is_page() ):
    ?>
    <div class="intermedi-header"></div>
    <?php else:?>
    <div class="blog-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="blog-title-bar"><a href="<?php echo site_url('blog')?>">Blog</a></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php get_search_form(true)?>
                </div>

            </div>
        </div>

    </div>
    <?php endif;?>
</header>
<!-- #header -->


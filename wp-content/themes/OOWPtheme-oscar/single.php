<?php
/**
 * a single post
 *
 * @package OOWPtheme
 */

get_header();
?>

    <section id="page">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-8">

                    <?php
                    if ( have_posts() ) :
                        /** ========================================================================
                         *     Breadcrumb
                         * ------------------------------------------------------------------------
                         */
                        if( is_single() || is_date() ):
                            $p = new ThePost();
                            $tmplBreadcrumb = new Wtmpl();
                            $tmplBreadcrumb->assign(array(
                                'breadcrumb' => $p->breadcrumb()
                            ));
                            $tmplBreadcrumb->display('breadcrumb.html');
                        endif;
                        /** ========================================================================
                         * 	Looping pelos posts
                         * ------------------------------------------------------------------------
                         */
                        while ( have_posts() ) : the_post();
                            $p = new ThePost();
                            get_template_part( 'content', 'single' );

                        endwhile;

                        echo oowp_pagination();

                    else :
                        ?>

                        <p>Nada encontrado</p>

                    <?php
                    endif; // end have_posts() check
                    ?>

                </div>
                <!--            col-->

                <div class="col-xs-12 col-sm-4">

                    <?php get_sidebar('blog'); ?>

                </div>
            </div>
            <!--        row-->

        </div>
        <!--    container-->

    </section>


<?php get_footer(); ?>
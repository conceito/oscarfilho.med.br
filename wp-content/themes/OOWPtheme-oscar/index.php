<?php
/**
 * The main template file.
 *
 * @package OOWPtheme
 */

get_header();
?>

<section id="page">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-8">

                <br/>

		<?php
        if( is_category() ):
            $catName = get_category(get_query_var('cat'))->name;
        ?>
            <h3 class="middle-title cat-title"> <div class="sprt arr-y-b"></div> Assunto: <?php echo $catName?></h3>
        <?php
        endif;

        if( is_search() ):

            $search_query = get_search_query();
        ?>
            <h3 class="middle-title cat-title"> <div class="sprt arr-y-b"></div> Pesquisa: <?php echo
                $search_query?></h3>
        <?php
        endif;

        if( is_date() ):

            $date = get_the_time('F \d\e Y');
        ?>
            <h3 class="middle-title cat-title"> <div class="sprt arr-y-b"></div> Na data: <?php echo
                $date?></h3>
        <?php
        endif;

		if ( have_posts() ) :
		/** ========================================================================
		 * 	Looping pelos posts
		 * ------------------------------------------------------------------------
		 */
		while ( have_posts() ) : the_post();
            $p = new ThePost();
			get_template_part( 'content', get_post_format() );
		
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
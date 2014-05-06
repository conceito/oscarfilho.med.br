<?php
/**
 * pages
 */
get_header();
?>

<section id="page">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-10 col-sm-push-2">

                <?php
                if (have_posts()) :

                    while (have_posts()) : the_post();
                        $p = new ThePost();
                        get_template_part('content', 'page');
                        get_template_part('teste-de-chance-de-gravidez');

                    endwhile;

                else :
                    ?>
                    <p>Nenhuma página encontrada.</p>
                <?php
                endif;
                ?>

            </div>
            <!--            col-->

            <div class="col-xs-12 col-sm-2 col-sm-pull-10">

                <?php if (isset($p)): ?>
                    <div class="page-bull"></div>

                    <?php if ($p->thumb): ?>
                        <div class="page-thumb">
                            <img src="<?php echo $p->thumb ?>" alt="<?php echo $p->title ?>"/>
                        </div>
                        <div class="division"></div>
                    <?php endif; ?>

                <?php endif; ?>

                <?php get_sidebar('pages'); ?>

                <a class="flip-link flip-small" href="<?php echo site_url('calculadora-de-ovulacao')?>">
                    <span class="box-shadow">
                        <span class="fliping">
                            <img src="<?php echo img_folder('calculadora.png') ?>" alt=""/>
                        </span>
                    </span>
                    <span class="title">Calculadora de ovulação</span>
                </a>

            </div>
        </div>
        <!--        row-->

        <?php// get_template_part('row-calculadoras')?>

    </div>
    <!--    container-->

</section>

<?php
get_footer();
?>

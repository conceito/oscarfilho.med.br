<?php
/**
 * homepage
 */
get_header();
?>

    <section id="page">

        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="webdoor">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="<?php echo img_folder('webdoor-1.jpg') ?>"/>
                                </li>
                                <li>
                                    <img src="<?php echo img_folder('webdoor-2.jpg') ?>"/>
                                </li>
                                <li>
                                    <img src="<?php echo img_folder('webdoor-3.jpg') ?>"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(function () {
                            SyntaxHighlighter.all();
                        });
                        jQuery(window).load(function () {
                            jQuery('.flexslider').flexslider({
                                animation: "fade",
                                animationSpeed: 300
                            });
                        });
                    </script>
                </div>
                <!-- col -->

                <div class="col-xs-12 col-sm-6 col-md-4 flip-link-home">

                    <a class="flip-link" href="<?php echo site_url('tratamentos')?>">
                    <span class="box-shadow">
                        <span class="fliping">
                            <img src="<?php echo img_folder('tratamentos.png') ?>" alt=""/>
                        </span>
                    </span>
                        <span class="title">Tratamentos</span>
                        <span class="desc">Conheça os diferentes tipos de tratamentos para infertilidade</span>
                    </a>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-md-push-4 flip-link-home">

                    <a class="flip-link" href="<?php echo site_url('social')?>">
                    <span class="box-shadow">
                        <span class="fliping">
                            <img src="<?php echo img_folder('tubo.png') ?>" alt=""/>
                        </span>
                    </span>
                        <span class="title">Projeto Beta</span>
                        <span class="desc">Projeto social com o intuito de reduzir os custos do tratamento da infertilidade. Saiba mais</span>
                    </a>

                </div>

            </div>
            <!-- row-->


            <?php get_template_part('row-calculadoras')?>

        </div>

    </section><!--page-->

<?php

$recents = new Wcollection(array('post_per_page' => 5));
if($recents->count()):?>
    <section id="blog-recents">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-push-3 text-center">

                    <br/>
                    <div class="division div-filled"> <div class="bull"></div> </div>

                    <h2 class="middle-title">Artigos recentes no Blog</h2>

                    <?php
                    foreach($recents->posts as $post):
                        $p = new ThePost($post);
                    ?>
                    <a href="<?php echo $p->permalink?>"><?php echo $p->title?></a>

                    <?php
                    endforeach;
                    ?>

                    <div class="division"> <div class="bull"></div> </div>
                    <br/>

                </div>
            </div>
        </div>
    </section>
<?php endif;?>

<?php
get_footer();
?>
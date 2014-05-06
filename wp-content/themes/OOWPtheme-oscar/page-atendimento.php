<?php
/**
 * page atendimento
 */
if (was_form_sent())
{
    // OK, vamos enviar!
    $m = new Wmail();
    $m->debugModeOn();
    $m->setSubject('contato');
    $m->respondTo($_POST['email'], $_POST['nome']);
    $m->setTemplate('email/contato.html');
    $m->setRules(array(
        array('nome', 'string', true, 3),
        array('email', 'email', true),
        array('telefone', 'string', false),
        array('mensagem', 'string', true, 10),
    ));
    // optional
    // $m->setTemlateVars(array(
    //     'nome' => $_POST['nome'],
    //     'email' => $_POST['email'],
    //     'mensagem' => $_POST['mensagem'],
    // ));
    //    $m->setAttachment('file');
    $m->sendAndRedirect();
}
get_header();
?>

<section id="page">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-10 col-sm-push-2">

                <?php
                // setup $post
                the_post();

                $p = new ThePost($post);

                ?>
                <header class="entry-header">
                    <?php edit_post_link('Editar', '<span class="edit-link">', '</span>'); ?>

                    <h1 class="page-title"><?php echo $p->title ?></h1>

                </header>
                <!-- .entry-header -->
                <?php echo $p->content; ?>

                <br>
                <br>

                <?php
                /** ========================================================================
                 *     Retorno do envio
                 * ------------------------------------------------------------------------
                 */
                if (form_returned_success()):
                    ?>
                    <div class="alert alert-success animated bounceInDown">
                        <b>Mensagem enviada com sucesso.</b>
                    </div>
                <?php
                endif;
                if (form_returned_error()):
                    ?>
                    <div class="alert alert-danger animated bounceInDown">
                        <p><b>Houve um erro ao enviar sua mensagem.</b></p>
                        <?php
                        if (form_returned_message()):
                            echo '<p>' . form_returned_message() . '</p>';
                        endif;
                        ?>
                    </div>
                <?php
                endif;
                ?>

                <?php
                if(true == false):
                echo form_open('', array('class' => 'form-horizontal'));
                ?>



                <div class="form-group">
                    <label class="control-label col-md-2" for="field_nome">Nome</label>

                    <div class="col-md-8">
                        <input type="text" name="nome" id="field_nome" placeholder="" class="form-control required"
                               value="<?php echo set_value('nome') ?>">
                        <?php echo form_error('nome') ?>
                    </div>
                </div>
                <!-- form-group -->

                <div class="form-group">
                    <label class="control-label col-md-2" for="field_email">E-mail</label>

                    <div class="col-md-8">
                        <input type="email" name="email" id="field_email" placeholder="" class="form-control required"
                               value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email') ?>
                    </div>
                </div>
                <!-- form-group -->


                <div class="form-group">
                    <label class="control-label col-md-2" for="field_telefone">Telefone</label>

                    <div class="col-md-4">
                        <input type="text" name="telefone" id="field_telefone" placeholder="(xx) xxxx-xxxx"
                               class="form-control" value="<?php echo set_value('telefone') ?>">
                        <?php echo form_error('telefone') ?>
                    </div>
                </div>
                <!-- form-group -->

                <div class="form-group">
                    <label class="control-label col-md-2" for="field_mensagem">Mensagem</label>

                    <div class="col-md-10">
                        <textarea name="mensagem" id="field_mensagem" cols="30" rows="6"
                                  class="form-control required"><?php echo set_value('mensagem') ?></textarea>
                        <?php echo form_error('mensagem') ?>
                    </div>
                </div>
                <!-- form-group -->

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                    </div>
                </div>


                <?php
                echo form_close();
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

                <?php get_sidebar('atendimento'); ?>
            </div>
        </div>
        <!--        row-->


        <div class="row">
            <div class="col-xs-12">

                <div class="division"></div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="atendimentoTabs">
                    <li class="active"><a href="#place1" data-toggle="tab">Bela Vista</a></li>
                    <li><a href="#place2" data-toggle="tab">Hospital Israelita Albert Einstein</a></li>
                    <li><a href="#place3" data-toggle="tab">Tatuapé (Projeto BETA)</a></li>
                </ul>
                <style>
                    .tab-content > .tab-pane{
                        position: absolute !important;
                        left: -10000px !important;
                        display: block !important;
                    }
                    .tab-content > .active{
                        position: relative !important;
                        left: 0 !important;
                    }
                </style>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane in active" id="place1">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3656.952700440935!2d-46.64410219999999!3d-23.5701422!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59bd8257e807%3A0x68615be9e4fe9461!2sRua+Cincinato+Braga%2C+37+-+Bela+Vista!5e0!3m2!1spt-BR!2sbr!4v1397054767948" width="100%" height="300" frameborder="0" style="border:0"></iframe>

                        <?php if(opt('place1_ref')):?>
                        <p>Referência:  <?php echo opt('place1_ref')?></p>
                        <?php endif;?>

                    </div>
                    <div class="tab-pane " id="place2">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.1158162192482!2d-46.714766999999966!3d-23.600179000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce56dc138906d5%3A0xfa2f75da82a1dd3c!2sHospital+Israelita+Albert+Einstein!5e0!3m2!1spt-BR!2sbr!4v1397161144985" width="100%" height="300" frameborder="0" style="border:0"></iframe>

                        <?php if(opt('place2_ref')):?>
                            <p>Referência:  <?php echo opt('place2_ref')?></p>
                        <?php endif;?>
                    </div>
                    <div class="tab-pane " id="place3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3657.8991615428313!2d-46.565782000000006!3d-23.536129!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5eefb437fb0b%3A0x4841554881d9e1ca!2sConsult%C3%B3rio+de+Nutri%C3%A7%C3%A3o+Especializado+Materno-Infantil+e+Adulto!5e0!3m2!1spt-BR!2sbr!4v1397161338880" width="100%" height="300" frameborder="0" style="border:0"></iframe>

                        <?php if(opt('place3_ref')):?>
                            <p>Referência:  <?php echo opt('place3_ref')?></p>
                        <?php endif;?>
                    </div>
                </div>
<!--                tab-content-->

                <div class="division"></div>


            </div>
        </div>
        <!--        row-->

    </div>
    <!--    container-->

</section>

<?php
get_footer();
?>

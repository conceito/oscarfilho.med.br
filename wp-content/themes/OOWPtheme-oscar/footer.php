<?php
/**
 * The template for displaying the footer.
 *
 * @package WPtheme
 */
?>

<footer id="footer">

    <div class="footer-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="sprt place"></i> Locais de atendimento
                </div>
            </div>
        </div>
    </div><!-- footer-header-->

    <div class="footer-body">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 text-center">
                    <a class="adrs" href="<?php echo opt('place1_maplink', '#')?>">
                        <i class="sprt placehover"></i>

                        <span class="address-title">Bela Vista</span>
                        <address>
                            <?php echo opt('place1_address_1')?> <br/>
                            <?php echo opt('place1_address_2')?> <br/>
                            <?php echo opt('place1_tel')?>
                        </address>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <a class="adrs" href="<?php echo opt('place2_maplink', '#')?>">
                        <i class="sprt placehover"></i>

                        <span class="address-title">Hospital Israelita Albert Einstein</span>
                        <address>
                            <?php echo opt('place2_address_1')?> <br/>
                            <?php echo opt('place2_address_2')?> <br/>
                            <?php echo opt('place2_tel')?>
                        </address>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <a class="adrs" href="<?php echo opt('place3_maplink', '#')?>">
                        <i class="sprt placehover"></i>

                        <span class="address-title">Tatuapé (Projeto BETA)</span>
                        <address>
                            <?php echo opt('place3_address_1')?> <br/>
                            <?php echo opt('place3_address_2')?> <br/>
                            <?php echo opt('place3_tel')?>
                        </address>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- footer-body-->

    <div class="footer-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-push-3">
                    <p>Copyright 2014©. Oscar Barbosa Duarte Filho</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
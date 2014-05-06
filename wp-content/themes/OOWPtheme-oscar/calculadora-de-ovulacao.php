<article  <?php post_class(); ?>>

    <div class="division"></div>

    <div class="calculator ovulacao">

        <div class="phase phase-1">
            <label for="field_date">Última Menstruação</label>
            <input type="text" id="field_date" name="date" placeholder="dd/mm/aaaa" required/>
        </div>

        <div class="phase phase-2">
            <label for="field_cicle">Duração do Ciclo (22 a 45 dias) </label>
            <input type="number" id="field_cicle" name="cicle" placeholder="28" required/>
        </div>

        <div class="control">
            <a class="btn btn-primary" href="#" id="submit">CALCULAR</a>
        </div>


        <div class="ovulacao-response-panel clearfix animated">
            <div class="inner">
                <p>
                    <strong>Data estimada da ovulação:</strong>
                    <small>Início: <span class="estimated_before">00/00/0000</span></small>
                    <small>Fim: <span class="estimated_after">00/00/0000</span></small>
                </p>

                <p>
                    <strong>Data estimada para o parto:</strong>
                    <small class="child_birth">00/00/0000</small>
                </p>

                <div class="control">
                    <a class="btn btn-primary" href="#" id="recalc">RECALCULAR</a>
                </div>

            </div>
        </div>

    </div>

    <div class="ovulacao-help-block">
        <div class="help-block">
            <i class="sprt exclam"></i>
            Note que os valores determinados por este programa são apenas estimativas. É fundamental consultar o seu
            médico e obter um seguimento permanente da sua gravidez.
        </div>

        <div class="help-block">
            No campo “duração do ciclo”, use a média dos últimos seis meses. Se não souber, use o valor médio de 28
            dias.
        </div>
    </div>

</article>

<script type="text/javascript">

    jQuery(document).ready(function ($) {
        $('#field_date').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "0D"
        });

        var Ovulation = {

            date: $('#field_date'),
            cicle: $('#field_cicle'),
            submit: $('#submit'),
            recalc: $('#recalc'),
            panel: $('.ovulacao-response-panel'),

            init: function () {
                this.events();

            },
            events: function () {
                var that = this;
                this.submit.on('click', function (e) {
                    e.preventDefault();
                    that.run();
                });

                this.recalc.on('click', function(e){
                    e.preventDefault();
                    that.animateOut();
                })
            },

            run: function (e) {
                var dt = moment(this.date.val(), "DD-MM-YYYY");
                var cl = (this.cicle.val().length < 1 || parseInt(this.cicle.val(), 10) == NaN) ? 28 : parseInt(this.cicle.val(), 10);
//                console.log(typeof parseInt(this.cicle.val(), 10));
//                console.log(dt.format());
//                console.log(cl);

                var base = 28;
                var peace = 14; // dias
                var period = base - cl;
                // estimated date
                var estimated = dt.add('days', peace - period);
                var estimated_before = estimated.clone().subtract('days', 2);
                var estimated_after = estimated.clone().add('days', 2);
                var child_birth = estimated.clone().add('days', 280);

                // set results to view
//                console.log('antes', estimated_before.format("DD/MM/YYYY"));
//                console.log('estimated', estimated.format("DD/MM/YYYY"));
//                console.log('depois', estimated_after.format("DD/MM/YYYY"));
//                console.log('child_birth', child_birth.format("DD/MM/YYYY"));

                $('.estimated_before').empty().text(estimated_before.format("DD/MM/YYYY"));
                $('.estimated_after').empty().text(estimated_after.format("DD/MM/YYYY"));
                $('.child_birth').empty().text(child_birth.format("DD/MM/YYYY"));

                this.animateIn();
            },

            animateIn: function () {
                this.panel.removeClass('flipOutY').addClass('flipInY');
            },
            animateOut: function () {
                this.panel.removeClass('flipInY').addClass('flipOutY');
            }

        };
        Ovulation.init();
    });


</script>

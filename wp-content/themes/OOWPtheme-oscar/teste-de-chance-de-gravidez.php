<div class="division"></div>

<div ng-controller="CalculatorController">

    <form name="f">


        <div class="calculator gravidez">

            <div class="phase phase-1  clearfix" ng-class="{'valid':f.age.$valid}">

                <div class="col-xs-8">
                    <label for="field_1">Passo 1 - Idade</label>
                    <span class="desc" ng-class="{'animated fade':f.age.$valid}">Por favor seleccione a idade da mulher:</span>
                </div>
                <div class="col-xs-4">
                    <select name="age" id="field_1" required
                            ng-model="models.age.value"
                            ng-options="opts.label for opts in models.age.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

            </div>

            <div class="phase phase-2  clearfix " ng-class="{'valid':f.dur.$valid}">

                <div class="col-xs-8">
                    <label for="field_2">Passo 2 - Anos tentando</label>
                    <span class="desc" ng-class="{'animated fade':f.dur.$valid}">Há quantos anos você está tentando engravidar?</span>
                </div>
                <div class="col-xs-4">
                    <select name="dur" id="field_2" required required
                            ng-model="models.dur.value"
                            ng-options="opts.label for opts in models.dur.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

            </div>

            <div class="phase phase-3  clearfix" ng-class="{'valid':f.src.$valid}">

                <div class="col-xs-8">
                    <label for="field_3">Passo 3 - Fonte de óvulos</label>
                    <span class="desc" ng-class="{'animated fade':f.src.$valid}">Tem a intenção de usar os seus próprios ovos ou óvulos doados?</span>
                </div>
                <div class="col-xs-4">
                    <select name="src" id="field_3" required
                            ng-model="models.src.value"
                            ng-options="opts.label for opts in models.src.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

            </div>

            <div class="phase phase-4  clearfix" ng-class="{'valid':f.cause.$valid}">

                <div class="col-xs-8">
                    <label for="field_4">Passo 4 - Causa</label>
                    <span class="desc" ng-class="{'animated fade':f.cause.$valid}">Qual opção se aplica a você?</span>
                </div>
                <div class="col-xs-4">
                    <select name="cause" id="field_4" required
                            ng-model="models.cause.value"
                            ng-options="opts.label for opts in models.cause.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

            </div>

            <div class="phase phase-5  clearfix" ng-class="{'valid':f.cyc.$valid}">

                <div class="col-xs-8">
                    <label for="field_5">Passo 5 - As tentativas de fertilização in vitro</label>
                    <span class="desc" ng-class="{'animated fade':f.cyc.$valid}">É este o seu primeiro, segundo ou terceiro ou mais tentativa de fertilização in vitro?</span>
                </div>
                <div class="col-xs-4">
                    <select name="cyc" id="field_5" required
                            ng-model="models.cyc.value"
                            ng-options="opts.label for opts in models.cyc.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

            </div>

            <div class="phase phase-6  clearfix" ng-class="{'valid':f.atts.$valid}">

                <div class="col-xs-8">
                    <label for="field_6">Passo 6 - Tentativas anteriores de fertilização in vitro</label>
                    <span class="desc" ng-class="{'animated fade':f.atts.$valid}">Quantas tentativas sem êxito de fertilização in vitro você já teve?</span>
                </div>
                <div class="col-xs-4">
                    <select name="atts" id="field_6" required
                            ng-model="models.atts.value"
                            ng-options="opts.label for opts in models.atts.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

                <div class="info-block">
                    ”Sem êxito” significa que não havia nascido vivo, mesmo se houvesse uma gravidez.
                </div>


            </div>

            <div class="phase phase-7  clearfix" ng-class="{'valid':f.hist.$valid}">

                <div class="col-xs-8">
                    <label for="field_7">Passo 7 - História</label>
                    <span class="desc" ng-class="{'animated fade':f.hist.$valid}">Qual opção se aplica a você?</span>
                </div>
                <div class="col-xs-4">
                    <select name="hist" id="field_7" required
                            ng-model="models.hist.value"
                            ng-options="opts.label for opts in models.hist.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

            </div>

            <div class="phase phase-8  clearfix" ng-class="{'valid':f.prep.$valid}">

                <div class="col-xs-8">
                    <label for="field_8">Passo 8 - Medicação</label>
                    <span class="desc" ng-class="{'animated fade':f.prep.$valid}">Qual a medicação que você vai estar usando?</span>
                </div>
                <div class="col-xs-4">
                    <select name="prep" id="field_8" required
                            ng-model="models.prep.value"
                            ng-options="opts.label for opts in models.prep.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

                <div class="info-block">
                    Gonadotrofinas são usuais se você estiver usando seus próprios ovos e HRT é normal se você estiver usando óvulos doados.
                </div>

            </div>

            <div class="phase phase-9  clearfix" ng-class="{'valid':f.icsi.$valid}">

                <div class="col-xs-8">
                    <label for="field_9">Passo 9 - ICSI</label>
                    <span class="desc" ng-class="{'animated fade':f.icsi.$valid}">O seu médico recomendou Injeção Intracitoplasmática de Espermatozóide (ICSI)? Isso normalmente é usado se você tem uma baixa contagem de espermatozóides ou a motilidade espermática deficiente.</span>
                </div>
                <div class="col-xs-4">
                    <select name="icsi" id="field_9" required
                            ng-model="models.icsi.value"
                            ng-options="opts.label for opts in models.icsi.options"
                            ng-change="evaluateCalc(this)">
                        <option value="">Selecione</option>
                    </select>
                </div>

            </div>


            <div class="result clearfix" ng-class="{'show':f.$valid}">
                <div class="col-xs-8">
                    <span class="text">Sua chance de um nascimento por tentativa de <br/> fertilização in vitro é a seguinte:</span>
                </div>
                <div class="col-xs-4">
                    <span class="perc">{{percentage}}%</span>
                </div>
            </div>


        </div>

    </form>

</div>
<!--CalculatorController-->

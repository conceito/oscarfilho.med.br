angular.element(document).ready(function () {
    angular.bootstrap(document, ['app']);
});


var app = angular.module('app', []);

app.controller('CalculatorController', ['$scope', function ($scope) {

    var generateAges = function () {
        var ages = [];
        for (var x = 18; x <= 50; x++) {
            var val = 0;
            if (x < 35) {
                val = 0;
            } else if (x < 38) {
                val = 1;
            } else if (x < 40) {
                val = 2;
            } else if (x < 43) {
                val = 3;
            } else if (x < 45) {
                val = 4;
            } else {
                val = 5;
            }
            ages.push({"label": x, "value": val});
        }

        return ages;
    }

    $scope.percentage = 0;

    $scope.models = {
        "age": {
            "value": undefined,
            "options": generateAges()
        },
        "dur": {
            "value": undefined,
            "options": [
                {"label": "menos de 1 ano", "value": 0},
                {"label": "entre 1 e 3 anos", "value": 1},
                {"label": "entre 4 e 6 anos", "value": 2},
                {"label": "entre 7 e 9 anos", "value": 3},
                {"label": "entre 10 e 12 anos", "value": 4},
                {"label": "mais de 12 anos", "value": 5}
            ]
        },
        "src": {
            "value": undefined,
            "options": [
                {"label": "óvulos próprios", "value": 1},
                {"label": "óvulos doados", "value": 0}
            ]
        },
        "cause": {
            "value": undefined,
            "options": [
                {"label": "desconhecida", "value": 0},
                {"label": "tubos danificados", "value": 1},
                {"label": "ovulação irregular", "value": 2},
                {"label": "endometriose", "value": 3},
                {"label": "cervical", "value": 4},
                {"label": "baixa contagem de esperma", "value": 5},
                {"label": "mais de uma causa", "value": 6}
            ]
        },
        "cyc": {
            "value": undefined,
            "options": [
                {"label": "primeira", "value": 0},
                {"label": "segunda", "value": 1},
                {"label": "terceira ou mais", "value": 2}
            ]
        },
        "atts": {
            "value": undefined,
            "options": [
                {"label": "nenhuma", "value": 0},
                {"label": "uma", "value": 1},
                {"label": "duas", "value": 2},
                {"label": "três", "value": 3},
                {"label": "quatro", "value": 4},
                {"label": "cinco ou mais", "value": 5}
            ]
        },
        "hist": {
            "value": undefined,
            "options": [
                {"label": "No IVF, no pregnancy", "value": 0},
                {"label": "No IVF, pregnant only", "value": 1},
                {"label": "No IVF, live birth", "value": 2},
                {"label": "IVF, no pregnancy", "value": 3},
                {"label": "IVF, pregnant only", "value": 4},
                {"label": "IVF, live birth", "value": 5}
            ]
        },
        "prep": {
            "value": undefined,
            "options": [
                {"label": "Antiestrogênicos", "value": 0},
                {"label": "Gonadotrofinas", "value": 1},
                {"label": "reposição hormonal", "value": 2}
            ]
        },
        "icsi": {
            "value": undefined,
            "options": [
                {"label": "não", "value": 0},
                {"label": "sim", "value": 1}
            ]
        }
    };


    // Given the answers, calculates the success probability as a percentage
    var calculate = function () {
        // tables from the paper
        var t1 = [
            [0.4109, 0.1391, 0.0, -0.0909, -0.1571, -0.1545],
            [0.5934, 0.2912, 0.2, 0.17, 0.0525, 0.0849],
            [0.2423, -0.2176, -0.2586, -0.2915, -0.3462, -0.2723],
            [0.5398, 0.0927, 0.0513, 0.0146, -0.0368, -0.1145],
            [0.3773, -0.1350, -0.0336, -0.6042, -0.8615, -0.4659],
            [0.0293, -0.4004, -0.3816, 0.7505, -0.3373, -0.8469]
        ];

        var t2 = [
            [0.0, 0.0129],
            [0.0, -0.4216],
            [0.0, -0.3436],
            [0.0, -1.2512],
            [0.0, -2.1049],
            [0.0, -2.7981]
        ];

        var t3 = [
            [0.0, -0.1455, -0.0763, -0.0526, -1.1661, -0.2728, -0.22],
            [0.1481, -0.0861, 0.1688, 0.0981, 0.3989, 0.1678, 0.1450]
        ];
        var t4 = [
            [0.0, -0.1613, -0.0368],
            [0.0, -0.1663, -0.1928]
        ];

        var t5 = [0.0, -0.3210, -0.3489, -0.2496, -0.5931, -0.3863];

        // 0 means no previous IVF, never been pregnant
        // 1         ditt         , spontaneous pregnancy
        // 2         ditto        , normal live birth
        // 3 means previous unsuccessful IVF
        // 4 means previous IVF, got pregnant, no baby
        // 5 means previous successful IVF
        var t6 = [0.0, 0.0276, 0.1735, 0.1280, 0.0123, 0.4593];

        var t7 = [0.0, 0.29, 0.4458]

        // index values from the forms
        var age = $scope.models.age.value.value;
        var dur = $scope.models.dur.value.value;
        var src = $scope.models.src.value.value;
        var cause = $scope.models.cause.value.value;
        var cyc = $scope.models.cyc.value.value;
        var atts = $scope.models.atts.value.value;
        var hist = $scope.models.hist.value.value;
        var prep = $scope.models.prep.value.value;
        var icsi = $scope.models.icsi.value.value;


//        if (age < 0 || dur < 0 || src < 0 || cause < 0 || cyc < 0 || atts < 0 || hist < 0 || prep < 0 || icsi < 0) {
//            alert("At least one question has not yet been answered!");
//        }

        //else if ((atts==0 && hist >2) || (atts > 0 && hist < 3 )  ) {
        //alert("There is a mismatch between your IVF attempts and pregnancy history.")
        //}


        var yup = t1[age][dur] + t2[age][src] + t3[icsi][cause] + t4[icsi][cyc]
            + t5[atts] + t6[hist] + t7[prep];

        var y = -1.1774;
        y = y + yup;
        var prob = (100 * Math.exp(y)) / (1 + Math.exp(y));
        prob = Math.round(prob * 10) / 10;
        //alert(age + "!" + dur + "!" + src + "!" + cause + "!" + cyc + "!" + atts + "!" +
        // hist + "!" + prep + "!" + icsi + "!" + y + "!" + prob);

        return prob;
    }


    $scope.evaluateCalc = function (obj) {

        if ($scope.f.$valid) {
            // loop models
//            angular.forEach($scope.models, function (model) {
////            console.log(model.value);
//            });

            $scope.percentage = calculate();
        }


    };


}]);
var app = angular.module('myApp', []);

//Get data from JSON
app.controller('sortController', ['$http', function ($http) {

    var vm = this;
    vm.search = search;
    vm.searchMatrix = {
        pris: {
            a: false,
            b: false,
            c: false,
            d: false
        },
        varugrupp: {
            redwine: false,
            whitewine: false,
            mousserandevin: false,
            beer: false,
            whisky: false,
        },
        forpackning: {
            full: false,
            half: false,
            box: false,
            big: false,
            pet: false,
        },
        alkoholhalt: {
            top: null,
            low: null,
        },
        landet: {
            argentina: false,
            austrilian: false,
            brasilien: false,
            chile: false,
            frankrike: false,
            italien: false,
            kanada: false,
            ryssland: false,
            spanien: false,
            usa: false,
            tyskland: false,
            sydafrika: false,
            mexiko: false,
            nya_zeeland: false,
            portugal: false,
            sverige: false
        }
    };

    $http.get('http://127.0.0.1/Systembolaget/php/api.php')
        .success(function (data) {
            vm.sortiments = data;
        }).error(function (data) {
            console.log(data);
        });

    function search(item) {
        var price = parseFloat(item.Pris);
        var Varugrupp = item.Varugrupp;
        var Forpackning = item.Forpackning;
        var Alkoholhalt = parseFloat(item.Alkoholhalt.split("%")[0]);
        var Landet = item.Landet;
        var matchPrice = false;
        var matchVarugrupp = false;
        var matchForpackning = false;
        var matchAlkoholhalt = false;
        var matchLandet = false;
        /************************price search**************************/
        if (vm.searchMatrix.pris.a) {
            if (price <= 120) {
                matchPrice = true;
            }
        }
        if (vm.searchMatrix.pris.b) {
            if (price <= 185 && price >= 121) {
                matchPrice = true;
            }
        }
        if (vm.searchMatrix.pris.c) {
            if (price <= 310 && price >= 186) {
                matchPrice = true;
            }
        }
        if (vm.searchMatrix.pris.d) {
            if (price >= 311) {
                matchPrice = true;
            }
        }
        if (!(vm.searchMatrix.pris.a ||
                vm.searchMatrix.pris.b ||
                vm.searchMatrix.pris.c ||
                vm.searchMatrix.pris.d)) {
            matchPrice = true;
        }
        /************************Varugrupp search**************************/
        if (vm.searchMatrix.varugrupp.redwine) {
            if (Varugrupp == "R?tt vin") {
                matchVarugrupp = true;
            }
        }
        if (vm.searchMatrix.varugrupp.whitewine) {
            if (Varugrupp == "Vitt vin") {
                matchVarugrupp = true;
            }
        }
        if (vm.searchMatrix.varugrupp.mousserandevin) {
            if (Varugrupp == "Mousserande vin") {
                matchVarugrupp = true;
            }
        }
        if (vm.searchMatrix.varugrupp.beer) {
            if (Varugrupp == "?l") {
                matchVarugrupp = true;
            }
        }
        if (vm.searchMatrix.varugrupp.whisky) {
            if (Varugrupp == "Whisky") {
                matchVarugrupp = true;
            }
        }
        if (!(vm.searchMatrix.varugrupp.redwine ||
                vm.searchMatrix.varugrupp.whitewine ||
                vm.searchMatrix.varugrupp.mousserandevin ||
                vm.searchMatrix.varugrupp.whisky)) {
            matchVarugrupp = true;
        }
        /************************Forpackning search**************************/
        if (vm.searchMatrix.forpackning.full) {
            if (Forpackning == "Flaska") {
                matchForpackning = true;
            }
        }
        if (vm.searchMatrix.forpackning.half) {
            if (Forpackning == "Halvflaska") {
                matchForpackning = true;
            }
        }
        if (vm.searchMatrix.forpackning.box) {
            if (Forpackning == "Burk") {
                matchForpackning = true;
            }
        }
        if (vm.searchMatrix.forpackning.big) {
            if (Forpackning == "Helflaska") {
                matchForpackning = true;
            }
        }
        if (vm.searchMatrix.forpackning.pet) {
            if (Forpackning == "PET") {
                matchForpackning = true;
            }
        }
        if (!(vm.searchMatrix.forpackning.full ||
                vm.searchMatrix.forpackning.half ||
                vm.searchMatrix.forpackning.box ||
                vm.searchMatrix.forpackning.big ||
                vm.searchMatrix.forpackning.pet)) {
            matchForpackning = true;
        }
        /************************Alkoholhalt search**************************/
            if (vm.searchMatrix.alkoholhalt.low && !vm.searchMatrix.alkoholhalt.top) {
                if (Alkoholhalt >= vm.searchMatrix.alkoholhalt.low) {
                    matchAlkoholhalt = true;
                }
            }
            if (vm.searchMatrix.alkoholhalt.top && !vm.searchMatrix.alkoholhalt.low) {
                if (Alkoholhalt <= vm.searchMatrix.alkoholhalt.top) {
                    matchAlkoholhalt = true;
                }
            }
            if(vm.searchMatrix.alkoholhalt.low && vm.searchMatrix.alkoholhalt.top){
              if (vm.searchMatrix.alkoholhalt.low <= Alkoholhalt <= vm.searchMatrix.alkoholhalt.top ){
                  matchAlkoholhalt = true;
              }  
            }
            if (!(vm.searchMatrix.alkoholhalt.low ||
                    vm.searchMatrix.alkoholhalt.top)) {
                matchAlkoholhalt = true;
            }
        /************************Landet search**************************/
         if (vm.searchMatrix.landet.argentina) {
            if ( Landet == "Argentina") {
                matchLandet = true;
            }
        };
         if (vm.searchMatrix.landet.austrilian) {
            if (Landet == "Australien") {
                matchLandet = true;
            }
        };
         if (vm.searchMatrix.landet.brasilien) {
            if (Landet == "Brasilien") {
                matchLandet = true;
            }
        };
         if (vm.searchMatrix.landet.chile) {
            if (Landet == "Chile") {
                matchLandet = true;
            }
        };
         if (vm.searchMatrix.landet.frankrike) {
            if (Landet == "Frankrike") {
                matchLandet = true;
            }
        };
         if (vm.searchMatrix.landet.italien) {
            if (Landet == "Italien") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.kanada) {
            if (Landet == "Kanada") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.ryssland) {
            if (Landet == "Ryssland") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.spanien) {
            if (Landet == "Spanien") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.usa) {
            if (Landet == "USA") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.tyskland) {
            if (Landet == "Tyskland") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.sydafrika) {
            if (Landet == "Sydafrika") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.mexiko) {
            if (Landet == "Mexiko") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.nya_zeeland) {
            if (Landet == "Nya Zeeland") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.portugal) {
            if (Landet == "Portugal") {
                matchLandet = true;
            }
        };
          if (vm.searchMatrix.landet.sverige) {
            if (Landet == "Sverige") {
                matchLandet = true;
            }
        };
        if (!(vm.searchMatrix.landet.argentina ||
                vm.searchMatrix.landet.austrilian ||
                vm.searchMatrix.landet.brasilien ||
                vm.searchMatrix.landet.chile ||
                vm.searchMatrix.landet.frankrike ||
                vm.searchMatrix.landet.italien ||
                vm.searchMatrix.landet.kanada ||
                vm.searchMatrix.landet.ryssland ||
                vm.searchMatrix.landet.spanien ||
                vm.searchMatrix.landet.usa ||
                vm.searchMatrix.landet.tyskland ||
                vm.searchMatrix.landet.sydafrika ||
                vm.searchMatrix.landet.mexiko ||
                vm.searchMatrix.landet.nya_zeeland ||
                vm.searchMatrix.landet.portugal ||
                vm.searchMatrix.landet.sverige)) {
            matchLandet = true;
        };
        return matchPrice && matchForpackning && matchVarugrupp && matchAlkoholhalt && matchLandet;
    }

            }]);
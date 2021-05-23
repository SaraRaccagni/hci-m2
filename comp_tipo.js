function compPalavras(palavras2) {

//-----------------------------------------------------------------------
//----------------------- COMPOSIÇÃO TIPOGRÁFICA -------------------------
//------------------------------------------------------------------------

    var num_pal= palavras2.features.length;
    console.log (num_pal);

    for (var i =0; i<num_pal; i++) {
        var max = 0;
        //aceder palavras
        var words = palavras2.features[i].properties.palavra;
        //aceder nº de repetições
        var repe = palavras2.features[i].properties.rep;
        //aceder coordenadas
        var coord = palavras2.features[i].geometry.coordinates[i];

        max = (max < parseFloat(repe)) ? parseFloat(repe) : max;
        var opacity = repe / max;
        //palavra_el.style.opacity = opacity;
    }


//-----------------------------------------------------------------------
//------------------------------- MAPA ----------------------------------
//-----------------------------------------------------------------------

    //definir visualização mapa
    var mymap = L.map('mapid').setView([40.196352, -8.404005], 13);

    // deifnir tile do mapa
    L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=WdcTGuG5ljgDFUUE3uo3', {
        attribution: '<a href="https://www.maptiler.com/copyright/" ' +
            'target="_blank">&copy; ' +
            'MapTiler</a> <a href="https://www.openstreetmap.org/copyright" ' +
            'target="_blank">&copy; ' +
            'OpenStreetMap contributors</a>',
    }).addTo(mymap);

    //ICON ÁRVORE
    var arvoreIcon = L.icon({
        iconUrl: 'img/arvore.png',
        iconSize: [50, 32]
    });
    var arvoreMarker = L.marker([40.2018, -8.4256], {icon: arvoreIcon}).addTo(mymap);

    //ICON ÁRVORE - choupal
    var arvore2Icon = L.icon({
        iconUrl: 'img/arvore.png',
        iconSize: [50, 32]
    });
    var arvore2Marker = L.marker([40.22246974138522, -8.443942795743165], {icon: arvore2Icon}).addTo(mymap);

    //ICON PARQUE
    var parqueIcon = L.icon({
        iconUrl: 'img/parque.png',
        iconSize: [50, 32]
    });
    var parqueMarker = L.marker([40.196352, -8.404005], {icon: parqueIcon}).addTo(mymap);

    //ICON ESCOLA - JF
    var escolaIcon = L.icon({
        iconUrl: 'img/escola.png',
        iconSize: [50, 32]
    });
    var escolaMarker = L.marker([40.21184624848905, -8.413023670748354], {icon: escolaIcon}).addTo(mymap);

    //ICON BAR - Moelas
    var barIcon = L.icon({
        iconUrl: 'img/bares.png',
        iconSize: [50, 32]
    });
    var barMarker = L.marker([40.2088474055209, -8.427540734705197], {icon: barIcon}).addTo(mymap);

    //ICON PONTE - Europa
    var ponteIcon = L.icon({
        iconUrl: 'img/ponte.png',
        iconSize: [50, 32]
    });
    var ponteMarker = L.marker([40.19278254113339, -8.423536789259227], {icon: ponteIcon}).addTo(mymap);

    //ICON PONTE - Santa Clara
    var ponte2Icon = L.icon({
        iconUrl: 'img/ponte.png',
        iconSize: [50, 32]
    });
    var ponte2Marker = L.marker([40.205920345013766, -8.430720702793382], {icon: ponte2Icon}).addTo(mymap);


    //MARKERS

    L.geoJson(palavras2).addTo(mymap);
    var composicao_cont = document.getElementById("divisao");

    var layerGroup = L.geoJSON(palavras2, {

        onEachFeature: function (feature, layer) {

            var coordinates= feature.geometry.coordinates;

            layer.bindPopup('<h1>' + feature.properties.palavra + '</h1>'+ '<br>'+ coordinates);

            mymap.on('zoomend', function() {


                console.log(mymap.getBounds());

                var h1_word= document.createElement('h1');
                composicao_cont.appendChild(h1_word);

                if (mymap.getBounds().contains(coordinates)){
                    console.log("dentro")

                    console.log(coordinates);
                    h1_word.innerHTML = feature.properties.palavra;
                }

                else {console.log("fora")
                    h1_word.innerHTML = ".";
                }

            });

        }
    }).addTo(mymap);




}

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
    var mymap = L.map('mapid').setView([40.1932,-8.4051], 10);

    // deifnir tile do mapa
    L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=WdcTGuG5ljgDFUUE3uo3', {
        attribution: '<a href="https://www.maptiler.com/copyright/" ' +
            'target="_blank">&copy; ' +
            'MapTiler</a> <a href="https://www.openstreetmap.org/copyright" ' +
            'target="_blank">&copy; ' +
            'OpenStreetMap contributors</a>',
    }).addTo(mymap);

    var LeafIcon = L.Icon.extend({
        options: {
            iconSize: [50, 32]
        }
    });

    //ICON ÁRVORE

    var arvoreIcon = new LeafIcon({iconUrl: 'img/arvore.png',}),
        arvore2Icon = new LeafIcon({iconUrl: 'img/arvore.png',}),
        parqueIcon= new LeafIcon({iconUrl: 'img/parque.png',}),
        escolaIcon= new LeafIcon({iconUrl: 'img/escola.png',}),
        barIcon= new LeafIcon({iconUrl: 'img/bares.png',}),
        ponteIcon= new LeafIcon({iconUrl: 'img/ponte.png',}),
        ponte2Icon= new LeafIcon({iconUrl: 'img/ponte.png',});


    var arvoreMarker = L.marker([40.2018, -8.4256], {icon: arvoreIcon}).addTo(mymap);
    var arvore2Marker = L.marker([40.22246974138522, -8.443942795743165], {icon: arvore2Icon}).addTo(mymap);
    var parqueMarker = L.marker([40.196352, -8.404005], {icon: parqueIcon}).addTo(mymap);
    var escolaMarker = L.marker([40.21184624848905, -8.413023670748354], {icon: escolaIcon}).addTo(mymap);
    var barMarker = L.marker([40.2088474055209, -8.427540734705197], {icon: barIcon}).addTo(mymap);
    var ponteMarker = L.marker([40.19278254113339, -8.423536789259227], {icon: ponteIcon}).addTo(mymap);
    var ponte2Marker = L.marker([40.205920345013766, -8.430720702793382], {icon: ponte2Icon}).addTo(mymap);


    //MARKERS

    L.geoJson(palavras2).addTo(mymap);

    var composicao_cont = document.getElementById("divisao");

    var layerGroup = L.geoJSON(palavras2, {

        onEachFeature: function (feature, layer) {

            var coordinates= feature.geometry.coordinates;

            layer.bindPopup('<h1>' + feature.properties.palavra + '</h1>'+ '<br>'+ coordinates);

            mymap.on('zoomend', function() {

                var map_coord= mymap.getBounds();

                var lat1_map = map_coord._northEast.lat;
                var long1_map = map_coord._northEast.long;

                var lat2_map = map_coord._southWest.lat;
                var long2_map = map_coord._southWest.long;

                var long_pal= feature.properties.palavra + coordinates[0];
                var lat_pal= feature.properties.palavra + coordinates[1];

                var h1_word= document.createElement('h1');
                composicao_cont.appendChild(h1_word);

                console.log(map_coord);
                console.log(coordinates + feature.properties.palavra);

                if (lat1_map<lat_pal< lat2_map) {
                    console.log("lat dentro");
                    console.log(lat_pal)
                    //h1_word.innerHTML = feature.properties.palavra;
                }
                else if(long1_map< long_pal< long2_map){
                    console.log("long dentro");
                }

                //else if (lat_pal< lat1_map || lat_pal>lat2_map && long_pal< long1_map || long_pal>long2_map)
                else
                {
                    console.log("fora");
                    h1_word.innerHTML = ".";

                }
            });



        }

    }).addTo(mymap);




}

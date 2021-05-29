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

    }
    var composicao_cont = document.getElementById("divisao");

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

    var LeafIconV = L.Icon.extend({
        options: {
            iconSize: [30, 40]
        }
    });

    var LeafIconH = L.Icon.extend({
        options: {
            iconSize: [40, 30]
        }
    });

    var LeafIconQ = L.Icon.extend({
        options: {
            iconSize: [40, 40]
        }
    });

/*    var arvoreIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/5cyOCt2.png',}),
        parqueIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/ANEairs.png',}),
        escolaIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/VGaU03e.png',}),
        barIcon = new LeafIconV({iconUrl: 'https://i.imgur.com/UrCPuqx.png',}),
        ponteIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/Ndd8IkY.png',}),
    estadioIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/ctL9Wsi.png',}),
    gymIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/ksGTrnt.png',}),
    canoaIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/j8Uv4C6.png',}),
    hospitalIcon = new LeafIconV({iconUrl: 'https://i.imgur.com/qdAT5Mv.png',}),
    restauIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/5qPvN2R.png',}),
    cafeIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/hvdYR2F.png',}),
    igrejaIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/1Rp8Cdq.png',}),
    poolIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/8t4DipY.png',}),
    historicoIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/e2caFb1.png',}),
    cemiterioIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/jKuO42T.png',}),
    estacionarIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/Ev0f1ys.png',});*/

//ICONES
    /*var arvoreMarker = L.marker([40.2018, -8.4256], {icon: arvoreIcon}).addTo(mymap); // parque verde
    var arvore2Marker = L.marker([40.22246974138522, -8.443942795743165], {icon: arvoreIcon}).addTo(mymap); // choupal
    var arvore3Marker = L.marker([40.20564508678762, -8.420796772886058], {icon: arvoreIcon}).addTo(mymap); //Bôtanico
    var arvore4Marker = L.marker([40.20939893994936, -8.41804052597108], {icon: arvoreIcon}).addTo(mymap); //Sereia

    var parqueMarker = L.marker([40.196352, -8.404005], {icon: parqueIcon}).addTo(mymap); // skate park

    var escolaMarker = L.marker([40.21184624848905, -8.413023670748354], {icon: escolaIcon}).addTo(mymap); //JF
    var escola2Marker = L.marker([40.20666042879046, -8.407733973572045], {icon: escolaIcon}).addTo(mymap); // Dona Maria
    var escola3Marker = L.marker([40.1932455339252, -8.408496313707511], {icon: escolaIcon}).addTo(mymap); //Quinta das Flores

    var barMarker = L.marker([40.2088474055209, -8.427540734705197], {icon: barIcon}).addTo(mymap); //moelas
    var bar2Marker = L.marker([40.19467352425028, -8.432726192892693], {icon: barIcon}).addTo(mymap); //praxis
    var ponteMarker = L.marker([40.19278254113339, -8.423536789259227], {icon: ponteIcon}).addTo(mymap); //europa
    var ponte2Marker = L.marker([40.205920345013766, -8.430720702793382], {icon: ponteIcon}).addTo(mymap); // santa clara
    var estadioMarker = L.marker([40.203343613511606, -8.408715376081693], {icon: estadioIcon}).addTo(mymap); //estadio
    var estadio2Marker = L.marker([40.20611084382039, -8.434258809782644], {icon: estadioIcon}).addTo(mymap); //universitario
    var gymMarker = L.marker([40.21235161471066, -8.417551978968467], {icon: gymIcon}).addTo(mymap); //phive
    var gym2Marker = L.marker([40.20705470120816, -8.416638283771203], {icon: gymIcon}).addTo(mymap); //faculdades do corpo
    var gym3Marker = L.marker([40.205596298484366, -8.402161343583506], {icon: gymIcon}).addTo(mymap); //nelson gym

    var canoaMarker = L.marker([40.20025973425019, -8.429079245272364], {icon: canoaIcon}).addTo(mymap); //clube da canoagem
    var hospitalMarker = L.marker([40.221005509842676, -8.412907481761186], {icon: hospitalIcon}).addTo(mymap); //chuc

    var restauMarker = L.marker([40.20321027885228, -8.40500232530637], {icon: restauIcon}).addTo(mymap); //honorato
    var restau2Marker = L.marker([40.20418925291278, -8.432933619518556], {icon: restauIcon}).addTo(mymap); //la vara
    var restau3Marker = L.marker([40.19562595491643, -8.430944554379028], {icon: restauIcon}).addTo(mymap); //churrasqueira de santa clara
    var restau4Marker = L.marker([40.21511024320861, -8.413829904705961], {icon: restauIcon}).addTo(mymap); //rei dos frangos
    var restau5Marker = L.marker([40.21489421775138, -8.411112208024443], {icon: restauIcon}).addTo(mymap); // casa dos pregos

    var cafeMarker = L.marker([40.20378479554401, -8.404815590345368], {icon: cafeIcon}).addTo(mymap); //s.josé
    var cafe2Marker = L.marker([40.20778151067923, -8.42925854061681], {icon: cafeIcon}).addTo(mymap); //portagem
    var cafe3Marker = L.marker([40.21425034925935, -8.41695832968547], {icon: cafeIcon}).addTo(mymap); //venus
    var cafe4Marker = L.marker([40.209840359175715, -8.420178728687217], {icon: cafeIcon}).addTo(mymap); //cartola

    var igrejaMarker = L.marker([40.20898682110583, -8.427226034871754], {icon: igrejaIcon}).addTo(mymap); //sé velha
    var igreja2Marker = L.marker([40.20942095159728, -8.425001246865595], {icon: igrejaIcon}).addTo(mymap); //sé nova

    var poolMarker = L.marker([40.20526082449558, -8.407283874059294], {icon: poolIcon}).addTo(mymap); //piscinas solum
    var pool2Marker = L.marker([40.21464316354349, -8.416802734390107], {icon: poolIcon}).addTo(mymap); //piscinas celas

    var historicoMarker = L.marker([40.20303910987843, -8.433130908432924], {icon: historicoIcon}).addTo(mymap); //mosteiro santa clara
    var historico2Marker = L.marker([40.19849953536051, -8.435155147496276], {icon: historicoIcon}).addTo(mymap); //quinta das lágrimas
    var historico3Marker = L.marker([40.209158101892655, -8.42549159887599], {icon: historicoIcon}).addTo(mymap); //machado de castro
    var historico4Marker = L.marker([40.203713675395825, -8.435900496114982], {icon: historicoIcon}).addTo(mymap); //convento são francisco

    var cemiterioMarker = L.marker([40.217062424412596, -8.432050019057382], {icon: cemiterioIcon}).addTo(mymap); //cemiterio da conchada
    var cemiterio2Marker = L.marker([40.19780410889759, -8.43936168134966], {icon: cemiterioIcon}).addTo(mymap); //cemiterio santa clara

    var estacionarMarker = L.marker([40.21701770168006, -8.438902747138705], {icon: estacionarIcon}).addTo(mymap); //estacionamento
*/
    L.geoJson(palavras2).addTo(mymap);



    var layerGroup = L.geoJSON(palavras2, {
        style: function(feature) {
            return {color: '#8C85D2'};
        },

        pointToLayer: function(feature, latlng) {
            return new L.CircleMarker(latlng, {radius: 5, fillOpacity: 0.85});
        },
        onEachFeature: function (feature, layer) {

            //PALAVRAS
            //OPACIDADE PALAVRAS
            var repe = feature.properties.rep;

            max = (max < parseFloat(repe)) ? parseFloat(repe) : max;
            var opacity = repe / max;

            //ADICIONA PALAVRA
            var h1_word= document.createElement('h1');
            composicao_cont.appendChild(h1_word);
            h1_word.style.opacity = opacity;
            h1_word.innerHTML = feature.properties.palavra;

            //ANIMAÇÕES
            setSaxxMouseEffect ( 'h1' , 'saxx swing') ;
            mymap.on('zoomend', function() {
                setAnimationSaxx ( 'h1' , 'saxx swing' );
            });

            //CLICK PALAVRA SHOW MARKER
            h1_word.addEventListener("click", function(){
                layer.bindPopup('<h2>' + feature.properties.palavra + '</h2>').openPopup();
            });

            // ZOOM E CENTRA MARKER QD SE CLICA
            mymap.on('popupopen', function(centerMarker) {
                var cM = mymap.project(centerMarker.popup._latlng);
                cM.y -= centerMarker.popup._container.clientHeight/2
                mymap.setView(mymap.unproject(cM),16, {animate: true});
            });

        }

    }).addTo(mymap);





}

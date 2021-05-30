function compPalavras(palavras2, coimbra) {

//-----------------------------------------------------------------------
//----------------------- COMPOSIÇÃO TIPOGRÁFICA -------------------------
//------------------------------------------------------------------------
    var num_pal= palavras2.features.length;
    console.log ("num pal:"+ num_pal);

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
    L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=YXs4eleN4nyqgfQHZW1d', {
        attribution: '<a href="<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>" ' +
            'target="_blank">&copy; ' +
            'MapTiler</a> <a href="https://www.openstreetmap.org/copyright" ' +
            'target="_blank">&copy; ' +
            'OpenStreetMap contributors</a>',
    }).addTo(mymap);
//ICONES
//tamanho
    var LeafIconV = L.Icon.extend({
        options: {
            iconSize: [30, 40]
        }});
    var LeafIconH = L.Icon.extend({
        options: {
            iconSize: [40, 30]
        }});
    var LeafIconQ = L.Icon.extend({
        options: {
            iconSize: [40, 40]
        }});
    //source
    var arvoreIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/IWGhvR6.png'}), parqueIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/1Hu97Lq.png'}),
        escolaIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/ySZP9FU.png'}), barIcon = new LeafIconV({iconUrl: 'https://i.imgur.com/qLi6puU.png'}),
        ponteIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/XhZZtUT.png'}), estadioIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/fkfjubA.png'}),
        gymIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/bah3sz0.png'}), canoaIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/cy5YFwe.png'}),
        hospitalIcon = new LeafIconV({iconUrl: 'https://i.imgur.com/9ZSJRUW.png'}), restauIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/VcLl58P.png'}),
        cafeIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/fElx0LF.png'}), igrejaIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/Cnoxdft.png'}),
        poolIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/K0xix8v.png'}), historicoIcon = new LeafIconH({iconUrl: 'https://i.imgur.com/pVva45h.png'}),
        cemiterioIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/TXNRFvP.png'}), estacionarIcon = new LeafIconQ({iconUrl: 'https://i.imgur.com/q6oyJ55.png'});
    //coordenadas
    var arvoreMarker = L.marker([40.2018, -8.4256], {icon: arvoreIcon}).bindPopup("Parque Verde"), // parque verde
        arvore2Marker = L.marker([40.22246974138522, -8.443942795743165], {icon: arvoreIcon}).bindPopup("Choupal"), // choupal
        arvore3Marker = L.marker([40.20564508678762, -8.420796772886058], {icon: arvoreIcon}).bindPopup("Botânico"), //Bôtanico
        arvore4Marker = L.marker([40.20939893994936, -8.41804052597108], {icon: arvoreIcon}).bindPopup("Jardim da Sereia"), //Sereia

        parqueMarker = L.marker([40.196352, -8.404005], {icon: parqueIcon}), // skate park

        escolaMarker = L.marker([40.21184624848905, -8.413023670748354], {icon: escolaIcon}).bindPopup("Escola José Falcão"), //JF
        escola2Marker = L.marker([40.20666042879046, -8.407733973572045], {icon: escolaIcon}).bindPopup("Escola Dona Maria"), // Dona Maria
        escola3Marker = L.marker([40.1932455339252, -8.408496313707511], {icon: escolaIcon}).bindPopup("Escola Quinta das Flores"), //Quinta das Flores

        barMarker = L.marker([40.2088474055209, -8.427540734705197], {icon: barIcon}).bindPopup("Bar O Moelas"), //moelas
        bar2Marker = L.marker([40.19467352425028, -8.432726192892693], {icon: barIcon}).bindPopup("Praxis"), //praxis

        ponteMarker = L.marker([40.19278254113339, -8.423536789259227], {icon: ponteIcon}).bindPopup("Ponte Europa"), //europa
        ponte2Marker = L.marker([40.205920345013766, -8.430720702793382], {icon: ponteIcon}).bindPopup("Ponte Santa Clara"), // santa clara

        estadioMarker = L.marker([40.203343613511606, -8.408715376081693], {icon: estadioIcon}).bindPopup("Estádio Académica"), //estadio
        estadio2Marker = L.marker([40.20611084382039, -8.434258809782644], {icon: estadioIcon}).bindPopup("Estádio Universitário"), //universitario

        gymMarker = L.marker([40.21235161471066, -8.417551978968467], {icon: gymIcon}).bindPopup("Phive"), //phive
        gym2Marker = L.marker([40.20705470120816, -8.416638283771203], {icon: gymIcon}).bindPopup("Faculdades do Corpo"), //faculdades do corpo
        gym3Marker = L.marker([40.205596298484366, -8.402161343583506], {icon: gymIcon}).bindPopup("Nelson Gym"), //nelson gym

        canoaMarker = L.marker([40.20025973425019, -8.429079245272364], {icon: canoaIcon}).bindPopup("Clube de Canoagem"), //clube da canoagem
        hospitalMarker = L.marker([40.221005509842676, -8.412907481761186], {icon: hospitalIcon}).bindPopup("CHUC"), //chuc

        restauMarker = L.marker([40.20321027885228, -8.40500232530637], {icon: restauIcon}).bindPopup("Honorato"), //honorato
        restau2Marker = L.marker([40.20418925291278, -8.432933619518556], {icon: restauIcon}).bindPopup("La Vara"), //la vara
        restau3Marker = L.marker([40.19562595491643, -8.430944554379028], {icon: restauIcon}).bindPopup("Churrasqueira de Santa Clara"), //churrasqueira de santa clara
        restau4Marker = L.marker([40.21511024320861, -8.413829904705961], {icon: restauIcon}).bindPopup("Rei dos Frangos"), //rei dos frangos
        restau5Marker = L.marker([40.21489421775138, -8.411112208024443], {icon: restauIcon}).bindPopup("Casa dos Pregos"), // casa dos pregos

        cafeMarker = L.marker([40.20378479554401, -8.404815590345368], {icon: cafeIcon}).bindPopup("São José"), //s.josé
        cafe2Marker = L.marker([40.20778151067923, -8.42925854061681], {icon: cafeIcon}).bindPopup("Portagem"), //portagem
        cafe3Marker = L.marker([40.21425034925935, -8.41695832968547], {icon: cafeIcon}).bindPopup("Venus"), //venus
        cafe4Marker = L.marker([40.209840359175715, -8.420178728687217], {icon: cafeIcon}).bindPopup("Cartola"), //cartola

        igrejaMarker = L.marker([40.20898682110583, -8.427226034871754], {icon: igrejaIcon}).bindPopup("Sé Velha"), //sé velha
        igreja2Marker = L.marker([40.20942095159728, -8.425001246865595], {icon: igrejaIcon}).bindPopup("Sé Nova"), //sé nova

        poolMarker = L.marker([40.20526082449558, -8.407283874059294], {icon: poolIcon}).bindPopup("Piscinas Solum"), //piscinas solum
        pool2Marker = L.marker([40.21464316354349, -8.416802734390107], {icon: poolIcon}).bindPopup("Piscinas Celas"), //piscinas celas

        historicoMarker = L.marker([40.20303910987843, -8.433130908432924], {icon: historicoIcon}).bindPopup("Mosteiro de Santa Clara"), //mosteiro santa clara
        historico2Marker = L.marker([40.19849953536051, -8.435155147496276], {icon: historicoIcon}).bindPopup("Quinta das Lágrimas"), //quinta das lágrimas
        historico3Marker = L.marker([40.209158101892655, -8.42549159887599], {icon: historicoIcon}).bindPopup("Machado de Castro"), //machado de castro
        historico4Marker = L.marker([40.203713675395825, -8.435900496114982], {icon: historicoIcon}).bindPopup("Convento São Francisco"), //convento são francisco

        cemiterioMarker = L.marker([40.217062424412596, -8.432050019057382], {icon: cemiterioIcon}).bindPopup("Cemitério da Conchada"), //cemiterio da conchada
        cemiterio2Marker = L.marker([40.19780410889759, -8.43936168134966], {icon: cemiterioIcon}).bindPopup("Cemitério Santa Clara"), //cemiterio santa clara

        estacionarMarker = L.marker([40.21701770168006, -8.438902747138705], {icon: estacionarIcon}).bindPopup("Estacionamento"); //estacionamento
    //adicionar mapa
    var icones = L.layerGroup([ arvoreMarker,arvore2Marker,arvore3Marker,arvore4Marker,parqueMarker, escolaMarker,escola2Marker, escola3Marker,barMarker,bar2Marker,ponteMarker,ponte2Marker,
    estadioMarker,estadio2Marker,gymMarker,gym2Marker,gym3Marker, canoaMarker,hospitalMarker, restauMarker, restau2Marker, restau3Marker, restau4Marker,restau5Marker,
    cafeMarker,cafe2Marker,cafe3Marker,cafe4Marker, igrejaMarker,igreja2Marker, poolMarker,pool2Marker, historicoMarker,historico2Marker,historico3Marker,historico4Marker,
    cemiterioMarker,cemiterio2Marker,estacionarMarker]).addTo(mymap);


    var palavras = L.geoJSON(palavras2, {

        style: function(feature) {
            return {color: '#94A2FD'};
        },

        pointToLayer: function(feature, latlng) {

            var limitesMapa= mymap.getBounds();
            mymap.on('zoomend', function() {
                var limitesMapa= mymap.getBounds();
            });

            if (limitesMapa.contains(latlng)){
             return new L.CircleMarker(latlng, {radius: 5, fillOpacity: 0.85});}
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
            //setSaxxMouseEffect ( 'h1' , 'saxx swing') ;
            setSaxxMouseEffect ( 'h1' , 'saxx swing' , 'white' , '#28234E' ) ;

            mymap.on('zoomend', function() {
                setAnimationSaxx ( 'h1' , 'saxx swing' );

            });

            //CLICK PALAVRA SHOW MARKER
            h1_word.addEventListener("click", function(){
                layer.bindPopup('<h2>' + feature.properties.palavra + '</h2>').openPopup();
            });
            var popup = L.popup().setContent('<h2>' + feature.properties.palavra + '</h2>');
            layer.bindPopup(popup).openPopup();

            // ZOOM E CENTRA MARKER QD SE CLICA
            mymap.on('popupopen', function(centerMarker) {
                var cM = mymap.project(centerMarker.popup._latlng);
                cM.y -= centerMarker.popup._container.clientHeight/2
                mymap.setView(mymap.unproject(cM),16, {animate: true});
            });

        }
    });


    var coimbra = L.geoJSON(coimbra,{
        style: function(feature) {
            return{
                weight: 2,
                opacity: 1,
                color: '#94A2FD',
                dashArray: '3',
                fillOpacity: 0  }
        }
    });

    var coimbraLayer = new L.LayerGroup([coimbra,palavras]).addTo(mymap);



}

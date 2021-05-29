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
    L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=WdcTGuG5ljgDFUUE3uo3', {
        attribution: '<a href="https://www.maptiler.com/copyright/" ' +
            'target="_blank">&copy; ' +
            'MapTiler</a> <a href="https://www.openstreetmap.org/copyright" ' +
            'target="_blank">&copy; ' +
            'OpenStreetMap contributors</a>',
    }).addTo(mymap);

    var LeafIconQ = L.Icon.extend({
        options: {
            iconSize: [40, 40]
        }
    });
    var arvoreIcon =new LeafIconQ({iconUrl: 'basket.png'});
   L.marker([40.2018, -8.4256],{icon: arvoreIcon}).addTo(mymap).bindPopup("olá");

    var coimbra= L.geoJSON(coimbra,{
        style: function(feature) {
            return{
                weight: 2,
                opacity: 1,
                color: '#94A2FD',
                dashArray: '3',
                fillOpacity: 0  }
        }

    }).addTo(mymap);



    var layerGroup = L.geoJSON(palavras2, {
        style: function(feature) {
            return {color: '#94A2FD'};
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
            var popup = L.popup().setContent('<h2>' + feature.properties.palavra + '</h2>');
            layer.bindPopup(popup).openPopup();

            // ZOOM E CENTRA MARKER QD SE CLICA
            mymap.on('popupopen', function(centerMarker) {
                var cM = mymap.project(centerMarker.popup._latlng);
                cM.y -= centerMarker.popup._container.clientHeight/2
                mymap.setView(mymap.unproject(cM),16, {animate: true});
            });

        }

    }).addTo(mymap);


}
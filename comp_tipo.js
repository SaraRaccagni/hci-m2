function compPalavras(palavras2) {

//-----------------------------------------------------------------------
//----------------------- COMPOSIÇÃO TIPOGRÁFICA -------------------------
//------------------------------------------------------------------------

    var num_pal= palavras2.features.length;
    console.log (num_pal);

    for ($i=0; $i<num_pal; $i++) {

        var max = 0;

        //aceder palavras
        var words = palavras2.features[$i].properties.palavra;
        //aceder nº de repetições
        var repe = palavras2.features[$i].properties.rep;
        //aceder coordenadas
        var coord = palavras2.features[$i].geometry.coordinates[$i];

        max = (max < parseFloat(repe)) ? parseFloat(repe) : max;

        var composicao_cont = document.getElementById("divisao");

        //var size = palavras2[prop] * 80 + "%";
        var opacity = repe / max;

        //!*Criar tag p para inserir as palavras*!/
        var palavra_cont = document.createElement("div");
        palavra_cont.className = "palavra_cont_";

        composicao_cont.appendChild(palavra_cont);

        var palavra_el = document.createElement("p");

        palavra_cont.appendChild(palavra_el);

        //palavra_el.innerHTML = words;

        composicao_cont.style.display = "flex";
    }

        /*Estilizar as palavras*/
        //palavra.style.fontSize = size;
        palavra_el.style.fontSize = '50px';
        palavra_el.style.textTransform = "uppercase";
        palavra_el.style.opacity = opacity;


//-----------------------------------------------------------------------
//------------------------------- MAPA ----------------------------------
//-----------------------------------------------------------------------

    //definir visualização mapa
    var mymap = L.map('mapid').setView([38.548920, -9.077550], 13);

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
        iconUrl: 'img/arvores.png',
        iconSize: [50, 32]
    });
    var arvoreMarker = L.marker([40.2018, -8.4256], {icon: arvoreIcon}).addTo(mymap);




    //COORDENADAS MOUSEOVER
    //poe os markers nos sitios

    L.geoJson(palavras2).addTo(mymap);

    var layerGroup = L.geoJSON(palavras2, {
        onEachFeature: function (feature, layer) {

            layer.bindPopup('<h1>' + feature.properties.palavra + '</h1>');

            var palavra_cont = document.createElement("div");

            palavra_cont.className = "palavra_cont";
            composicao_cont.appendChild(palavra_cont);
            var palavra_el = document.createElement("p");
            palavra_cont.appendChild(palavra_el);



            palavra_el.innerHTML = feature.properties.palavra;



        }
    }).addTo(mymap);




}

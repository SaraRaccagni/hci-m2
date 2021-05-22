
function compPalavras(palavras2) {

//-----------------------------------------------------------------------
//----------------------- COMPOSIÇÃO TIPOGRÁFICA -------------------------
//------------------------------------------------------------------------

 for ($i=0; $i<5; $i++){
     var max=0;

     //aceder palavras
     var words = palavras2.features[$i].properties.palavra;
     //aceder nº de repetições
     var repe= palavras2.features[$i].properties.rep;
     //aceder coordenadas
     var coord = palavras2.features[$i].geometry.coordinates[$i];

     max = (max < parseFloat(repe)) ? parseFloat(repe) : max;

     var composicao_cont = document.getElementById("divisao");

     //var size = palavras2[prop] * 80 + "%";
     var opacity = repe / max;

     /*Criar tag p para inserir as palavras*/
     var palavra_cont = document.createElement("div");
     palavra_cont.className = "palavra_cont";

     composicao_cont.appendChild(palavra_cont);

     var palavra = document.createElement("p");

     palavra_cont.appendChild(palavra);

     //palavra.innerHTML = words;

     composicao_cont.style.display = "flex";

     /*Estilizar as palavras*/
     //palavra.style.fontSize = size;
     palavra.style.fontSize = '50px';
     palavra.style.textTransform = "uppercase";
     palavra.style.fontWeight = "bold";
     palavra.style.fontFamily = "Roboto Condensed, sans-serif";
     palavra.style.margin = 0;
     palavra.style.padding = 0;
     palavra.style.float = "left";
     palavra.style.opacity= opacity;

//-----------------------------------------------------------------------
//------------------------------- MAPA -----------------------------------
//------------------------------------------------------------------------
     //definir visualização mapa
     var mymap = L.map('mapid').setView([38.548920, -9.077550], 13);

    // deifnir tile do mapa
     L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=WdcTGuG5ljgDFUUE3uo3',{
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
     var arvoreMarker = L.marker([40.2018,-8.4256], {icon: arvoreIcon}).addTo(mymap);

     //COORDENADAS MOUSEOVER
     L.geoJson(palavras2).addTo(mymap);

     //mouseover
     var geojson;
// ... our listeners
     geojson = L.geoJson(palavras2);

     function highlightFeature(e) {
         var layer = e.target;

         info.update(layer.feature.properties);
     }

     function resetHighlight(e) {
         geojson.resetStyle(e.target);
         info.update();
     }

     function zoomToFeature(e) {
         map.fitBounds(e.target.getBounds());
     }

     function onEachFeature(feature, layer) {
         layer.on({
             mouseover: highlightFeature,
             mouseout: resetHighlight,
             click: zoomToFeature
         });
     }

     geojson = L.geoJson(palavras2, {
         onEachFeature: onEachFeature
     }).addTo(mymap);

     var info = L.control();

     info.onAdd = function (map) {


     };

// method that we will use to update the control based on feature properties passed
     info.update = function (props) {
         /*this._div.innerHTML = '<h4>US Population Density</h4>' +  (props ?
             '<b>' + props.palavra
             : 'Hover over a state');*/


         palavra.innerHTML = props.palavra;

     };
     info.addTo(mymap);
 }

   /* for (var prop in palavras2) {

        max = (max < parseFloat(palavras2[prop])) ? parseFloat(palavras2[prop]) : max;

        var word = prop;

        var composicao_cont = document.getElementById("divisao");

        //Aumentar palavra consoante as vezes que é inserida

        //var size = palavras2[prop] * 80 + "%";
        var opacity = palavras2[prop] / max;

        //Crear tag p para inserir as palavras
        var palavra_cont = document.createElement("div");
        palavra_cont.className = "palavra_cont";

        composicao_cont.appendChild(palavra_cont);

        var palavra = document.createElement("p");

        palavra_cont.appendChild(palavra);

        palavra.innerHTML = word;

        composicao_cont.style.display = "flex";

        //Estilizar as palavras
        //palavra.style.fontSize = size;
        palavra.style.fontSize = '50px';
        palavra.style.textTransform = "uppercase";
        palavra.style.fontWeight = "bold";
        palavra.style.fontFamily = "Roboto Condensed, sans-serif";
        palavra.style.margin = 0;
        palavra.style.padding = 0;
        palavra.style.float = "left";
        palavra.style.opacity=opacity;

    }*/
}
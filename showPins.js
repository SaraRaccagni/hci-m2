function compPalavras(palavras2) {


    var num_pal= palavras2.features.length;
    console.log ("num pal:"+ num_pal);
    var composicao_cont = document.getElementById("divisao");

//-----------------------------------------------------------------------
//------------------------------- MAPA ----------------------------------
//-----------------------------------------------------------------------

    //set map visualisation coordinates
    var mymap = L.map('mapid').setView([40.1932,-8.4051], 13);

    // set map tile
    L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=YXs4eleN4nyqgfQHZW1d', {
        attribution: '<a href="<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>" ' +
            'target="_blank">&copy; ' +
            'MapTiler</a> <a href="https://www.openstreetmap.org/copyright" ' +
            'target="_blank">&copy; ' +
            'OpenStreetMap contributors</a>',
    }).addTo(mymap);

    var max = 0;


    var palavras = L.geoJSON(palavras2, {

        style: function(feature) {
            return {color: feature.properties.color };
        },

        pointToLayer: function(feature, latlng) {
            return new L.CircleMarker(latlng, {radius: 3, fillOpacity: 0.85});

        },

        onEachFeature: function (feature, layer) {

        //PIN
            //OPACITY WORDS
            var repe = 1;
            max = (max < parseFloat(repe)) ? parseFloat(repe) : max;
            var opacity = repe / max;

            var pin_cord_lat= feature.geometry.coordinates[1];
            var pin_cord_lng= feature.geometry.coordinates[0];
            var pin_cord= L.latLng(pin_cord_lat, pin_cord_lng)


            //ADD PIN
            var h1_pin= document.createElement('h1');
            h1_pin.className='pal';//VEDERE IN CSS SE MODIFICA LO STILE
            h1_pin.id= feature.properties.name;
            composicao_cont.appendChild(h1_pin);
            // h1_pin.style.opacity = opacity;
            h1_pin.style.color = feature.properties.color;
            var pin= document.getElementById(feature.properties.name);
            h1_pin.innerHTML = feature.properties.name;


            mymap.on('move', function() {
                var bounds= mymap.getBounds();

                if (mymap.getBounds().contains(pin_cord)){
                    pin.style.display= "inline-block";
                }
                else {
                    pin.style.display= "none";
                }
            });

            //CLICK WORD -> SHOW MARKER
            h1_pin.addEventListener("click", function(){
                layer.bindPopup('<h2>' + feature.properties.name + '</h2><a href="pinDetails.php?id='+feature.id+'"><span class="glyphicon glyphicon-zoom-in">more details</span></a>').openPopup();
            });

            // ZOOM AND CENTER MARKER WHEN CLICKING
            var popup = L.popup().setContent('<h2>' + feature.properties.name + '</h2><a href="pinDetails.php?id='+feature.id+'"><span class="glyphicon glyphicon-zoom-in">more details</span></a>');
            layer.bindPopup(popup).openPopup();

            mymap.on('popupopen', function(centerMarker) {
                var cM = mymap.project(centerMarker.popup._latlng);
                cM.y -= centerMarker.popup._container.clientHeight/2
                mymap.setView(mymap.unproject(cM),16, {animate: true});
            });

            //WORD ANIMATIONS
            //setSaxxMouseEffect ( 'h1' , 'saxx swing') ;
            setSaxxMouseEffect ( 'h1' , 'saxx swing' , 'white' , '#28234E' ) ;

            mymap.on('zoomend', function() {
                setAnimationSaxx ( 'h1' , 'saxx swing' );
            });

        }
    });


    var coimbraLayer = new L.LayerGroup([palavras]).addTo(mymap);





}

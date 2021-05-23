document.getElementsByTagName("body")[0].addEventListener("click", function(){
    window.open(url);
});


var mymap = L.map('mapid').setView([40.1932,-8.4051], 10);

// deifnir tile do mapa
L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=WdcTGuG5ljgDFUUE3uo3', {
    attribution: '<a href="https://www.maptiler.com/copyright/" ' +
        'target="_blank">&copy; ' +
        'MapTiler</a> <a href="https://www.openstreetmap.org/copyright" ' +
        'target="_blank">&copy; ' +
        'OpenStreetMap contributors</a>',
}).addTo(mymap);
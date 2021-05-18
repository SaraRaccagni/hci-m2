var mymap = L.map('mapid').setView([40.2056400, -8.4195500], 13);

L.tileLayer('https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=WdcTGuG5ljgDFUUE3uo3',{
    attribution: '<a href="https://www.maptiler.com/copyright/" ' +
        'target="_blank">&copy; ' +
        'MapTiler</a> <a href="https://www.openstreetmap.org/copyright" ' +
        'target="_blank">&copy; ' +
        'OpenStreetMap contributors</a>',
}).addTo(mymap);

var arvoreIcon = L.icon({
    iconUrl: 'img/arvores.png',
    iconSize: [50, 32]
});

var arvoreMarker = L.marker([40.2018,-8.4256], {icon: arvoreIcon}).addTo(mymap);

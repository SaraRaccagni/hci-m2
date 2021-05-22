var mymap = L.map('mapid').setView([38.548920, -9.077550], 13);

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

/////////////////////////////////////////
/*var data= JSON.parse(test);

L.geoJson("test.json").addTo(mymap);

//mouseover
var geojson;
// ... our listeners
geojson = L.geoJson(statesData);

function highlightFeature(e) {
    var layer = e.target;

    info.update(layer.feature.properties);
}

function resetHighlight(e) {
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

geojson = L.geoJson(data, {
    onEachFeature: onEachFeature
}).addTo(mymap);

var info = L.control();


info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    this.update();
    return this._div;
};

// method that we will use to update the control based on feature properties passed
info.update = function (props) {
    this._div.innerHTML = '<h4>US Population Density</h4>' +  (props ?
        '<b>' + props.palavra + '</b><br />' + props.rep
        : 'Hover over a state');
};

info.addTo(mymap);*/



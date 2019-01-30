

document.getElementById("begin").onclick = function () {
	document.getElementById('exampleModal').style.display = 'block';
	setTimeout(function() {
		mapa.invalidateSize();
	}, 100);
}

var yes=document.getElementById("yespapa").checked;
if (yes==true) {
    document.getElementById("mapid").removeAttribute("hidden");
}


$(document).ready(function(){
    $("#yespapa").click(function(){
      $("#mapid").toggle();
    });

  });


var marcador;
var mapa = L.map('mapid').setView([43.3073225, -1.9914354], 13);
mapa.on('click',function(e){

	if(typeof(marcador)=="undefined"){
		marcador= new L.marker(e.latlng,{icon:lockIcon});
        marcador.addTo(mapa);
        document.getElementById("latitude").value=e.latlng.lat;
        document.getElementById("longitude").value=e.latlng.lng;
	}else{
		marcador.setLatLng(e.latlng);
        document.getElementById("latitude").value=e.latlng.lat;
        document.getElementById("longitude").value=e.latlng.lng;
	}
});


var baselayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYW5kZXJsYWIiLCJhIjoiY2pyOTBmc3R6MGJmaTQzbWx6YzBpN25lbSJ9.hkFzj6uoWVw8Yx5IsTYQLw', {
attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
id: 'mapbox.streets',
}).addTo(mapa);

var toplayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYW5kZXJsYWIiLCJhIjoiY2pyOTBmc3R6MGJmaTQzbWx6YzBpN25lbSJ9.hkFzj6uoWVw8Yx5IsTYQLw', {
attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
id: 'mapbox.streets-satellite',
});

var layers = {
	'Basico': baselayer,
	'Satelite': toplayer
};

L.control.layers(layers).addTo(mapa);


// 	$('#geolocate').on('click', function(){
//   mapa.locate({setView: true, maxZoom: 15});
// });

// create the geocoding control and add it to the map
var searchControl = L.esri.Geocoding.geosearch({
	useMapBounds:false,																			//quitar filtración de mapa
	providers: [ L.esri.Geocoding.arcgisOnlineProvider() ] //de donde pilla la data
}).addTo(mapa);

// create an empty layer group to store the results and add it to the map
var results = L.layerGroup().addTo(mapa);

// listen for the results event and add every result to the map
searchControl.on("results", function(data) {
	results.clearLayers();
	for (var i = data.results.length - 1; i >= 0; i--) {
		results.addLayer(L.marker(data.results[i].latlng));
		//getAseos(data.results[i].latlng.lat,data.results[i].latlng.lng);
	}
});

var lockIcon = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDQ4IDQ4IiB3aWR0aD0iNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTAgMGg0OHY0OGgtNDh6IiBmaWxsPSJub25lIi8+PHBhdGggZD0iTTM2IDE2aC0ydi00YzAtNS41Mi00LjQ4LTEwLTEwLTEwcy0xMCA0LjQ4LTEwIDEwdjRoLTJjLTIuMjEgMC00IDEuNzktNCA0djIwYzAgMi4yMSAxLjc5IDQgNCA0aDI0YzIuMjEgMCA0LTEuNzkgNC00di0yMGMwLTIuMjEtMS43OS00LTQtNHptLTEyIDE4Yy0yLjIxIDAtNC0xLjc5LTQtNHMxLjc5LTQgNC00IDQgMS43OSA0IDQtMS43OSA0LTQgNHptNi4yLTE4aC0xMi40di00YzAtMy40MiAyLjc4LTYuMiA2LjItNi4yIDMuNDIgMCA2LjIgMi43OCA2LjIgNi4ydjR6Ii8+PC9zdmc+',

	iconSize:     [25, 35], // size of the icon
	shadowSize:   [50, 64], // size of the shadow
	iconAnchor:   [13, 25], // point of the icon which will correspond to marker's location
	shadowAnchor: [4, 62],  // the same for the shadow
	popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});




// function onLocationFound(e) {
//     var radius = e.accuracy / 5;
//     L.marker(e.latlng).addTo(mapa)
//         .on('click', function(){
//           confirm("are you sure?");
//         });
//     L.circle(e.latlng, radius).addTo(mapa);
// }
//
// mapa.on('locationfound', onLocationFound);
//
// function onLocationError(e) {
//     alert(e.message);
// }
// mapa.on('locationerror', onLocationError);
/*var aseos=[];

var aseoIcon = L.icon({
	iconUrl: '/img/marker.png',

	iconSize:     [25, 35], // size of the icon
	shadowSize:   [50, 64], // size of the shadow
	iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
	shadowAnchor: [4, 62],  // the same for the shadow
	popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

function getAseos(x,y){
	limpiarMapaAseos();
	var loc={latitud: x, longitud: y}
	$.get( "/api/mapa/getAseos/", loc, function( data ) {
		for (var i=0;i<data.length;i++){
			var marker=L.marker([data[i].latitud, data[i].longitud],{icon:aseoIcon}).on('click',markerOnClick).addTo(mapa);
			marker.aseo=data[i].id;
			aseos.push(marker);
		}
	});
}

function getAseos2(x,y){
	limpiarMapaAseos();
	setVista(x,y);
	var loc={latitud: x, longitud: y}
	$.get( "/api/mapa/getAseos/", loc, function( data ) {
		for (var i=0;i<data.length;i++){
			var marker=L.marker([data[i].latitud, data[i].longitud],{icon:aseoIcon}).on('click',markerOnClick).addTo(mapa);
			marker.aseo=data[i].id;
			aseos.push(marker);
		}
	});
}

function limpiarMapaAseos(){
	for (var i=0;i<aseos.length;i++){
		mapa.removeLayer(aseos[i]);
	}
}

function limpiarMapa(){
	for (var i=0;i<aseos.length;i++){
		mapa.removeLayer(aseos[i]);
	}
	results.clearLayers();
}

function markerOnClick(e){
	var mapaSection = document.getElementById('section');
	var aside = document.getElementById('aside');
	mapaSection.classList.remove('col-md-12');
	mapaSection.classList.add('col-md-9');
	aside.hidden = false;
	setVista(e.latlng.lat,e.latlng.lng);
	var aseo={id: e.target.aseo};


	$.get( "/api/mapa/getAseo/"+ e.target.aseo, function( data ) {
		cambiarInfoFicha(data);
	});


}
function setVista(x,y){
	mapa.setView([x, y],16);
}

function cambiarInfoFicha(data){
	console.log(data.foto);
	if(data.foto == 'wc.jpg'){
		document.getElementById("imgWC").src = "/img/"+data.foto;
	}else{
		document.getElementById("imgWC").src="/uploads/"+data.foto;
	}
	document.getElementById("nombre").innerHTML=data.nombre;
	document.getElementById("dir").innerHTML=data.dir;
	document.getElementById("horario").innerHTML=data.horas24 == 1?"24 horas":data.horarioApertura+"-"+data.horarioCierre;
	document.getElementById("precio").innerHTML=data.precio==null?"GRATIS": data.precio+" €";
	document.getElementById("accesible").innerHTML=data.accesibilidad==1?"Accesible":"No accesible";
}
*/



document.getElementById("begin").onclick = function () {
	document.getElementById('exampleModal').style.display = 'block';
	setTimeout(function() {
		mapa.invalidateSize();
	}, 100);
}

var yes=document.getElementById("addressYes").checked;
if (yes==true) {
    document.getElementById("mapid").removeAttribute("hidden");
}


$(document).ready(function(){
    $("#addressNo").click(function(){
      $("#mapid").hide();
    });
    $("#addressYes").click(function(){
      $("#mapid").show();
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
	iconUrl: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAflBMVEX///8AAACDg4N+fn6Pj49tbW3Pz8+qqqr29vbo6Ojt7e3y8vL8/PwqKire3t75+flVVVW0tLS7u7tMTEx3d3c4ODgXFxeSkpLFxcVFRUXKysqdnZ3i4uIMDAwiIiIcHBxnZ2ddXV0xMTGampqIiIg6OjpDQ0OkpKTW1tYhISFLDDVnAAAJTElEQVR4nO2diZqiOhCFx41FUARp9w2lW+b9X/C24/QyaoVAnUrS3/V/AJIDoVKppCq/fhkgTpIgqrLzvHdlfs6qKEiS2ETj4gThZrU+jDr3jA7r1SYMbHeQR+hl5fSBuC+mZeaFtrvZlmjhDx59u7tvOfAXke3OtmC8Hhw15F05DtZj2x1uiJcvt9r6LmyXuWe70w1YFbtG8q7sipXtjusRe2rbomLquT+BxONBa30XBmPHNW7OLH0XzhvbIhQE2YQtsNOZZM56AZuyjYG5Z1c6+hlXiA94ZeKkVT1hPuCV3cm2nHsOQH0XDrYF3RAuwQI7naVTDrmHF/gu0aHpfyEh8F3iwrawDzIZge8SM9vSriz0V0lNOTrxFSvkLHHLrrIt792KNlsHNmVr3aKGOnEKDiPLEoc4T42iGNoUGPX0ezqaHvKy7Pf7ZZkfpg0+fddimCo57zXVDU7povqMjQZhtUhPWoG4d/bnxJpCT2ue2OePQ6Khl+Vab+hoLUal9RMez2N6lEXjs85Lmtj6FecanUtrNifiJNV4ytyQohu82o6NfK0H+fU/pJVxGtf9Q6NS1whGZZ3GvY1lxqmmU0UTn3JR1DzNwpp/XOOOzpv5ImHNT70zv6+Rq3uUNp3D6ixOLqJCgXrJNGuz6lnMVI80vpBSumujdqbPU9qbHlhBDZmqM29t/5nqTfXajC74g66iK6/tw7mrF8VzuyaD/arxxHrXqrHRcuy3IlnT/djq+TEUviJksDa3xggV/0uX533EivH/Zm65v1AMJe7PEijGqbEJI1Bs8/JjYxX98IEpWxPRfegDHt+nH28qnuGTPXhFLFWHr+TzeVZMHzqIn0KeT3uoS8jza4nJDhQYYxcWZAtmlom0JUUNIvo3MGNNyXXTBLWGG5MhLjNrKHLdhIsXkcvhI6wJBUMqPvOCG0ILygPfm4grppTnOAA2QvkUW4y1VlNSjSODmnPqNZbARiioYyXQxQ25PEMOFArKzmFnY8qrmEBbeciQahv7dqmRspQ3NR5l5tbQZqh484v8Qp+MM2AP262IVgzEo3xqOsS6jJTzu5dfXqwJO74Ft0M1g/0ZHkE5VCNwO9TPIL+VSK3Ap+B2qAP/iCiCGioWVoDbKYh2uuB27vn/KkS7U5TvbU8hemuI2tx6KuTzVIjiqVCOp0IUT4VyPBWieCqU46kQxVOhHE+F9yRBFFXpuswHX+T9dVpFUUCfAfopCqNNleb0vv8yT6vN4wMWP0Lh0Mvy+mSDY555D0L1P0Ch52vI+xDp3500cl5h1muWWDrt3oTrHVeYPSwMpWZ0+Eej0wqrQnlim2RWfBurDisMOeVbBp9njpxVGNGnffTwI7cVVrz6OxcGlcMKg1R1El2XlzRwVWFY/gYI7HR+94duKtwcUInr20PooMKu4uBrc16HZDvWFLacAylmhXMKTSGuMK7JyhMnlz4mnMkVMtHjKHygZty+YiCKqWg2aWT7L7wgWkVCkQ5kEMHj7EOMz8Llt9z5RNt29AOxhFlFzpVhpGorSZX0ao5QdhB3bYtE5Mg+efzZBiKHoU+yRb2asRWok+GAN/MdAc+mrpSJaeAfcVzYlnRDgf6ILhnSK+Aj7SG6xCyfAzY7n0p/sAk0wSNoUFvPGD1kdn5oW81DkMPUPTtzAWhrYkSwHs8LLig1tq2FADcluhCdeQQudooKXmwnvf6635ugfPgdSuAG059JVoXDIAmGYQW5JeId1B0KEKd76n2fvgLGVS3fQLnfgBc+O9899QzYygHlPUf8QP7D7F0yo1ifIyY4nGkWC6Z5fWzWx+wdxz1mE4MqoqDNiPKRV+xi4JgSC+zjFWfK94jZNwtBcgLZRckHdFxsyH17kBrKK+bfMlP9KxnToDJqNH5BJuBrkqte85C5FQJJz9epaa3ifib8DvdPRMz5TFP6qt7tI6sJaQIwpgFzHNVcbaCoXKZFzg9lbLhdqHk+8wUe+M53xXSR63YzmTGuKX8rkXtPjrBCQIlo7owlrBDgmZLFyzQR/g8B5c24gcSaapFcWwoIKXIV1lTi486HDigU9mlcUKhYWgAWFy4oVN4ioL4twIxC/vW3kutDJ76hqhOiDzeokDxMiDjq6IbC2eNSgB7i8LsbCju7R19xAbk40RGFnd361rUJ15ibIfkKda7U0uF24ufb6Ct8v5TreX9wWytPUT2/CQDPewG6pFJI4Yi/PuSGSz8QUggImNL10ZshpBBQBx7gWP1BSKHSr9cEdExBSCHisAI35v0XIYWIgq1nzHQho3CrXl/rAcpWk1EIyWQDHfCWUYg57o05PCuj8IAQyI3Z/kVGISYDyofkMIsonGEOYG4gpkZE4RF07Et176I2IgrfMAIxaYciClFXB9Vf3qyBiELYVRCIzogoRAmEzIgSCg8whYh8EgmFuJyShH06UUThHngvKft4oohC5N1PgHQEAYXI/LyIb2vwCg/Q6hGZgwqxRU427EUiXOEUlYpwJVbc4qzHrVlgG681uBSPx3W/b1I+2Umpb+jLu2LuqLrZYGNvrfXh1ZTYH7H8J2eGO0jhn/AXIDL8fZeIvWcnUfKLn/+RfnzFgC2QyFFhwg9+96owiIOw4se2ZO4mCwDxmsN8PQesxY5Cl6zzHRsUYjXbCtvK/oK+Ae0LVzKeBWvSuZGXL3mNJWpDmAVi25cGkPfJRfo2WW6eFxvxq1Yj21VOepJ1If8Q2i1qtsTW3XmI3dqCUvUE/8FmiU/Bwp7fYUc0WiN/3fGV2Fatk650leRPIjuFTHNxM/oF6w6LtgwMmNEvNubrtwGyRRsRgg5lajMx+gUvRGZn/qXBf/ATk+U+0Te3a5Kbqtm6RZ25aEpyAp1yr2F0Am72NpSYIm/toHhNrQl8B1PQSslUeMVbRyjt3uTGZ4lbEtnolG9zhH4whpzse8ibYT+GQsqmWrShd6wG+KlxO4CW0eUS+Wg/deLb8NNUjE/IO3aOJ9HbZNoRV33YrWT9ythqvhEJYOvzQq9yx8LcMeRr7IluSwCI52/tA//7t7mbw/Nf4iyftknRmE3z7Cfo+8PY702bmZ3ttOc7aD5VVOm80K2wvC/mqZFwPZhk42X9Sd14nU36mbf5MaPzjiDcVGk5eey3jiZlWm1CoZMjJomTJIjGC3/d7V3prv3FOAqSxMSn+w8o6bA3SQy2rQAAAABJRU5ErkJggg==',

	iconSize:     [25, 35], // size of the icon
	shadowSize:   [50, 64], // size of the shadow
	iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
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

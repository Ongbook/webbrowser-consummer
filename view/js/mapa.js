var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);

	var options = {
		zoom: 3,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("mapa"), options);
}

$('.btn-filtros').click(function(event){
	if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){ // callback de sucesso
        // ajusta a posição do marker para a localização do usuário
        marker.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
    },
    function(error){ // callback de erro
    	alert('Erro ao obter localização!');
    	console.log('Erro ao obter localização.', error);
    });
} else {
	alert('Navegador não suporta Geolocalização!');
}
});


$(document).ready(function(){
	initialize();

	/*
	Esconder a div ".apresenta" após clicar em "Conheça agora" e chama a div filtrosMapa
	*/
	$('#conhecaAgora').click(function(event){
		event.preventDefault();
		$(".apresenta").hide(1200);
		$("#mapa").css("height","523px");
		$(".filtrosMapa").show(1200);
		carregarPontos();
	});
});

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}

	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

function carregarPontos() {

	$.getJSON('http://localhost/slimtest/end', function(pontos) {

		var latlngbounds = new google.maps.LatLngBounds();

		$.each(pontos, function(index, ponto) {

			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.lat, ponto.lng),
				title: "Meu ponto personalizado! :-D",
				icon: 'view/img/marcador.png'
			});

			var myOptions = {
				content: "<h4><strong><a href='http://facebook.com/edoura' target='_blank'>" + ponto.lat + "</a></strong></h4>" + "<p>" + ponto.descEnd + "</p>" + "<p>" + ponto.lng + "</p>",
				pixelOffset: new google.maps.Size(-150, 0)
			};

			infoBox[ponto.Id] = new InfoBox(myOptions);
			infoBox[ponto.Id].marker = marker;

			infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
				abrirInfoBox(ponto.Id, marker);
			});


			/* Ao clicar no mapa fecha as infoBox
			Gambiarra até entender e acertar a lógica do método abrirInfoBox(id, marker)
			*/
			google.maps.event.addListener(map, 'click', function() {
				infoBox[ponto.Id].close();
			});


			markers.push(marker);

			latlngbounds.extend(marker.position);

		});

		var markerCluster = new MarkerClusterer(map, markers);

		map.fitBounds(latlngbounds);

	});

}
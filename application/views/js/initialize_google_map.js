function initMap() {
		  var myLatLng = {lat: 6.9144, lng: 79.9722};

		  var map = new google.maps.Map(document.getElementById('googleMap'), {
		    zoom: 18,
		    center: myLatLng
		  });

		  var marker = new google.maps.Marker({
		    position: myLatLng,
		    map: map,
		    title: 'Hello World!'
		  });
		}
		google.maps.event.addDomListener(window, 'load', initMap);
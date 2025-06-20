<script type="text/javascript">
	//new google.maps.event.addDomListener(window, 'load', initMap);
	//var map;

	var marker;
	var place;
	// var myLatlng = new google.maps.LatLng(0,0);
	// var geocoder = new google.maps.Geocoder();
	// var infowindow = new google.maps.InfoWindow();

	var autocomplete;

	function initMap()
	{
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: <?php echo $model->lat; ?>, lng: <?php echo $model->lng ?>},
			zoom: 13
		});

		var input =document.getElementById('Properties_map_marker');
		var options = { types: ['geocode'] };
		autocomplete = new google.maps.places.Autocomplete(input, options);
		autocomplete.addListener('place_changed', autoAddress);
	}

	function autoAddress()
	{
		// Get the place details from the autocomplete object.
		var place = autocomplete.getPlace();
		var item_Lat =place.geometry.location.lat();
		var item_Lng= place.geometry.location.lng();
		var item_Location = place.formatted_address;
		//console.log(place);
		$("#Properties[lat]").val(item_Lat);
		$("#Properties[lng]").val(item_Lng);

		var myLatlng = new google.maps.LatLng(item_Lat, item_Lng);
		var map      = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: item_Lat, lng: item_Lng},
		  zoom: 13
		});
		var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  draggable: true
		});

		var infowindow = new google.maps.InfoWindow({
		content: place.formatted_address,
		maxWidth: 200
		});
		infowindow.open(map, marker);
	}


	/*
		autocomplete.addListener('place_changed', function()
		{


		for (var component in componentForm) {
		  document.getElementById(component).value = '';
		  document.getElementById(component).disabled = false;
		}
		for (var i = 0; i < place.address_components.length; i++)
		{
		  var addressType = place.address_components[i].types[0];

		  if (componentForm[addressType] && !!document.getElementById(addressType))
		  {
			var val = place.address_components[i][componentForm[addressType]];
			document.getElementById(addressType).value = val;
		  }
		}

			// var address = '';
			// if (place.address_components) {
			//   address = [
			// 	(place.address_components[0] && place.address_components[0].short_name || ''),
			// 	(place.address_components[1] && place.address_components[1].short_name || ''),
			// 	(place.address_components[2] && place.address_components[2].short_name || '')
			//   ].join(' ');
			// }
		//
			// infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			// infowindow.open(map, marker);

			var item_Lat =place.geometry.location.lat();
			var item_Lng= place.geometry.location.lng();
			var item_Location = place.formatted_address;


			//alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);

			$("#Events_latitude").val(item_Lat);
			$("#Events_longitude").val(item_Lng);
			$("#Events_location").val(item_Location);

	  }); */
	//}
</script>

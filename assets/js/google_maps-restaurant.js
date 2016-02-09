var service;

var map;

var infowindow;

var image;


function initMap() {

  var pyrmont = {

    lat: 50.788733, lng: -1.845967
  };

  map = new google.maps.Map(document.getElementById('map-canvas-rest'), {
      center: pyrmont,
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP, // Set the type of Map
      scrollwheel: false, // Disable Mouse Scroll zooming (Essential for responsive sites!)
      // All of the below are set to true by default, so simply remove if set to true:
      panControl:false, // Set to false to disable
      mapTypeControl:false, // Disable Map/Satellite switch
      scaleControl:false, // Set to false to hide scale
      streetViewControl:false, // Set to disable to hide street view
      overviewMapControl:false, // Set to false to remove overview control
      rotateControl:false // Set to false to disable rotate control
  });

  infowindow = new google.maps.InfoWindow();

  service = new google.maps.places.PlacesService(map);
                          
  service.nearbySearch({
    
    location: pyrmont,
    radius: 5000,
    types: ['art_gallery','amusement_park','aquarium','bowling_alley','casino','night_club','museum']
  }, callback);

  image = new google.maps.MarkerImage("https://www.creare.co.uk/wp-content/uploads/2013/08/marker.png", null, null, null, new google.maps.Size(40,52)); // Create a variable for our marker image.
            
  var marker = new google.maps.Marker({ // Set the marker
                                
      position: pyrmont, // Position marker to coordinates
      icon:image, //use our image as the marker
      map: map, // assign the marker to our map variable
      title: 'Click to visit our company on Google Places' // Marker ALT Text
    });
  
  }


  function callback(results, status) {

    if (status === google.maps.places.PlacesServiceStatus.OK) {

      for (var i = 0; i < results.length; i++) {

        createMarker(results[i]);
        }
    }
  }

  function createMarker(place) {
          
      var placeLoc = place.geometry.location;
      var marker = new google.maps.Marker({
      map: map,
      position: place.geometry.location
      });

    var request = { reference: place.reference };

    service.getDetails(request, function(details, status) {

      google.maps.event.addListener(marker, 'click', function() {
        
        infowindow.setContent(details.name + "<br />" + details.formatted_address +"<br />" + details.website + "<br />" + details.rating + "<br />" + details.formatted_phone_number);
        infowindow.open(map, this);
      
      });
    });
  }
var map;
function initMap() {
    // Simple map
    map = new google.maps.Map(document.getElementById("map"), {
        center: {lat: 29.595670, lng: 52.576216}, // Coordinates for the center of the map
        zoom: 6 // Initial zoom level
    });


    // Map with marker
    var center = {lat: 35.698963, lng: 51.349121}; // Coordinates for the marker (Tehran)

    var mapWithMarker = new google.maps.Map(document.getElementById("map-marker"), {
        scaleControl: true, // Enables the scale control
        center: center, // Setting the center of the map
        zoom: 8 // Zoom level for the map
    });

    var infowindow = new google.maps.InfoWindow;
    infowindow.setContent("<p>&nbsp; &nbsp; Iran, Tehran...</p>"); // InfoWindow content

    var marker = new google.maps.Marker({map: mapWithMarker, position: center}); // Create a marker at Tehran coordinates
    marker.addListener("click", function() {
        infowindow.open(mapWithMarker, marker); // Open the InfoWindow when the marker is clicked
    });
}

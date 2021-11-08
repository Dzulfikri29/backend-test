let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -7.5361, lng: 112.2384 },
    zoom: 8,
  });

}
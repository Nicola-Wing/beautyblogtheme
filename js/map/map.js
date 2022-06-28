let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(50.038943, 36.2200589,),
    zoom: 17,
  });
const marker = new  google.maps.Marker({
    position: new google.maps.LatLng(50.0392998, 36.2191553),
    title:"we are here",
    animation: google.maps.Animation.BOUNCE,
});
const markerInfo = new google.maps.Marker({
    position: new google.maps.LatLng(50.0390005, 36.2203324),
    title:"entrance",
    icon:"https://developers.google.com/maps/documentation/javascript/examples/full/images/info-i_maps.png",
    animation: google.maps.Animation.DROP,
});

marker.setMap(map);

markerInfo.setMap(map);

}

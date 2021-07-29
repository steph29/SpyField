var mymap = L.map("mapid").setView([51.505, -0.09], 13);
L.tileLayer(
  "https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=3e3ba58c8f764deda2f5b9bc0f25999b",
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 8,
    id: "mapbox/streets-v11",
    tileSize: 512,
    zoomOffset: -1,
    accessToken: "your.mapbox.access.token",
  }
).addTo(mymap);
var marker = L.marker([51.5, -0.09]).addTo(mymap);
marker
  .bindPopup("<b>Your mission takes place here</b><br>Please, keep it secret !")
  .openPopup();

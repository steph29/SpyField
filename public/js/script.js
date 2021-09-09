// Script pour l'affichage de la mission sélectionnée dans la section de droite de la page Mission
var mission = document.getElementById("missionType");
var lat = 0;
var lon = 0;
var name = "";

function readMission(variable) {
  $.post(
    "selectMission",
    { mission: variable },
    function (data) {
      $(".res").html(data);
    },
    "text"
  );
}

function mapCoord(variable) {
  $.post(
    "mapCoord",
    { mission: variable },
    function (data) {
      lat = data["lat"];
      lon = data["lon"];
      name = data["name"];
      map(lat, lon, name);
    },
    "json"
  );
}

mission.addEventListener("click", function () {
  var missionValue = $(this).val();
  readMission(missionValue);
  mapCoord(missionValue);
});

// Script pour la carte dans la page mission
var mymap = L.map("mapid");

function map(lat, lon, name) {
  mymap.setView([lat, lon], 10);

  L.tileLayer(
    "https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=3e3ba58c8f764deda2f5b9bc0f25999b",
    {
      attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.thunderforest.com/">thunderforest</a>',
      maxZoom: 5,
      tileSize: 512,
      zoomOffset: -1,
    }
  ).addTo(mymap);
  var marker = L.marker([lat, lon]).addTo(mymap);
  marker
    .bindPopup(
      `<b>Your mission takes place in ${name}</b><br>Please, keep it secret !`
    )
    .openPopup();
}

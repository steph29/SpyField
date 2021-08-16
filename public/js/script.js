// Script pour l'affichage de la mission sélectionnée dans la section de droite de la page Mission
var mission = document.getElementById("missionType");

function readMission(variable) {
  $.post(
    "selectMission",
    { mission: variable },
    function (data) {
      // $(".res").html(data);
      const resData = data.json();
      console.log(resData);
      resData
        .then((dataJson) => {
          console.log(dataJson);
        })
        .html(data);
    },
    "json"
  );
}
// l'idée est d'utiliser une api json pour acceder aux données de la base et l'exploiter sur le site

function testData() {
  // faire une methode post avec fetch
  fetch(
    "https://spyfield-b2064-default-rtdb.europe-west1.firebasedatabase.app.json"
  )
    .then((res) => {
      const resData = res.json();
      resData.then((dataJson) => {
        console.log(dataJson);
      });
    })
    .catch((error) => console.log("Error : " + error));
}

mission.addEventListener("click", function () {
  var missionValue = $(this).val();
  testData();
});

// Script pour la carte dans la page mission

var mymap = L.map("mapid").setView([51.505, -0.09], 13);
L.tileLayer(
  "https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=3e3ba58c8f764deda2f5b9bc0f25999b",
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.thunderforest.com/">thunderforest</a>',
    maxZoom: 8,
    tileSize: 512,
    zoomOffset: -1,
  }
).addTo(mymap);
var marker = L.marker([51.5, -0.09]).addTo(mymap);
marker
  .bindPopup("<b>Your mission takes place here</b><br>Please, keep it secret !")
  .openPopup();

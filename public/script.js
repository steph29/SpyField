require(["esri/config", "esri/Map", "esri/views/MapView"], function (
  esriConfig,
  Map,
  MapView
) {
  esriConfig.apiKey =
    "AAPK883c2b90dde144f58d2ef5084ad2a1d4vKL5-i6VHBhmWOXTIwC8vmPIbW2pBq49FTgwbg_0ASzXB0oZ9izolciPZM_C7CtB";

  const map = new Map({
    basemap: "arcgis-topographic", // Basemap layer service
  });

  const view = new MapView({
    map: map,
    center: [-3.505, 47.927], // Longitude, latitude
    zoom: 5, // Zoom level
    container: "viewDiv", // Div element
  });
});

$(document).ready(function (e) {
  var mission = $("#missionType").change(function () {
    mission = $(this).val();
    console.log(mission);
    readMission();
  });

  function readMission() {
    $.post("selectMission", { mission: mission }, function (data) {
      $(".res").html(data);
    });
  }
});

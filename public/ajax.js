$(document).ready(function (e) {
  var mission = document.getElementById("missionType");

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
  mission.addEventListener("click", function () {
    var missionValue = $(this).val();
    console.log(missionValue);
    readMission(missionValue);
  });
});

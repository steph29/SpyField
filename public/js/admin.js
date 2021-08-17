// Script pour l'affichage d'un select supplémentaire dans le formulaire admin
var selectContact = document.getElementById("contact");

function addSelect(variable) {
  var mySelect = document.getElementById("newSelect");
  if (variable != "Select your contact") {
    mySelect.setAttribute("class", "my-3");
    mySelect.style.display = "block";
  }
}

selectContact.addEventListener("click", function () {
  var missionValue = $(this).val();
  addSelect(missionValue);
});

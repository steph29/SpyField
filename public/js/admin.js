// Script pour l'affichage d'un select supplémentaire dans le formulaire admin
var addContact = document.getElementById("addSelect");

function data(variable) {
  $.post(
    "selectContact",
    {
      contact: variable,
    },
    function (data) {
      console.log(data.JSON());
    },
    "json"
  );
}

addContact.addEventListener("click", function () {
  var select = document.createElement("select");
  var contact = document.getElementById("contact");
  contact = $(this).val();
  (contact) => {
    data(contact);
  };
  console.log(contact);
  // il faut recuperer les données dans la base, determiner le longueur du tableau puis afficher le resultat dans option

  select.options[select.options.length] = contact.length;
  select.setAttribute("class", "my-3");
  select.style.display = "block";
});

var country = document.getElementById("country");
var hideouts = document.getElementById("hideouts");

function checkRules(country) {
  $.post(
    "rules",
    { country: country },
    function (data) {
      console.log(data);
      $("#hideouts").empty();
      var opt = document.createElement("option");
      opt.value = data["capital"];
      opt.innerHTML = data["capital"];
      hideouts.appendChild(opt);
    },
    "json"
  );
}

country.addEventListener("click", function () {
  var countryValue = $(this).val();
  checkRules(countryValue);
});

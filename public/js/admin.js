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

// ---------------------------------------------------------- //

// Règles métier

// compatibilté de planques avec le pays de la mission
const country = document.getElementById("country");
const hideouts = document.getElementById("hideouts");

function checkRulesCountry(country) {
  $.post(
    "rules",
    { country: country },
    function (data) {
      $(hideouts).empty();
      var opt = document.createElement("option");
      opt.value = data["capital"];
      opt.innerHTML = data["capital"];
      hideouts.appendChild(opt);
    },
    "json"
  );
}

country.addEventListener("change", function () {
  var countryValue = $(this).val();
  checkRulesCountry(countryValue);
});

// nationalité de la target != nationalité de l'agent
const agent = document.getElementById("agent");
const target = document.getElementById("target");

function checkRulesTarget(target) {
  $.post(
    "rules",
    {
      target: target,
    },
    function (data) {
      $(agent).empty();
      data.forEach((element) => {
        var opt = document.createElement("option");
        opt.value = element;
        opt.innerHTML = element;
        agent.appendChild(opt);
      });
    },
    "json"
  );
}

target.addEventListener("change", function () {
  var targetValue = $(this).val();
  checkRulesTarget(targetValue);
});

// Contact de la meme nationalité que le pays de la mission

// Spécialité requise de l'agent pour la mission

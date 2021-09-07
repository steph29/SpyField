// Script pour l'affichage d'un select supplémentaire dans le formulaire admin
// var addContact = document.getElementById("addSelect");

// function data(variable) {
//   $.post(
//     "selectContact",
//     {
//       contact: variable,
//     },
//     function (data) {
//       console.log(data.JSON());
//     },
//     "json"
//   );
// }

// addContact.addEventListener("click", function () {
//   var select = document.createElement("select");
//   contact = $(this).val();
//   (contact) => {
//     data(contact);
//   };
//   console.log(contact);
//   // il faut recuperer les données dans la base, determiner le longueur du tableau puis afficher le resultat dans option

//   select.options[select.options.length] = contact.length;
//   select.setAttribute("class", "my-3");
//   select.style.display = "block";
// });

// ---------------------------------------------------------- //

// Règles métier

// Contact de la meme nationalité que le pays de la mission
// compatibilté de planques avec le pays de la mission et
const country = document.getElementById("country");
const hideouts = document.getElementById("hideouts");
const agent = document.getElementById("agent");
const target = document.getElementById("target");
const contact = document.getElementById("contact");

function checkRulesCountry(country) {
  $.post(
    "rules",
    { country: country },
    function (data) {
      $(hideouts).empty();
      $(contact).empty();
      console.log(data);
      data.forEach((element) => {
        if (data.indexOf(element) != 0) {
          var opt = document.createElement("option");
          opt.value = element;
          opt.innerHTML = element;
          contact.appendChild(opt);
        } else {
          var opt = document.createElement("option");
          opt.value = element;
          opt.innerHTML = element;
          hideouts.appendChild(opt);
        }
      });
    },
    "json"
  );
}

country.addEventListener("change", function () {
  var countryValue = $(this).val();
  checkRulesCountry(countryValue);
});

// nationalité de la target != nationalité de l'agent

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

// Spécialité requise de l'agent pour la mission

// Script pour l'affichage d'un select supplémentaire dans le formulaire admin
var addContact = document.getElementById("addSelectContact");
var addAgent = document.getElementById("addSelectAgent");
var addTarget = document.getElementById("addSelectTarget");
var addHideouts = document.getElementById("addSelectHideouts");

function addButton(liste, divContent) {
  var select = document.createElement("select");
  console.log(liste);
  for (var i = 0; i < liste.length; i++) {
    var opt = new Option(liste[i]);
    select.options[select.options.length] = opt;
    select.setAttribute("class", "my-3 form-control text-center linked-select");
    select.style.display = "block";
    $(divContent).append(select);
  }
}

addContact.addEventListener("click", function () {
  addButton(contactList, ".newSelectContact");
});
addAgent.addEventListener("click", function () {
  addButton(agentArray, ".newSelectAgent");
});
addTarget.addEventListener("click", function () {
  addButton(targetList, ".newSelectTarget");
});
addHideouts.addEventListener("click", function () {
  addButton(hideoutsList, ".newSelectHideouts");
});

// ---------------------------------------------------------- //

// Règles métier

// constantes et variables
const country = document.getElementById("country");
const hideouts = document.getElementById("hideouts");
const agent = document.getElementById("agent");
const target = document.getElementById("target");
const contact = document.getElementById("contact");
const specialities = document.getElementById("specialities");
const alertContact = document.getElementById("alertContact");
const alertAgent = document.getElementById("alertAgent");
var al = document.createElement("h5");
var contactList = [];
var hideoutsList = [];
var targetList = [];
var array = [];
var agentArray = [];

// Functions for element displaying
function elementHTML(cell, element) {
  var opt = document.createElement("option");
  opt.value = element;
  opt.innerHTML = element;
  cell.appendChild(opt);
}

function alertContent(divContent, text) {
  al.setAttribute("class", "alert alert-danger");
  al.innerHTML = `Sorry, we haven't this man ${text}. If you know one, please add him. `;
  $(divContent).append(al);
}

// functions for checking rules
function checkRulesCountry(country) {
  $.post(
    "rules",
    { country: country },
    function (data) {
      $(hideouts).empty();
      $(contact).empty();
      $(alertContact).empty();
      data.forEach((element) => {
        if (data.length <= 1) {
          alertContent(alertContact, "for this country");
          elementHTML(hideouts, "");
          elementHTML(hideouts, element);
        } else {
          if (data.indexOf(element) != 0) {
            elementHTML(contact, element);
            contactList.push(element);
          } else {
            elementHTML(hideouts, "");
            elementHTML(hideouts, element);
            hideoutsList.push(element);
          }
        }
      });
    },
    "json"
  );
}
function targetListDisplay(target) {
  $.post(
    "targetList",
    { target: target },
    function (data) {
      data.forEach((element) => {
        targetList.push(element);
      });
    },
    "json"
  );
}

function checkRulesTarget(target) {
  $.post(
    "rules",
    {
      target: target,
    },
    function (data) {
      array = [];
      data.forEach((element) => {
        array.push(element);
      });
    },
    "json"
  );
}

function checkRulesSpecialities(specialities) {
  $.post(
    "rules",
    { specialities: specialities },
    function (data) {
      $(alertAgent).empty();
      $(agent).empty();
      for (var i = 0; i < array.length; i++) {
        if (data.includes(array[i])) {
          elementHTML(agent, array[i]);
          agentArray.push(array[i]);
        }
      }
      if (data.length <= 1) {
        alertContent(alertAgent, "with this speciality");
      }
    },
    "json"
  );
}

// Contact de la meme nationalité que le pays de la mission
// compatibilté de planques avec le pays de la mission et
country.addEventListener("change", function () {
  var countryValue = $(this).val();
  checkRulesCountry(countryValue);
});

// nationalité de la target != nationalité de l'agent
target.addEventListener("change", function () {
  var targetValue = $(this).val();
  targetListDisplay(targetValue);
  checkRulesTarget(targetValue);
});

// Spécialité requise de l'agent pour la mission
specialities.addEventListener("change", function () {
  var specialitiesValue = $(this).val();
  checkRulesSpecialities(specialitiesValue);
});

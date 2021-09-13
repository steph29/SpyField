// Script pour l'affichage d'un select supplémentaire dans le formulaire admin
var addContact = document.getElementById("addSelectContact");
var addAgent = document.getElementById("addSelectAgent");
var addTarget = document.getElementById("addSelectTarget");
var addHideouts = document.getElementById("addSelectHideouts");

// Functions for element displaying
function displayOptions(cell, element, index) {
  var opt = document.createElement("option");
  opt.setAttribute("value", index);
  console.log(index);
  opt.innerHTML = element;
  cell.appendChild(opt);
}

function alertContent(divContent, text) {
  al.setAttribute("class", "alert alert-danger");
  al.innerHTML = `Sorry, we haven't this man ${text}. If you know one, please add him. `;
  $(divContent).append(al);
}

function displayNewSelect(liste, divContent, keyList, selectName) {
  var select = document.createElement("select");
  for (var i = 0; i < liste.length; i++) {
    var opt = new Option(liste[i]);
    select.options[select.options.length] = opt;
    select.setAttribute("class", "my-3 form-control text-center linked-select");
    select.setAttribute("name", selectName);
    opt.setAttribute("value", keyList[i]);
    select.style.display = "block";
    $(divContent).append(select);
  }
}

// functions
addContact.addEventListener("click", function () {
  displayNewSelect(
    contactList,
    ".newSelectContact",
    keycontactList,
    "contact[]"
  );
});
addAgent.addEventListener("click", function () {
  displayNewSelect(agentArray, ".newSelectAgent", keyAgentList, "agent[]");
});
addTarget.addEventListener("click", function () {
  displayNewSelect(targetList, ".newSelectTarget", keyTargetList, "target[]");
});
addHideouts.addEventListener("click", function () {
  displayNewSelect(hideoutsList, ".newSelectHideouts", "", "hideouts[]");
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
var keyTargetList = [];
var keyAgentList = [];
var keycontactList = [];
var keyCountryList = [];
var array = [];
var agentArray = [];

// functions for checking rules
function checkRulesCountry(country) {
  $.post(
    "rules",
    { country: country },
    function (data) {
      console.log(data);
      $(hideouts).empty();
      $(contact).empty();
      $(alertContact).empty();
      for (var i = 0; i < data.length; i++) {
        if (i % 2 == 0 && i != 0) {
          keycontactList.push(data[i]);
        } else {
          if (data.length <= 1) {
            alertContent(alertContact, "for this country");
            displayOptions(hideouts, "");
            displayOptions(hideouts, data[i], data[i]);
          } else {
            if (i != 0) {
              displayOptions(contact, data[i], data[i + 1]);
              contactList.push(data[i]);
            } else {
              displayOptions(hideouts, "");
              displayOptions(hideouts, data[i], data[i]);
              hideoutsList.push(data[i]);
            }
          }
        }
      }
    },
    "json"
  );
}
function targetListDisplay(target) {
  $.post(
    "targetList",
    { target: target },
    function (data) {
      targetList = [];
      keyTargetList = [];
      for (var i = 0; i < data.length; i++) {
        if (i % 2 == 0) {
          targetList.push(data[i]);
        } else if (i % 2 == 1) {
          keyTargetList.push(data[i]);
        }
      }
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
      console.log(data);
      $(alertAgent).empty();
      $(agent).empty();
      for (var i = 0; i < data.length; i++) {
        if (i % 2 == 0 && i != 0) {
          keyAgentList.push(data[i]);
        }
        if (data.includes(array[i])) {
          if (i % 2 == 0) {
            displayOptions(agent, array[i], array[i + 1]);
            agentArray.push(array[i]);
          }
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

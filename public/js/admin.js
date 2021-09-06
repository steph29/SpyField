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
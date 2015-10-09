window.onload = function () {
  charger_comments();
};

function ajouter_comment(evt) {
  evt.preventDefault();
  var page = location.href.substring(location.href.lastIndexOf('/') + 1);
  var form = document.querySelector("form");
  var formData = new FormData(form);
  formData.append('page', page);
  var xhr = new XMLHttpRequest();
  xhr.addEventListener("load", function () {
    if (this.responseText == 'OK') {
      charger_comments();
    }    
    form.reset();
  });
  xhr.open("POST", form.action, true);
  xhr.send(formData);
  return false;
}

function charger_comments() {
  var page = location.href.substring(location.href.lastIndexOf('/') + 1);
  var xhr = new XMLHttpRequest();
  xhr.addEventListener("load", function () {
    document.querySelector("#list_comments").innerHTML = this.responseText;
  });
  xhr.open("GET", 'comments-ajx.php?req_action=GET_COMMENTS&page='+page, true);
  xhr.send();
}
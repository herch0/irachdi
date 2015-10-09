window.onload = function () {
  var page = location.href.substring(location.href.lastIndexOf('/') + 1);
  document.querySelector("#add_comment").addEventListener('click', function () {
    var name = document.querySelector("#name");
    var email = document.querySelector("#email");
    var comment = document.querySelector("#comment");

    var form = document.querySelector("form");
    var formData = new FormData(form);
    
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", function() {
      alert(this.responseText)
    });
    oReq.open("GET", "comments-ajx.php");
    console.log(formData.get('name'));
    oReq.send(new FormData(form));
  })
}
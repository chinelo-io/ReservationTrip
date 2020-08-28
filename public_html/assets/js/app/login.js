$(document).ready(function () {
  $("#btnLogin").on("click", function (e) {
    e.preventDefault();
    var data = $("#login_form :input").serialize();
    findUserByEmailAndPassword(data);
  });
});

function findUserByEmailAndPassword(data) {
  var promise = $.ajax({
    type: "POST",
    url: "../app/controller/LoginController.php",
    data: data,
    dataType: "json",
    success: function (obj) {
      //var json = jQuery.parseJSON(retorno);
      console.log(obj);
      if (obj == null) {
        $.notify.defaults({ arrowShow: false });
        $("#email").notify("El Email no coincide con ningun usuario.", {
          position: "bottom",
          className: "warn",
        });
      } else if (obj.length > 1) {
        window.localStorage.setItem("rolesUser", JSON.stringify(obj));
        window.location.href = "selectRole.php";
      } else {
      }
    },
    error: function (xhr, status) {
      console.log(xhr);
    },
  });
}

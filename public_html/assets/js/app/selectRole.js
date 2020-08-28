$(document).ready(function () {
  var rolesJson = window.localStorage.getItem("rolesUser");
  var roles = jQuery.parseJSON(rolesJson);
  var text = "";
  roles.forEach((element) => {
    console.log(element);
    text +=
      '<div style="margin-left: 15px;" class="col-4"> <div class="widget-title f-s-20"><button id="btnSelectSession"' +
      " value='" +
      element.id_role +
      "' idAux='" +
      element.value_role +
      '\'" type="button" class="btn btn-indigo m-b-5 m-r-3">' +
      element.name_role +
      " </button></div></div>";
  });
  $("#rowRoles").html(text);
  $("#nameUser").html(roles[0]["name_user"]);
  $("#nameUser").attr("idAux", roles[0]["id_user"]);

  $("#btnSelectSession").on("click", function (e) {
    e.preventDefault(); //prevent form from submitting
    var id_user = $("#nameUser").attr("idAux");
    var value_role = $(this).attr("idAux");

    var promise = $.ajax({
      type: "POST",
      url: "../app/controller/LoginController.php",
      data: (opt = 2 + "&id_user=" + id_user + "&value_role=" + value_role),
      dataType: "json",
      success: function (obj) {
        console.log(obj);
        if (obj == null) {
            $.notify("Ocurrió un error al Guardar la Sesión,", "error");
        } else {
          window.location.href = obj;
        }
      },
      error: function (xhr, status) {
        console.log(xhr);
        $.notify("Ocurrió un errors,", "error");
      },
    }); //promise
  }); // onClick
});

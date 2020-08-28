// Wait for the DOM to be ready
$(function() {
    $("form[name='login_form']").validate({
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 8
        }
      },
      messages: {
        password: {
          required: "Por favor, ingrese una contraseña",
          minlength: "La contraseña debe contener al menos 8 caracteres."
        },
        email:{
            required : "Por favor, ingrese un email.",
            email: "El Email no tiene una estructura correcta."
        } 

      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
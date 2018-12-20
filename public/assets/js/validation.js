$(document).ready(function () {
  $('#register').validate({
    errorPlacement: function(label, element) {
      element.addClass('error');

      label.insertBefore(element);
    },
    rules: {
      email:{
        required: true,
        email: true
      },
      password: {
        required: true,
        min: 6
      },
      password_confirmation:{
        required: true,
        equalTo: "#password"
      }
    }
  });

});

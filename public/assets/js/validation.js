$(document).ready(function () {
  $('#register').validate({
    errorPlacement: function(label, element) {
      element.addClass('error');
      return true;
    },
    rules: {
      email:{
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      },
      password_confirmation:{
        required: true,
        equalTo: "#password"
      }
    }
  });
  $('#edit').validate({
    errorPlacement: function(label, element) {
      element.addClass('error');
      return true;
    },
    rules: {
      email:{
        email: true
      },
      password: {
        required: true,
        minlength: 6
      },
      password2:{
        minlength: 6,
        notEqualTo: "#password"
      }
    }
  });
});

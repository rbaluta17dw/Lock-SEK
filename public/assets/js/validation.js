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
        min: 6
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
        min: 6
      },
      password2:{
        min: 6,
        notEqualTo: "#password"
      }
    }
  });
});

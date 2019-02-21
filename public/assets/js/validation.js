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
  $('#createKey').validate({
    errorPlacement: function(label, element) {
      element.addClass('error');
      return true;
    },
    rules: {
      keyName:{
        required: true,
        minlength: 4,
        maxlength: 45
      }
    }
  });
  $('#editKey').validate({
    errorPlacement: function(label, element) {
      element.addClass('error');
      return true;
    },
    rules: {
      newKeyName:{
        required: true,
        minlength: 4,
        maxlength: 45
      }
    }
  });
  $('#registerLock').validate({
    errorPlacement: function(label, element) {
      element.addClass('error');
      return true;
    },
    rules: {
      lockName:{
        required: true,
        minlength: 4,
        maxlength: 45
      },
      lockSerial:{
        required: true,
        minlength: 15,
        maxlength: 15
      }
    }
  });
  $('#newLockName').validate({
    errorPlacement: function(label, element) {
      element.addClass('error');
      return true;
    },
    rules: {
      newLockName:{
        required: true,
        minlength: 4,
        maxlength: 45
      }
    }
  });
});

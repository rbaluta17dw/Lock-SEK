$(window).click(function(){
  $.ajax({url: "notifications", success: function(result){
    $('#notifications').html('');
    for (var i = 0; i < result.length; i++) {
      if (result[i].read == 0) {
        result[i].read = "notSeen";
      }else {
        result[i].read = "";
      }
      var color = "white";
      var texto = "black";
      switch (result[i].marker) {
        case 0:
        result[i].marker = "fa-info-circle";
        color = "azureback";
        break;
        case 1:
        result[i].marker = "fa-exclamation-triangle";
        color = "yellowback";
        break;
        case 2:
        result[i].marker = "fa-user";
        break;
        case 3:
        result[i].marker = "fa-lock";
        break;
        case 3:
        result[i].marker = "fa-key";
        break;
        default:
        result[i].marker = "";
      }
      $('#notifications').append('<li><a href="notificaion"><div class="'+color+'"><i class="fa '+result[i].marker+' fa-fw"></i>'+result[i].title+'<b class="'+result[i].read+'" > !</b></div></a></li>');
    }
  }});
});

$('.notSeen').click(function(){
  $(this).removeClass('notSeen');
});

$(window).ready(function(){
  $.ajax({url: "notifications", success: function(result){
    $('#notifications').html('');
    for (var i = 0; i < result.length; i++) {
      if (result[i].read == 0) {
        result[i].read = "notSeen";
      }else {
        result[i].read = "";
      }
      var color = "white";
      var texto = "black";
      switch (result[i].marker) {
        case 0:
        result[i].marker = "fa-info-circle azul";
        color = "azureback";
        break;
        case 1:
        result[i].marker = "fa-exclamation-triangle amarillo";
        color = "yellowback";
        break;
        case 2:
        result[i].marker = "fa-user";
        break;
        case 3:
        result[i].marker = "fa-lock";
        break;
        case 3:
        result[i].marker = "fa-key";
        break;
        default:
        result[i].marker = "";
      }
      $('#notifications').append('<li><a href="notificaion"><div><i class="fa '+result[i].marker+' fa-fw"></i>'+result[i].title+'<b class="'+result[i].read+'"> !</b></div></a></li>');
    }
  }});
});

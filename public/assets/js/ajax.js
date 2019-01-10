
$(window).click(function(){
  $.ajax({url: "notifications", success: function(result){
    $('#notifications').html('');
    for (var i = 0; i < result.length; i++) {
      if (result[i].read == 0) {
        result[i].read = "notSeen";
      }else {
        result[i].read = "";
      }
      $('#notifications').append('<li><a href="notificaion"><div class="'+result[i].read+'"><i class="fa fa-comment fa-fw"></i>'+result[i].title+'<span class="pull-right text-muted small">'+result[i].message+'</span></div></a></li>');
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
      $('#notifications').append('<li><a href="notificaion"><div class="'+result[i].read+'"><i class="fa fa-comment fa-fw"></i>'+result[i].title+'<span class="pull-right text-muted small">'+result[i].message+'</span></div></a></li>');
    }
  }});
});

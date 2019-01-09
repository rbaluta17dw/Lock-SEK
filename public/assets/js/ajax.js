
$(window).click(function(){
  $.ajax({url: "notifications", success: function(result){
    $('#notifications').html('');
    for (var i = 0; i < result.length; i++) {
      $('#notifications').append('<li><a href="#"><div><i class="fa fa-comment fa-fw"></i>'+result[i].title+'<span class="pull-right text-muted small">'+result[i].message+'</span></div></a></li>');
    }
  }});
});

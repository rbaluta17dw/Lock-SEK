
$(window).click(function(){
  $.ajax({url: "/notifications", success: function(result){
    alert("si");
  }});
});

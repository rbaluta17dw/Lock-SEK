
$(window).click(function(){
  $.ajax({url: "https://www.google.es/", success: function(result){

      alert(result);
  }});
});

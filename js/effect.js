$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

$(document).ready(function(){

  $("#main-transition").css("display","none");

  $("#main-transition").fadeIn(500);

  $("a.switch-page").click(function(event){
    event.preventDefault();
    linkLocation = this.href;
    $("#main-transition").fadeOut(70,redirectPage);
  });

  function redirectPage(){
    window.location = linkLocation;
  }
})
function successAlert(message) {
    $("#alerts").html(
      '<div classs="container p-5">' +
        '<div class="alert alert-success shadow" role="alert" style="border-left:#155724 5px solid; border-radius: 0px">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true" style="color:#155724">&times;</span>' +
        "</button>" +
        '<div class="row">' +
        '<svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-shield-fill-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
        '<path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>' +
        "</svg>" +
        '<p style="font-size:18px" class="mb-0 font-weight-light"><b class="mr-1">' +
        message +
        "</p></b>" +
        "</div>" +
        "</div>"
    );
    window.scrollTo({
      top: 100,
      behavior: "smooth"
    });
    $("#alerts").fadeTo(2000, 500).slideUp(500, function () {
        $("#alerts").slideUp(500);
      });
  }
  
  function dangerAlert(message) {
    $("#alerts").html(
      ' <br><br>'+
        ' <div class="error-notice">'+
          ' <div class="oaerror danger">'+
            ' <strong><i style="font-size:25px;" class="fa-solid fa-circle-exclamation"></i></strong> - '+ message +
          ' </div>'+
        ' </div>'+
     '</div>'+
  ' </div>'
 );
    window.scrollTo({
      top: 100,
      behavior: "smooth",
    });
    $("#alerts")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#alerts").slideUp(500);
      });
  }
  
  function warningAlert(message) {
    $("#alerts").html(
         ' <br><br>'+
		       ' <div class="error-notice">'+
             ' <div class="oaerror warning">'+
               ' <strong><i style="font-size: 25px;" class="fa-solid fa-triangle-exclamation"></i> </strong> &nbsp '+ message +
             ' </div>'+
           ' </div>'+
	      '</div>'+
     ' </div>'
    );
    window.scrollTo({
      top: 100,
      behavior: "smooth"
    });
    $("#alerts")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#alerts").slideUp(500);
      });
  }
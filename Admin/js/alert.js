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
      '<div class="alert alert-danger shadow" role="alert" style="border-left:#721C24 5px solid; border-radius: 0px">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true" style="color:#721C24">&times;</span>' +
        "</button>" +
        '<div class="row">' +
        '<svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
        '<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>' +
        "	</svg>" +
        '<p style="font-size:18px" class="mb-0 font-weight-light"><b class="mr-1">' +
        message +
        "</b></p>" +
        "</div>" +
        "</div>"
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
      '<div class="alert alert-primary shadow" role="alert" style="border-left:#155724 5px solid; border-radius: 0px">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true" style="color:#155724">&times;</span>' +
        "</button>" +
        '<div class="row">' +
        '<svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
        '<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>' +
        "</svg>" +
        '<p style="font-size:18px" class="mb-0 font-weight-light"><b class="mr-1">' +
        message +
        "</b></p>" +
        "</div>" +
        "	</div>"
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
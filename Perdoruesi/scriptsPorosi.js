$(document).on("submit", "#porosit", function (e) {
    e.preventDefault();
    console.log('Success');
  
    /*if (name != "" && email != "" && password != "" && cpassword != "") {
      $.ajax({
        url: "manageAdmin.php",
        type: "post",
        data: {
          name: name,
          email: email,
          password: password,
          cpassword:cpassword,
          action: "addAdmin",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            mytable = $("#dtAdmin").DataTable();
            mytable.draw();
            $("#addAdmin").modal('hide');
            $("#insert_Admin")[0].reset();
            successAlert("E dhëna u shtua me sukses!");
  
          } else if (status == "false") {
            $("#addAdmin").modal('hide');
            $("#insert_Admin")[0].reset();
            dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");
  
          } else if (status == "passwordError") {
            $("#addAdmin").modal('hide');
            $("#password").val("");
            $("#cpassword").val("");
            warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");
  
          }else if(status == "passwordVerify"){
            $("#addAdmin").modal('hide');
            $("#password").val("");
            $("#cpassword").val("");
            warningAlert("Ju lutem plotësoni fjalëkalimin e njejtë!");

          } else if (status == 'emailError') {
            $('#addAdmin').modal('hide');
            warningAlert("Ekziston administrator me këtë email!");
          }
        },
      });
    } else {
      $("#addAdmin").modal('hide');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }*/
  });
$(document).ready(function () {
    $("#dtPerdorues").DataTable({
      fnCreatedRow: function (nRow, aData, iDataIndex) {
        $(nRow).attr("id", aData[0]);
      },
      serverSide: "true",
      processing: "true",
      paging: true,
      pagingType: "simple_numbers",
      info: false,
      "bSort": true,
      dom: "tip",
      order: [],
      language: {
        emptyTable: "Nuk ka të dhëna në databazë.",
      },
      ajax: {
        url: "managePerdorues.php",
        type: "post",
        data: {
          action: "fetchallprddata",
        },
      },
      columnDefs: [
        {
          target: [5],
          orderable: false,
        },
      ],
      rowCallback: function (nRow, aData, iDisplayIndex) {
        var oSettings = this.fnSettings();
        $("td:first", nRow).html(oSettings._iDisplayStart + iDisplayIndex + 1);
        return nRow;
      },
      oLanguage: {
        oPaginate: {
          sNext:
            '<span class=""></span><span><i class="ti-arrow-right" ></i></span>',
          sPrevious:
            '<span class=""></span><span><i class="ti-arrow-left" ></i></span>',
        },
      },
    });
    mytable = $("#dtPerdorues").DataTable();
    $(".searchPerdorues").keyup(function () {
      mytable.search($(this).val()).draw();
    });
  });

  $(document).on("submit", "#insert_perdorues", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var city = $('#qytetet').children(":selected").attr("id");
    var adress = $("#adress").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var password = $("#password").val();
  
    if (name != "" && city != '0' && adress != "" && phone != "" && email != "" && password != "") {
      $.ajax({
        url: "managePerdorues.php",
        type: "post",
        data: {
          name: name,
          city: city,
          adress: adress,
          phone: phone,
          email: email,
          password: password,
          action: "addPerdorues",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            mytable = $("#dtPerdorues").DataTable();
            mytable.draw();
            $("#addPerdorues").modal('hide');
            $("#insert_perdorues")[0].reset();
            successAlert("E dhëna u shtua me sukses!");
  
          } else if (status == "false") {
            $("#addPerdorues").modal('hide');
            $("#insert_perdorues")[0].reset();
            dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");
  
          } else if (status == "passwordError") {
            $("#addPerdorues").modal('hide');
            $("#password").val("");
            warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");
  
          }else if (status == 'emailError') {
            $("#addPerdorues").modal('hide');
            warningAlert("Ekziston administrator me këtë email!");
          }
        },
      });
    } else {
        $("#addPerdorues").modal('hide');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $(document).on("submit", "#update_Admin", function (e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var updateName = $("#updateName").val();
    var updateEmail = $("#updateEmail").val();
    var updatePassword = $("#updatePassword").val();
    var updateCpassword = $("#updateCpassword").val();
    var trid = $("#trid").val();
    var updateidadmin = $("#updateidadmin").val();
    if (updateName != "" && updateEmail != "" && updatePassword != "" && updateCpassword != "") {
      $.ajax({
        url: "manageAdmin.php",
        type: "post",
        data: {
          updateName: updateName,
          updateEmail: updateEmail,
          updatePassword: updatePassword,
          updateCpassword:updateCpassword,
          updateidadmin: updateidadmin,
          action: "updateAdmin",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            table = $("#dtAdmin").DataTable();
            table.draw();
            $("#editAdmin").modal("hide");
            $("#update_Admin")[0].reset();
            successAlert("Ndryshimet u ruajtën me sukses!");
  
          } else if (status == "false") {
            $("#update_Admin")[0].reset();
            dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");
  
          } else if (status == "passwordError") {
            $("#editAdmin").modal("toggle");
            $("#update_Admin")[0].reset();
            warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");
  
          }else if(status == "passwordVerify"){
            $("#editAdmin").modal('hide');
            $("#updatePassword").val("");
            $("#updateCpassword").val("");
            warningAlert("Ju lutem plotësoni fjalëkalimin e njejtë!");

          }else if (status == 'emailError') {
            $('#editAdmin').modal('toggle');
            $("#update_Admin")[0].reset();
            warningAlert("Ekziston përdorues me këtë email!");
          }
        },
      });
    } else {
      $("#editAdmin").modal("toggle");
      $("#update_Admin")[0].reset();
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $("#dtAdmin").on("click", ".editbtnadmin ", function (event) {
    var table = $("#dtAdmin").DataTable();
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#editAdmin").modal("toggle");
    $.ajax({
      url: "manageAdmin.php",
      data: {
        id: id,
        action: "singleAdminData",
      },
      type: "post",
      success: function (data) {
        var json = JSON.parse(data);
        $("#updateName").val(json.name);
        $("#updateEmail").val(json.email);
        $("#updateidadmin").val(id);
        $("#trid").val(trid);
      },
    });
  });
  
  $(document).on("click", ".deleteBtn", function (event) {
    var table = $("#dtAdmin").DataTable();
    event.preventDefault();
    thisfordelete = $(this);
    var id = $(this).data("id");
    if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
      $.ajax({
        url: "manageAdmin.php",
        data: {
          id: id,
          action: "deleteAdmin",
        },
        type: "post",
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "success") {
            $(thisfordelete).closest("tr").remove();
            successAlert("E dhëna u fshi me sukses!");
          } else {
            dangerAlert("Gabim gjatë fshirjes në databazë!");
            return;
          }
        },
      });
    } else {
      return null;
    }
  });

  $('#addPrd').on("click", function (event) {
    $('#qytetet').empty();
    $.ajax({
      type: "post",
      url: "managePerdorues.php",
      dataType:"json",
      data:{action:'selectCity'},
      success: function (data) {
        $("#qytetet").empty();
        $("#qytetet").append("<option value='0'> Zgjedh Qytetin </option>");
        $.each(data,function(i, item){
          $('#qytetet').append('<option value="'+data[i].id_city+'">'+ data[i].name+'</option>');
        });
      }
    });
  });
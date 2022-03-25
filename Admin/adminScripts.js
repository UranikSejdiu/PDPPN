$(document).ready(function () {
    $("#dtAdmin").DataTable({
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
        url: "manageAdmin.php",
        type: "post",
        data: {
          action: "fetchalladmindata",
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
    mytable = $("#dtAdmin").DataTable();
    $(".searchAdmin").keyup(function () {
      mytable.search($(this).val()).draw();
    });
  });

  $(document).on("submit", "#insert_Admin", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
  
    if (name != "" && email != "" && password != "" && cpassword != "") {
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
            var message = json.message;
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
    }
  });
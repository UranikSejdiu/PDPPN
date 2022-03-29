$(document).ready(function () {
  $("#dtKompani").DataTable({
    fnCreatedRow: function (nRow, aData, iDataIndex) {
      $(nRow).attr("id", aData[0]);
    },
    serverSide: "true",
    processing: "true",
    paging: true,
    pagingType: "simple_numbers",
    info: false,
    dom: "tip",
    order: [],
    language: {
      emptyTable: "Nuk ka të dhëna në databazë.",
    },
    ajax: {
      url: "manageKompani.php",
      type: "post",
      data: {
        action: "fetchalldata",
      },
    },
    columnDefs: [
      {
        target: [12],
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
          '<span class=""></span><span><i class="fa fa-chevron-right" ></i></span>',
        sPrevious:
          '<span class=""></span><span><i class="fa fa-chevron-left" ></i></span>',
      },
    },
  });
  mytable = $("#dtKompani").DataTable();
  $(".searchKompani").keyup(function () {
    mytable.search($(this).val()).draw();
  });
});

$(document).on("submit", "#insert_kompani", function (e) {
  e.preventDefault();
  var name = $("#name").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var fiskal = $("#fiskal").val();
  var phone = $("#phone").val();
  var lokacioni = $("#lokacioni").val();

  var form = document.getElementById("insert_kompani");
  var logo = $("#logo").val();
  var file_data = $("#logo").prop("file");
  var formData = new FormData(form);
  formData.append("logo", file_data);
  formData.append("action", "addKompani");

  if (
    name != "" &&
    email != "" &&
    password != "" &&
    fiskal != "" &&
    phone != "" &&
    lokacioni != "" &&
    logo != ""
  ) {
    $.ajax({
      url: "manageKompani.php",
      type: "post",
      processData: false,
      contentType: false,
      data: formData,
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#dtKompani").DataTable();
          mytable.draw();
          $("#addKompani").modal('hide');
          $("#image-holder").html("");
          successAlert("E dhena u shtua me sukses!");

        } else if (status == "false") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");

        } else if (status == "passwordError") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");

        } else if (status == "emailError") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Ekziston kompani me këtë email!");

        } else if (status == "logoFormat") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Lejohen vetëm formatet png,jpg,jpeg!");

        } else if (status == "logoMB") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Madhësia maksimale duhet të jetë 5MB!");

        } else if (status == "nrFError") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Numri fiskal duhet të ketë max 9 numra");
        }
      },
    });
  } else {
    $("#addKompani").modal('hide');
    $("#insert_kompani")[0].reset();
    warningAlert("Ju lutem plotësoni të gjitha fushat!");
  }
});

$(document).on("submit", "#update_kompani", function (e) {
  e.preventDefault();

  var kompania_update = $("#kompania_update").val();
  var fiskal_update = $("#fiskal_update").val();
  var lokacioni_update = $("#lokacioni_update").val();
  var tel_update = $("#tel_update").val();
  var email_update = $("#email_update").val();
  var pass_update = $("#pass_update").val();
  var trid = $("#trid").val();
  var updateIdKomp = $("#updateIdKomp").val();
console.log(updateIdKomp);
  var form = document.getElementById("update_kompani");
  var file_data = $("#logo_update").prop("file");
  var formData = new FormData(form);
  formData.append("#logo_update", file_data);
  formData.append("#updateIdKomp", updateIdKomp);
  formData.append("action", "updateKompani");

  if (kompania_update != "" && fiskal_update != "" && lokacioni_update != "" && tel_update != "" && email_update != "" && pass_update != "") {
    $.ajax({
      url: "manage_Kompani.php",
      type: "post",
      processData: false,
      contentType: false,
      data: formData,
      success: function (data) {

        var json = JSON.parse(data);
        var status = json.status;

        if (status == "true") {
          table = $("#tabelaKompani").DataTable();
          table.draw();
          $("#updateKompani").modal("toggle");
          successAlert("Ndryshimet u ruajtën me sukses!");

        } else if (status == "false") {
          $("#updateKompani").modal("toggle");
          dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");

        } else if (status == "passwordError") {
          $("#updateKompani").modal("toggle");
          warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");

        } else if (status == "emailError") {
          $("#updateKompani").modal("toggle");
          warningAlert("Ekziston përdorues me këtë email!");
        }
      },
    });
  } else {
    $("#updateKompani").modal("toggle");
    $("#update_kompani")[0].reset();
    warningAlert("Ju lutem plotësoni të gjitha fushat!");
  }
});
$("#tabelaKompani").on("click", ".editBtnKomp ", function (event) {
  //var table = $("#tabelaKompani").DataTable();
  var trid = $(this).closest("tr").attr("id_kompania");

  var id_kompania = $(this).data("id");
  $("#updateKompani").modal("toggle");
  $.ajax({
    url: "manage_Kompani.php",
    data: {
      id_kompania: id_kompania,
      action: "singleKompaniData",
    },
    type: "post",
    success: function (data) {
      var json = JSON.parse(data);
      $("#logoUp").attr("src", json.Logo);
      $("#kompania_update").val(json.Emri);
      $("#fiskal_update").val(json.NumriFiskal);
      $("#lokacioni_update").val(json.Lokacioni);
      $("#tel_update").val(json.Telefoni);
      $("#email_update").val(json.Email);
      $("#pass_update").val(json.Fjalekalimi);
      $("#updateIdKomp").val(id_kompania);
      $("#trid").val(trid);
    },
  });
});

$(document).on("click", ".deleteBtnKomp", function (event) {
  //var table = $("#tabelaKompani").DataTable();
  event.preventDefault();
  thisfordelete = $(this);
  var id_kompania = $(this).data("id");
  if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
    $.ajax({
      url: "manage_Kompani.php",
      data: {
        id_kompania: id_kompania,
        action: "deleteKompani",
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
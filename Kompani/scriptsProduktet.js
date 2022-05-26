$(document).ready(function () {
  $("select#kat").on('change', function () {
    var ID = $("#kat").val();
    selMadhesit(ID);
    selNgjyra(ID);
  });


  $("#dtProduktet").DataTable({
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
      url: "manageProduktet.php",
      type: "post",
      data: {
        action: "fetchalldata",
      },
    },
    columnDefs: [
      {
        target: [14],
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
  mytable = $("#dtProduktet").DataTable();
  $(".searchProdukt").keyup(function () {
    mytable.search($(this).val()).draw();
  });

  $(document).on("submit", "#insert_produkt", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var kat = $("#kat").val();
    var pershkrimi = $("#pershkrimi").val();
    var qmimi = $("#qmimi").val();
    var stok = $("#stok").val();
    var madhesia = $("#madhesia").val();
    var ngjyra =$("#ngjyra").val();
    var kompania =$("#kompania").val();
  
    var form = document.getElementById("insert_produkt");
    var logo = $("#logo").val();
    var formData = new FormData(form);
    formData.append("action", "addProdukt");
  
    if (
      name != "" &&
      kat != "" &&
      pershkrimi != "" &&
      qmimi != "" &&
      stok != "" &&
      kompania != "" &&
      logo != ""
    ) {
      $.ajax({
        url: "manageProduktet.php",
        type: "post",
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            mytable = $("#dtProduktet").DataTable();
            mytable.draw();
            $("#addProdukt").modal('hide');
            $("#image-holder").html("");
            successAlert("E dhena u shtua me sukses!");
  
          } else if (status == "false") {
            $("#addProdukt").modal('hide');
            $("#insert_produkt")[0].reset();
            dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");
  
          } else if (status == "passwordError") {
            $("#addProdukt").modal('hide');
            $("#insert_produkt")[0].reset();
            warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");
  
          } else if (status == "emailError") {
            $("#addProdukt").modal('hide');
            $("#insert_produkt")[0].reset();
            warningAlert("Ekziston kompani me këtë email!");
  
          } else if (status == "logoFormat") {
            $("#addProdukt").modal('hide');
            $("#insert_produkt")[0].reset();
            warningAlert("Lejohen vetëm formatet png,jpg,jpeg!");
  
          } else if (status == "logoMB") {
            $("#addProdukt").modal('hide');
            $("#insert_produkt")[0].reset();
            warningAlert("Madhësia maksimale duhet të jetë 5MB!");
  
          }
        },
      });
    } else {
      $("#addProdukt").modal('hide');
      $("#insert_produkt")[0].reset();
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

});

function selMadhesit(id) {
  var id = id;
  $.ajax({
    url: "manageProduktet.php",
    data: {
      id: id,
      action: "selMadhesia",
    },
    type: "post",
    dataType: 'json',
    success: function (data) {
      var len = data.length;
      if (len === 0) {
        $('#size').hide();
      } else {
        $('#size').show();
        $("#madhesia").empty();
        $("#madhesia").append("<option hidden value='" + 0 + "'>" + 'Zgjedh madhësinë' + "</option>");
        for (var i = 0; i < len; i++) {
          var id = data[i]['madhesiaID'];
          var name = data[i]['madhesia'];
          $("#madhesia").append("<option value='" + id + "'>" + name + "</option>");
        }
      }
    }
  });
}

function selNgjyra(id) {
  var id = id;
  $.ajax({
    url: "manageProduktet.php",
    data: {
      id: id,
      action: "selNgjyra",
    },
    type: "post",
    dataType: 'json',
    success: function (data) {
      var len = data.length;
      if (len === 0) {
        $('#color').hide();
      } else {
        $('#color').show();
        $("#ngjyra").empty();
        $("#ngjyra").append("<option value='" + 0 + "'hidden>" + 'Zgjedh ngjyrën' + "</option>");
        for (var i = 0; i < len; i++) {
          var id = data[i]['ngjyraID'];
          var name = data[i]['ngjyra'];
          $("#ngjyra").append("<option value='" + id + "'>" + name + "</option>");
        }
      }
    }
  });
}


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
        $("#madhesia").append("<option value='" + 0 + "'>" + 'Zgjedh madhësinë' + "</option>");
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
        $("#ngjyra").append("<option value='" + 0 + "'>" + 'Zgjedh ngjyrën' + "</option>");
        for (var i = 0; i < len; i++) {
          var id = data[i]['ngjyraID'];
          var name = data[i]['ngjyra'];
          $("#ngjyra").append("<option value='" + id + "'>" + name + "</option>");
        }
      }
    }
  });
}


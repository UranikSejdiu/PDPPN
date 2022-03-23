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
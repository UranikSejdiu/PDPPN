$("#dtPorosit").DataTable({
    fnCreatedRow: function (nRow, aData, iDataIndex) {
      $(nRow).attr("ID", aData[0]);
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
      url: "manageAllPorosit.php",
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
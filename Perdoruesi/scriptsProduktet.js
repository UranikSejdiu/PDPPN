$(document).ready(function () {
  singleProduktData();
});

function singleProduktData() {
  var id = $('#prodID').val();
  $.ajax({
      url: "manageProduktet.php",
      data: {
          id: id,
          action: "singleProduktData",
      },
      type: "post",
      success: function (data) {
          var json = JSON.parse(data);
          $("#foto1").attr("src", json.imazhi1);
          $("#foto2").attr("src", json.imazhi2);
          $("#foto3").attr("src", json.imazhi3);
          $("#foto4").attr("src", json.imazhi4);
          $("#foto5").attr("src", json.imazhi1);

          $("#produktTitulli").html(json.produkti);
          $("#pershkrimi").html(json.pershkrimi);
          $("#qmimi").html(json.qmimi);
      },
  });
}
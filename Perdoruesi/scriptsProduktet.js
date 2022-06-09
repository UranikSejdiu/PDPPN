$(document).ready(function () {
  singleProduktData();

  var rating_data = 0;
  $('#add_review').click(function () {
    $('#review-modal').modal('show');
  });

  $(document).on('mouseenter', '.submit_star', function () {
    var rating = $(this).data('rating');
    reset_background();
    for (var count = 1; count <= rating; count++) {
      $('#submit_star_' + count).addClass('text-warning');
    }
  });

  function reset_background() {
    for (var count = 1; count <= 5; count++) {
      $('#submit_star_' + count).addClass('star-light');
      $('#submit_star_' + count).removeClass('text-warning');
    }
  }

  $(document).on('mouseleave', 'submit_star', function () {
    reset_background();
  });

  $(document).on('click', '.submit_star', function () {
    rating_data = $(this).data('rating');
  });

  $('#save_review').click(function () {
    var userName = $('#userName').val();
    var userReview = $('#userReview').val();
    var prodID = $('#prodID').val();

    if (userName == '' || userReview == '') {
      $("#review-modal").modal('hide');
      $(this).find('form').trigger('reset');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    } else {
      $.ajax({
        url: "manageProduktet.php",
        method: "POST",
        data: {
          rating_data: rating_data,
          userName: userName,
          userReview: userReview,
          prodID: prodID,
          action: "addReview"

        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            $("#review-modal").modal('hide');
            $('#userName').html("");
            $('#userReview').html("");
            successAlert("Vlerësimi u ruajt me sukses!");
          }
        }
      })
    }
  });
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
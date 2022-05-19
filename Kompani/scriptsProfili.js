$(document).ready(function () {
    singleKompaniData();
});

function singleKompaniData() {
    var id = $('#updateIdKomp').val();
    $.ajax({
        url: "manageProfili.php",
        data: {
            id: id,
            action: "singleKompaniData",
        },
        type: "post",
        success: function (data) {
            var json = JSON.parse(data);
            $("#updateLogo").attr("src", json.logo);
            $("#logoUp").attr("src", json.logo);
            $("#updateName").val(json.name);
            $("#updateFiskal").val(json.nrfiskal);
            $("#updateLokacioni").val(json.lokacioni);
            $("#updatePhone").val(json.telefoni);
            $("#updateEmail").val(json.email);
            $("#updateIdKomp").val(id);
        },
    });
  }

$(document).on("submit", "#updateProfili", function (e) {
    e.preventDefault();

    var updateName = $("#updateName").val();
    var updateFiskal = $("#updateFiskal").val();
    var updateLokacioni = $("#updateLokacioni").val();
    var updatePhone = $("#updatePhone").val();
    var updateEmail = $("#updateEmail").val();
    var updateIdKomp = $("#updateIdKomp").val();
    var form = document.getElementById("updateProfili");
    var file_data = $("#updateLogo").prop("file");
    var formData = new FormData(form);
    formData.append("#updateLogo", file_data);
    formData.append("#updateIdKomp", updateIdKomp);
    formData.append("action", "updateKompani");

    if (updateName != "" && updateFiskal != "" && updateLokacioni != "" && updatePhone != "" && updateEmail != "") {
        $.ajax({
            url: "manageProfili.php",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {

                var json = JSON.parse(data);
                var status = json.status;

                if (status == "true") {
                    singleKompaniData();
                    successAlert("Ndryshimet u ruajtën me sukses!");

                } else if (status == "false") {
                    singleKompaniData();
                    dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");

                } else if (status == "emailError") {
                    singleKompaniData();
                    warningAlert("Ekziston përdorues me këtë email!");

                } else if (status == "logoFormat") {
                    singleKompaniData();
                    warningAlert("Ju lutem zgjedhni një imazh me format të lejuar!");

                } else if (status == "logoMB") {
                    singleKompaniData();
                    warningAlert("Imazhi kalon hapsirën e lejuar për ngarkim!");
                }
            },
        });
    } else {
        singleKompaniData();
        warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
});



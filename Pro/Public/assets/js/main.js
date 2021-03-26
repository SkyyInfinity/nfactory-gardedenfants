$(document).ready(function () {
  // JQUERY START

  //Menu dashboard

  $(".menuItem").on("click", (button) => {
    const IdButton = button.target.id.split("-");
    const IdContent = $("div#contentItem-" + IdButton[1]);
    const longueurTabs = IdContent.parent().children().length;

    for (i = 1; i <= longueurTabs; i++) {
      $("div#contentItem-" + i).fadeOut(200);
      $("div#menuItem-" + i).removeClass("active");
    }

    IdContent.fadeIn(400);
    $("div#menuItem-" + IdButton[1]).addClass("active");
  });

  //Envoie FILE VERIFICATION JURIDIQUE PRO

  $("#PV_form_file").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "Public/ajax/ajax.php",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,

      beforeSend: function () {},

      success: function (response) {},
    });
  });

  //AJAX ADD SKILL

  $("#AddSkillNounou").on("submit", function (e) {
    e.preventDefault();
    let form = $("#AddSkillNounou");
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form.serialize(),
      dataType: "json",
      beforeSend: function () {
        $("#btn-submit-addSkill").fadeIn("200");
      },

      success: function (response) {
        $("#btn-submit-addSkill").fadeIn("200");
        if (response.success) {
          $("#allSkills").append(
            '<div class="skill"><p><span class="title">' +
              response.title +
              '</span> - <span class="description">' +
              response.description +
              "</span></p></div>"
          );
          $("#AddSkillNounou input[type=text]").val("");
          $("#AddSkillNounou textarea").val("");
        } else {
          console.log("NON");
        }
      },
    });
  });

  $("#AddDateNounou").on("submit", function (e) {
    e.preventDefault();
    let form = $("#AddDateNounou");
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form.serialize(),
      dataType: "json",
      beforeSend: function () {
        $("#btn-submit-addSkill").fadeIn("200");
      },

      success: function (response) {
        $("#btn-submit-addSkill").fadeIn("200");
        console.log("pouet");
      },
    });
  });

  //API GEOLOCALISATION PRO

  const apiGeo = "https://api-adresse.data.gouv.fr/search/?q=";
  const geoFormat = "&format=json";

  let geoAdresse = $("#geoadresse");

  // JQUERY END
});

//Calendar
/*
document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("Calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "timeGridWeek",
    heigth: "100%",
    contentHeight: "auto",
    allDaySlot: false,
    firstDay: 1,
    slotEventOverlap: false,
    slotDuration: "00:30:00",
  });
  calendar.setOption("locale", "fr");
  calendar.render();
});
*/

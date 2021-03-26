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

    //fonction trim

  function trim(myString){
    return myString.replace(/ /gi,'%20');
  } 

  const apiGeo = 'https://api-adresse.data.gouv.fr/search/?q=';
  const geoFormat = '&type=housenumber&autocomplete=1';

  let geoAdresse = $("#geoadresse");

  $('#geoadresse').keyup( function(){
    let geourl = apiGeo+trim(geoAdresse.val())+geoFormat;
    console.log(geourl);
    fetch(geourl, {method: 'get'}).then(response => response.json()).then(results =>{
      $('#geoselectadresse').find('option').remove();
      $('#geolist').find('tr').remove();

      let geolabel = [];
      let geolong = [];
      let geolatt = [];
      let geocodepostal = [];

      for(let i = 0 ; i < results['features'].length ; i++){
        $('#geolist').append('<tr><td>numéro '+[i + 1]+' | </td><td>'+results['features'][i]['properties']['label']+'</td><td><button id="geoAdd'+[i]+'">X'+i+'</button></td><tr>');
        
        
        geolabel.push(results['features'][i]['properties']['label']);
        geolong.push(results['features'][i]['geometry']['coordinates'][0]);
        geolatt.push(results['features'][i]['geometry']['coordinates'][1]);
        geocodepostal.push(results['features'][i]['properties']['postcode']);

        console.log('geolabel');
        console.log(geolabel);

        $("#geoAdd"+[i]).on("click", function (e) {
          e.preventDefault();
          $.ajax({
            type: "POST",
            url: "Public/ajax/ajaxgeo.php",
            //dataType: "json",
            //data: 'label=' + geolabel[i] + '&codepostal=' + geocodepostal[i] + '&long=' + geolong[i] + '&latt=' + geolatt[i],
            data: {
              'label' : geolabel[1]
            },
            contentType: false,
            cache: false,
            processData:false,
      
            beforeSend: function (){
              console.log("Requete en cours")
            },
      
            success: function (response){
              console.log({
                label: geolabel[i]
              })
              console.log(response);
            }
          });
        });

      }
    });
  })
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

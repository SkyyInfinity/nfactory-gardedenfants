$(document).ready(function () {
  // JQUERY START

  //Menu dashboard

  $(".menuItem").on("click", (button) => {
    const IdButton = button.target.id.split("-");
    const IdContent = $("div#contentItem-" + IdButton[1]);
    const longueurTabs = IdContent.parent().children().length;
    //console.log(longueurTabs);
    console.log(IdContent.parent().children());

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
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,

      beforeSend: function (){
        console.log("Requete en cours")
      },

      success: function (response){
        console.log(response);
      }
    });
  });

  //API GEOLOCALISATION PRO

  const apiGeo = 'https://api-adresse.data.gouv.fr/search/?q=';
  const geoFormat = '&format=json';

  let geoAdresse = $('#geoadresse');

  
  // JQUERY END
});

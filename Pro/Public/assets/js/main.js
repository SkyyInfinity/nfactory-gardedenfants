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
  // JQUERY END
});

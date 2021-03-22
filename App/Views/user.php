<?php
if(!isLogged()) {
    redirect('home');
}

$title = 'Mon espace'; 
?>

<section id="user">
    <div class="wrap">
        <h1 class="section-title">Mon espace</h1>
        <div class="complete">
            <p>Votre profil est complété à 0%
                <span>Pour compléter votre profil, veuillez vous rendre sur la page <a href="account">Mon Compte</a></span>
            </p>
        </div>
        <div class="grid">
            <div class="fav fav-garderie">
                <h2 class="second-title">Vos garderies favorites</h2>
                <ul>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                    <li>Content</li>
                </ul>
            </div>
            <div class="fav fav-nourisse">
                <h2 class="second-title">Vos nounous favorites</h2>
                <ul>
                    <li>Content</li>
                </ul>
            </div>
            <div class="map">
                <h2 class="second-title">Établisements à proximité</h2>
                <div id='map' style='width: 100%; height: 600px;'></div>
            </div>
        </div>
    </div>
</section>


<noscript>
  <style>
    /**
    * Reinstate scrolling for non-JS clients
    */
    .grid .fav-garderie,
    .grid .fav-nourisse {
      overflow: auto;
    }
  </style>
</noscript>


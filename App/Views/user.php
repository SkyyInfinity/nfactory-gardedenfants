<?php
if(!isLogged()) {
    redirect('home');
}
$title = 'Mon espace'; ?>

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
                </ul>
            </div>
            <div class="fav fav-nourisse">
                <h2 class="second-title">Vos nounous favorites</h2>
                <ul>
                    <li>Content</li>
                </ul>
            </div>
            <div class="map">
                <h2 class="second-title">Nourisse et crêche à proximité</h2>
                <div class="geolocalisation">
                    <button class="btn-submit btn-orange" id="geolocMe">Trouver à proximité</button>
                    <input type="search" name="geo" id="geo">
                    <button class="btn-submit btn-orange" id="searchGeo"><i class="fas fa-search"></i></button>
                </div>
                <div id='map' style='width: 100%; height: 600px;'></div>
            </div>
        </div>
        <div class="childList">
            <ul>
                <?php foreach($childs as $child) : ?>
                <li>
                    <div class="infos">
                        <h3><?= $child->name ?></h3>
                        <p><?php if($child->age <= 1){echo $child->age . ' an';}else{echo $child->age . ' ans';} ?></p>
                    </div>
                    <div class="btn">
                        <a href="reserve/<?= $child->id ?>" class="btn btn-orange">Reservé pour <?= $child->name ?></a>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</section>
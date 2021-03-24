<?php
if(isLogged()) {
    redirect('user');
}

$title = 'Accueil'; ?>

<section id="home">
    <div class="wrap">
        <h1 class="section-title">Kid'oma !</h1>
        <div class="flex">
            <div class="left">
                <div id="scene" data-relative-input="true">
                    <img class="card card3" data-depth="0.3" src="./Public/assets/img/undraw_home1.svg" alt="card">
                    <img class="man man3" data-depth="0.1" src="./Public/assets/img/undraw_home2.svg" alt="man">
                </div>
            </div>
            <div class="right">
                <div class="particulier">
                    <h2>Vous êtes particulier ?</h2>
                    <p>Vous êtes un particulier souhaitant faire garder votre(vos) enfant(s) ? <br>
                       Commencer par vous inscrire en cliquant sur le lien ci-dessous et laisser vous guider !
                    </p>
                    <a href="signup" class="btn btn-orange">S'inscrire <i class="fas fa-user"></i></a>
                </div>
                <div class="professionnel">
                    <h2>Vous êtes professionnel ?</h2>
                    <p>Vous êtes professionnel de la garde d'enfant souhaitant proposer vos services ? <br>
                       Passer sur notre espace professionnel et inscrivez-vous dès maintenant pour commencer.
                    </p>
                    <a href="./Pro" class="btn btn-blue">Rejoindre l'espace Pro <i class="fas fa-user-tie"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

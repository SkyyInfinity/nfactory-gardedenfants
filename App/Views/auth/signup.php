<?php $title = 'Inscription'; 

if(!empty($_POST)) {
    debug($_POST);
}

?>

<section id="inscription">
    <div class="wrap">
        <div class="flex">
            <div class="illustration">
                <div id="scene" data-relative-input="true">
                    <img class="card" data-depth="0.3" src="./Public/assets/img/undraw_signin1.svg" alt="card">
                    <img class="man" data-depth="0.1" src="./Public/assets/img/undraw_signin2.svg" alt="man">
                </div>
            </div>
            <div class="form">
                <h1 class="section-title">Inscription</h1>
                <form action="index.php?page=registration" method="post" id="registration_form">
                    <div class="champ">
                        <label for="name">Votre prénom</label>
                        <input id="name" type="text" name="name" placeholder="John">
                    </div>
                    <div class="champ">
                        <label for="surname">Votre nom</label>
                        <input id="surname" type="text" name="surname" placeholder="Doe">
                    </div>
                    <div class="champ">
                        <label for="email">Votre email</label>
                        <input id="email" type="email" name="email" placeholder="john.doe@example.com">
                    </div>
                    <div class="champ">
                        <label for="password">Votre mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="********">
                    </div>
                    <div class="champ submit">
                        <button class="btn-submit btn-orange">S'inscrire</button>
                    </div>
                    <!-- <label>Confirmation: <input type="password" name="password2" id="password2"></label> -->
                </form>
            </div>
        </div>
    </div>
</section>

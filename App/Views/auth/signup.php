<?php 
if(!empty($_SESSION['user']->role)) {
    redirect('user');
}

$title = 'Inscription'; 
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
                <form action="signupRequest" method="post" id="registration_form">
                    <div class="champ">
                        <label for="name">Votre prénom</label>
                        <input id="name" type="text" name="name" placeholder="John">
                        <span class="error"><?php if (!empty($errors['name'])){echo $errors['name'];} ?></span>
                    </div>
                    <div class="champ">
                        <label for="surname">Votre nom</label>
                        <input id="surname" type="text" name="surname" placeholder="Doe">
                        <span class="error"><?php if (!empty($errors['surname'])){echo $errors['surname'];} ?></span>
                    </div>
                    <div class="champ">
                        <label for="email">Votre email</label>
                        <input id="email" type="email" name="email" placeholder="john.doe@example.com">
                        <span class="error"><?php if (!empty($errors['email'])){echo $errors['email'];} ?></span>
                    </div>
                    <div class="champ">
                        <label for="password">Votre mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="********">
                        <span class="error"><?php if (isset($errors['password'])){echo $errors['password'];} ?></span>
                        <span class="error"><?php if (isset($errors['passwords'])){echo $errors['passwords'];} ?></span>
                    </div>
                    <div class="champ">
                        <label for="password">Confirmation</label>
                        <input type="password" name="password2" id="password2" placeholder="********">
                        <span class="error"><?php if (!empty($errors['password2'])){echo $errors['password2'];} ?></span>
                        <span class="error"><?php if (isset($errors['passwords'])){echo $errors['passwords'];} ?></span>
                    </div>
                    <div class="champ submit">
                        <input class="btn-submit btn-orange" type="submit"value="S'inscrire"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

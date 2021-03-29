<?php
if (isLogged()) {
    redirect('user');
}

$title = 'Inscription'; ?>

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
                        <?php if (!empty($errors['name'])) : ?>
                            <?php echo '<span class="error">' . $errors['name'] . '</span>' ?>
                        <?php endif; ?>
                    </div>
                    <div class="champ">
                        <label for="surname">Votre nom</label>
                        <input id="surname" type="text" name="surname" placeholder="Doe">
                        <?php if (!empty($errors['surname'])) : ?>
                            <span class="error"><?= $errors['surname']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="champ">
                        <label for="email">Votre email</label>
                        <input id="email" type="email" name="email" placeholder="john.doe@example.com">
                        <?php if (!empty($errors['email'])) : ?>
                            <span class="error"><?= $errors['email']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="champ">
                        <label for="password">Votre mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="********">
                    </div>
                    <div class="champ">
                        <label for="password2">Confirmation du mot de passe</label>
                        <input type="password" name="password2" id="password2" placeholder="********">
                        <?php if (!empty($errors['password'])) : ?>
                            <span class="error"><?= $errors['password']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="champ submit">
                        <input class="btn-submit btn-orange" type="submit" value="S'inscrire"></input>
                    </div>
                    <div class="champ">
                        <a href="login">Déjà inscrit ? Connectez-vous !</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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
                    <img class="card" data-depth="0.3" src="<?= URL ?>Public/assets/img/undraw_signin1.svg" alt="card">
                    <img class="man" data-depth="0.1" src="<?= URL ?>Public/assets/img/undraw_signin2.svg" alt="man">
                </div>
            </div>
            <div class="form">
                <h1 class="section-title">Inscription</h1>
                <form action="" method="post" id="registration_form">
                    <div class="champ">
                        <label for="name">Votre prénom</label>
                        <input id="name" type="text" name="name" placeholder="John" value="<?php if(!empty($_POST['name'])){echo $_POST['name'];} ?>">
                        <?php if (!empty($errors['name'])) : ?>
                            <span class="error"><?= $errors['name'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="champ">
                        <label for="surname">Votre nom</label>
                        <input id="surname" type="text" name="surname" placeholder="Doe" value="<?php if(!empty($_POST['surname'])){echo $_POST['surname'];} ?>">
                        <?php if (!empty($errors['surname'])) : ?>
                            <span class="error"><?= $errors['surname']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="champ">
                        <label for="email">Votre email</label>
                        <input id="email" type="email" name="email" placeholder="john.doe@example.com" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>">
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
                        <input class="btn-submit btn-orange" type="submit" name="submitted" value="S'inscrire"></input>
                    </div>
                    <div class="champ">
                        <a href="login">Déjà inscrit ? Connectez-vous !</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
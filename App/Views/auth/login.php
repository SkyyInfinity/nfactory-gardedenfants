<?php 
if(isLogged()) {
    redirect('user');
}

$title = 'Connexion'; ?>

<section id="connexion">
    <div class="wrap">
        <div class="flex">
            <div class="illustration">
                <div id="scene" data-relative-input="true">
                    <img class="card card2" data-depth="0.3" src="<?= URL ?>Public/assets/img/undraw_auth2.svg" alt="card">
                    <img class="man man2" data-depth="0.1" src="<?= URL ?>Public/assets/img/undraw_auth1.svg" alt="man">
                </div>
            </div>
            <div class="form">
                <h1 class="section-title">Connexion</h1>
                <form action="" method="post" class="form">
                    <div class="champ">
                        <label for="email">Votre email</label>
                        <input id="email" type="email" name="email" placeholder="john.doe@example.com" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>">
                    </div>
                    <div class="champ">
                        <label for="password">Votre mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="********">
                        <a class="forgot" href="forgotPassword">Mot de passe oublié ?</a>
                        <?php if(!empty($errors)) : ?>
                            <span class="error"> <?= $errors ?></span>
                        <?php endif ?>
                    </div>
                    <div class="champ submit">
                        <!-- <button class="btn-submit btn-orange">Se connecter</button> -->
                        <input class="btn-submit btn-orange" type="submit" name="submitted" value="Se connecter"></input>
                    </div>
                    <div class="champ">
                        <a href="signup">Pas de compte ? Inscrivez-vous !</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
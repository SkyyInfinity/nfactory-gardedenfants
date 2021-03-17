<?php $title = 'Connexion'; ?>

<section id="connexion">
    <div class="wrap">
        <h1 class="section-title">Connexion</h1>
        <form action="index.php?page=login" method="post" class="form">
            <div class="champ">
                <label for="email">Votre email</label>
                <input id="email" type="email" name="email" placeholder="john.doe@example.com">
            </div>
            <div class="champ">
                <label for="password">Votre mot de passe</label>
                <input id="password" type="password" name="password" placeholder="********">
            </div>
            <?php if(isset($error)): ?>
                <p class="error"> <?= $error ?></p>
            <?php endif; ?>
            <div class="champ submit">
                <button class="btn-submit btn-orange">Se connecter</button>
            </div>
        </form>
    </div>
</section>
<?php
if(isLogged()) {
    redirect('home');
}

$title = 'Mot de passe oublié'; ?>

<section id="forgotPassword">
    <div class="wrap">
        <h1 class="section-title">Mot de passe oublié</h1>
    </div>
</section>
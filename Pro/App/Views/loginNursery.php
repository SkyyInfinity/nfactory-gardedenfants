<?php $title = "Kid'Oma Pro | Connexion" ?>

<h2>Connexion</h2>

<div id="formLoginNursery">
    <form action="" method="POST" >

        <div class="input-area">
            <label for="email-login-nursery">Votre Email</label>
            <input type="email" name="email-login-nursery" id="email-login-nursery">
        </div>
        <span class="span-error error-email-login-nursery"><?php if(!empty($errors['login']) && $errors['login'] != ''){ echo $errors['login']; } ?></span>

        <div class="input-area">
            <label for="password-login-nursery">Votre mot de passe</label>
            <input type="password" name="password-login-nursery" id="password-login-nursery">
        </div>
        
        <div class="input-area">
            <input type="submit" value="Se connecter">
        </div>
    </form>
</div>
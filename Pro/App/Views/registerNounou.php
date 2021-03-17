<?php $title = "Kid'Oma Pro | Inscription" ?>

<h2>Inscription Nounou</h2>

<div id="formRegisterNounou">
    <form action="" method="post">

    <div class="input-area">
        <label for="email-registration-nounou">Votre Email</label>
        <input type="email" name="email-registration-nounou" id="email-registration-nounou">
    </div>
    <span class="span-error error-email-registration-nounou"><?php if(!empty($errors['email']) && $errors['email'] != ''){ echo $errors['email']; } ?></span>

    <div class="input-area">
        <label for="lastname-registration-nounou">Nom</label>
        <input type="text" name="lastname-registration-nounou" id="lastname-registration-nounou">
    </div>
    <span class="span-error error-lastname-registration-nounou"><?php if(!empty($errors['lastname']) && $errors['lastname'] != ''){ echo $errors['lastname']; } ?></span>

    <div class="input-area">
        <label for="firstname-registration-nounou">Prénom</label>
        <input type="text" name="firstname-registration-nounou" id="firstname-registration-nounou">
    </div>
    <span class="span-error error-firstname-registration-nounou"><?php if(!empty($errors['firstname']) && $errors['firstname'] != ''){ echo $errors['firstname']; } ?></span>

    <div class="input-area">
        <p>Genre</p>
        <input type="radio" id="homme" name="genre-registration-nounou" value="homme">
        <label for="homme">Homme</label><br>

        <input type="radio" id="femme" name="genre-registration-nounou" value="femme">
        <label for="femme">Femme</label><br>

        <input type="radio" id="autre" name="genre-registration-nounou" value="autre">
        <label for="autre">Autre</label>
    </div>
    <span class="span-error error-genre-registration-nounou"><?php if(!empty($errors['genre']) && $errors['genre'] != ''){ echo $errors['genre']; } ?></span>
    
    <div class="input-area">
        <label for="password-registration-nounou">Votre mot de passe</label>
        <input type="password" name="password-registration-nounou" id="password-registration-nounou">
    </div>
    <span class="span-error error-password-registration-nounou"><?php if(!empty($errors['password']) && $errors['password'] != ''){ echo $errors['password']; } ?></span>

    <div class="input-area">
        <label for="passwordConfirm-registration-nounou">Confirmer mot de passe</label>
        <input type="password" name="passwordConfirm-registration-nounou" id="passwordConfirm-registration-nounou">
    </div>
    <span class="span-error error-passwordConfirm-registration-nounou"></span>

    <div class="input-area">
        <input type="submit" value="S'inscrire">
    </div>

    </form>
</div>
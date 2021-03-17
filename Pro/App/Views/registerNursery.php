<?php $title = "Kid'Oma Pro | Inscription" ?>

<h2>Inscription</h2>

<div id="formRegisterNursery">
    <form action="" method="post">

    <div class="input-area">
        <label for="email-registration-nursery">Votre Email</label>
        <input type="email" name="email-registration-nursery" id="email-registration-nursery">
        <span class="error-email-registration-nursery"><?php if(!empty($errors['email']) && $errors['email'] != ''){ echo $errors['email']; } ?></span>
    </div>

    <div class="input-area">
        <label for="name-registration-nursery">Nom de l'etablissement</label>
        <input type="text" name="name-registration-nursery" id="name-registration-nursery">
        <span class="error-name-registration-nursery"><?php if(!empty($errors['name']) && $errors['name'] != ''){ echo $errors['name']; } ?></span>
    </div>

    <div class="input-area">
        <label for="password-registration-nursery">Votre mot de passe</label>
        <input type="password" name="password-registration-nursery" id="password-registration-nursery">
        <span class="error-password-registration-nursery"><?php if(!empty($errors['password']) && $errors['password'] != ''){ echo $errors['password']; } ?></span>
    </div>

    <div class="input-area">
        <label for="passwordConfirm-registration-nursery">Confirmer mot de passe</label>
        <input type="password" name="passwordConfirm-registration-nursery" id="passwordConfirm-registration-nursery">
        <span class="error-passwordConfirm-registration-nursery"></span>
    </div>

    <div class="input-area">
        <input type="submit" value="S'inscrire">
    </div>

    </form>
</div>
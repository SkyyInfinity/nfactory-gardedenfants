<?php

$title = 'Contact'; ?>
<div class="wrap">
    <h1 class="section-title">Contact</h1>
    <div class="contactForm">
        <form id="contactForm" action="contactSubmit" method="POST">
            <!-- ADRESSE EMAIL -->
            <div class="champ">
                <label for="email">Votre email</label>
                <input type="email" name="email" value="<?php if (!empty($_SESSION['user']->email)) {echo $_SESSION['user']->email;} ?>">
                <?php if(!empty($errors)): ?>
                    <span class="error"><?= $errors['email'] ?></span>
                <?php endif;?>
            </div>
            <div class="champ">
                <label for="title">Titre</label>
                <input type="text" name="title">
                <?php if (!empty($errors)) : ?>
                    <span class="error"><?= $errors['title'] ?></span>
                <?php endif; ?>
            </div>
            <div class="champ">
                <label for="message">Votre Message</label>
                <textarea name="textMessage" id="textMessage" cols="30" rows="10"></textarea>
                <?php if (!empty($errors)) : ?>
                    <span class="error"><?= $errors['textMessage'] ?></span>
                <?php endif; ?>
            </div>
            <!-- SUBMIT -->
            <div class="champ">
                <input class="btn-submit btn-orange" type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</div>
<?php

$title = 'Contact'; ?>
<div class="wrap">
    <h1 class="section-title">Contact</h1>
    <div class="modifyInfos">
        <form id="contactForm" action="contactSubmit" method="POST">
            <!-- ADRESSE EMAIL -->
            <div class="champ">
                <label for="email">Votre email</label>
                <input type="email" name="email" value="<?php if (!empty($_SESSION['user']->email)) {
                                                            echo $_SESSION['user']->email;
                                                        } ?>">
            </div>
            <div class="champ">
                <label for="title">Titre</label>
                <input type="text" name="title">
            </div>
            <div class="champ">
                <label for="message">Votre Message</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            <!-- SUBMIT -->
            <div class="champ">
                <input class="btn-submit btn-orange" type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</div>
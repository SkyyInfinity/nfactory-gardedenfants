<?php
if(empty($_SESSION['user'])) {
    redirect('home');
}

$title = 'Compte'; ?>

<p>Votre profil est complété à 0%</p>

<div class="div_form_add_child">
    <h3>Ajouter votre enfants</h3>
    <form action="account" id="form_add_child">
        <div class="champ">
            <label for="name">Prenom : </label>
            <input type="text" name="name">
        </div>

        <div class="champ">
            <label for="age">Age : </label>
            <input type="text" name="age">
        </div>
        <!-- TODO Ajouter des champs specifiques pour les maladies/allergies avec selecteur -->
        <div class="champ">
            <select name="disease" id="disease">
                <option value="">Choisissez une option</option>
                <option value="varicelle">Varicelle</option>
            </select>
            <input type="submit" name="">
            <p id="selected_disease_list">Maladies : </p>
        </div>

        <div class="champ">
            <select name="allergy" id="allergy_list" >
                <option value="">Choisissez une option</option>
                <option value="arachides">Arachides</option>
                <option value="chats">Chats</option>
                <option value="pollens">Pollens</option>
                <option value="acariens">Acariens</option>
            </select>
            <a href="#" id="form_add_allergy">Ajouter allergie</a>

            <p id="selected_allergy_list">Allergies : </p>
            <!-- <a href="#" class="span_allergy_' + allergy + '" id="remove_allergy">' + allergy + '</a> -->
        </div>

        <input type="submit">

    </form>
</div>
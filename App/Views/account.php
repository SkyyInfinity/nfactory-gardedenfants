<?php
if(!isLogged()) {
    redirect('home');
}

$title = 'Mon compte'; ?>

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
            <form action="account" id="form_add_disease">
            <select name="disease" id="disease">
                <option value="">Choisissez une option</option>
                <option value="varicelle">Varicelle</option>
            </select>
            <input type="submit" name="">
            </form>
            <p id="selected_disease_list">Maladies : </p>
        </div>

        <div class="champ">
            <select name="allergy" id="allergy_list" >
                <option value="">Choisissez une option</option>
                <option value="arachide">Arachide</option>
                <option value="chat">Chat</option>
            </select>
            <a href="" id="form_add_allergy">Ajouter allergie</a>
            </form>
            <p id="selected_allergy_list">Allergies : </p>
        </div>

        <input type="submit">

    </form>
</div>
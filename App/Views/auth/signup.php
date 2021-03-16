<?php
$title = 'Inscription';
?> 
<h1>Inscription</h1>

<form action="signup" method="post" id="registration_form">
    <label>Votre prenom: <input type="text" name="name" id="name"></label>
    <label>Votre nom: <input type="text" name="surname" id="surname"></label>
    <label>Votre email: <input type="email" name="email" id="email"></label>
    <label>Votre mot de passe: <input type="password" name="password" id="password"></label>
    <!-- <label>Confirmation: <input type="password" name="password2" id="password2"></label> -->
    <button>S'inscrire</button>
</form>
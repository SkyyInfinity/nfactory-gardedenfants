<?php
$title = 'Connexion';
?> 
<h1>Connexion</h1>

<form action="login" method="post" class="form">
    <label for="">Votre email<input type="email" name="email" id=""></label>
    <label for="">Votre password<input type="password" name="password" id=""></label>
    <button>Connexion</button>
    <?php if(isset($error)): ?>
        <p> <?= $error ?></p>
    <?php endif; ?>
</form>
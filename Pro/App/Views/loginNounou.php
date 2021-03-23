<?php $title = "Kid'Oma Pro | Connexion" ?>

<section id="loginSectionNounou">

    <div class="login">
        <h2>Connexion Nourisse</h2>

        <div id="formLoginNounou">
            <form action="" method="POST" >

                <div class="input-area">
                    <label for="email-login-nounou">Votre Email : </label>
                    <input type="email" name="email-login-nounou" id="email-login-nounou">
                </div>

                <div class="input-area">
                    <label for="password-login-nounou">Votre mot de passe : </label>
                    <input type="password" name="password-login-nounou" id="password-login-nounou">
                </div>
                <span class="span-error error-email-login-nounou">&nbsp;<?php if(!empty($errors['login']) && $errors['login'] != ''){ echo $errors['login']; } ?></span>

                <div class="input-area">
                    <input type="submit" value="Se connecter">
                </div>
            </form>
        </div> 
    </div>
        
    <div class="svg">
        <img src="./Public/assets/img/svg/login.svg" alt="">
    </div>

</section>
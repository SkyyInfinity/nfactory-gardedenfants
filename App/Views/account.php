<?php
if (!isLogged()) {
    redirect('home');
}
$title = 'Mon compte';
?>

<section id="account">
    <div class="wrap">
        <h1 class="section-title">Mon compte</h1>
        <div class="complete">
            <p>Votre profil est complété à 0%
                <span>Pour compléter votre profil, veuillez remplir les informations ci-dessous</span>
            </p>
        </div>

        <div class="flex">
            <!-- ADDCHILD -->
            <div class="addChild">
                <h2 class="second-title">Ajouter votre(vos) enfant(s)</h2>
                <form id="addChild" action="account">
                    <!-- PRENOM -->
                    <div class="champ">
                        <label for="childname">Son prénom</label>
                        <input id="childname" type="text" name="childname" value="<?php if (!empty($_POST['name'])) {
                                                                                        echo $_POST['name'];
                                                                                    } ?>">
                        <?php if (!empty($errorsChild['name'])) : ?>
                            <span class="error"><?= $errorsChild['name'] ?></span>
                        <?php endif ?>
                    </div>
                    <!-- AGE -->
                    <div class="champ">
                        <label for="age">Son âge</label>
                        <span class="ageLabel"><input id="age" type="number" name="age" value="<?php if (!empty($_POST['age'])) {
                                                                                                    echo $_POST['age'];
                                                                                                } ?>" min="0" max="12"></span>
                        <?php if (!empty($errorsChild['age'])) : ?>
                            <span class="error"><?= $errorsChild['age'] ?></span>
                        <?php endif ?>
                    </div>
                    <!-- MALADIES -->
                    <div class="champ">
                        <label for="disease">Ses maladies</label>
                        <select name="disease" id="disease">
                            <option value="varicelle">Varicelle</option>
                            <option value="conjonctivite">Conjonctivite</option>
                        </select>
                    </div>
                    <!-- ALLERGIES -->
                    <div class="champ">
                        <label for="allergy_list">Ses allergies</label>
                        <select name="allergy" id="allergy_list">
                            <option value="arachide">Arachide</option>
                            <option value="chat">Chats</option>
                            <option value="oeuf">Oeufs</option>
                        </select>
                    </div>
                    <!-- SUBMIT -->
                    <div class="champ">
                        <input class="btn-submit btn-orange" type="submit" value="Ajouter" name="submittedChild">
                        <span class="beCareful">(Attention, la page va s'actualiser !)</span>
                    </div>
                </form>
            </div>
            <!-- MODIFY INFORMATIONS -->
            <div class="modifyInfos">
                <h2 class="second-title">Modifier vos informations</h2>
                <form id="modifyInfos" action="accountUpdate" method="POST">
                    <!-- NOM -->
                    <div class="champ">
                        <label for="surname">Votre nom</label>
                        <input id="surname" type="text" name="surname" value="<?php if (!empty($_SESSION['user']->surname)) {
                                                                                    echo $_SESSION['user']->surname;
                                                                                } ?>">
                    </div>
                    <!-- PRENOM -->
                    <div class="champ">
                        <label for="name">Votre prénom</label>
                        <input id="name" type="text" name="name" value="<?php if (!empty($_SESSION['user']->name)) {
                                                                            echo $_SESSION['user']->name;
                                                                        } ?>">
                    </div>
                    <!-- ADRESSE EMAIL -->
                    <div class="champ">
                        <label for="email">Votre email</label>
                        <input type="email" name="email" value="<?php if (!empty($_SESSION['user']->email)) {
                                                                    echo $_SESSION['user']->email;
                                                                } ?>">
                    </div>
                    <!-- MOT DE PASSE -->
                    <div class="champ">
                        <label for="password">Votre mot de passe</label>
                        <span>Pour modifier votre mot de passe, veuillez cliquer <a id="js_confirm" href="forgotPassword">ici</a></span>
                    </div>
                    <!-- SUBMIT -->
                    <div class="champ">
                        <input class="btn-submit btn-orange" type="submit" value="Enregistrer">
                        <span class="beCareful">(Attention, la page va s'actualiser !)</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // REDIRECTION VERS forgotPassword
    // AVEC UNE ALERTE
    var btnConfirm = document.getElementById('js_confirm');
    btnConfirm.addEventListener('click', function(e) {
        e.preventDefault()
        var alertConfirm = confirm(
            'Attention, toutes les modifications non sauvegardées seront perdu !' +
            '(Vous allez être déconnecter de votre session)');
        if (alertConfirm == true) {
            document.location.href = 'forgotPassword';
        };
    });
</script>
<?php $title = 'Dashboard' ?>

<div id="NounouDashboard">

    <div class="navBar">
        <div id="menuItem-1" class="menuItem active">Dashboard</div>
        <div id="menuItem-2" class="menuItem">Votre profil</div>
        <div id="menuItem-3" class="menuItem">Vos compétences</div>
        <div id="menuItem-4" class="menuItem">Votre planning</div>
        <div id="menuItem-5" class="menuItem">Certification</div>
        <div id="menuItem-6" class="menuItem">Paiment</div>
        <div id="menuItem-7" class="menuItem">Localisation</div>
        <div id="menuItem-8" class="menuItem">Enfants</div>
    </div>

    <div class="content">

    <!-- Espace récap / Dashboard -->
        <div class="contentItem contentItem-1" id="contentItem-1">
            <div class="box box-1">
                <h2 class="titleBox">Récapitulatif</h2>
            </div>
            <div class="box box-2">
                <h2 class="titleBox">Problème</h2>
            </div>
            <div class="box box-3">
                <h2 class="titleBox">Messagerie</h2>
            </div>
            <div class="box box-4">
                <h2 class="titleBox">Finance</h2>
            </div>
        </div>

    <!-- Espace Mon profil-->
        <div class="contentItem hidden" id="contentItem-2">
            <h2>Votre profil</h2>

            <form id="FormChangeData" action="./Public/ajax/ajax-changeData.php" method="POST">
                <div class="input-area-infoUser">
                    <label for="name-infoUser">nom</label>
                    <i class="fas fa-arrow-right" style="color: #227093"></i>
                    <input type="text" name="name-infoUser" id="name-infoUser" <?php if(!empty($user->last_name) && $user->last_name != '') { echo 'value="' . ucfirst($user->last_name) . '"'; }else { echo 'placeholder="Doe"';} ?>>
                </div>

                <div class="input-area-infoUser">
                    <label for="firstname-infoUser">prenom</label>
                    <i class="fas fa-arrow-right" style="color: #227093"></i>
                    <input type="text" name="firstname-infoUser" id="firstname-infoUser" <?php if(!empty($user->first_name) && $user->first_name != '') { echo 'value="' . ucfirst($user->first_name) . '"'; }else { echo 'placeholder="John"';} ?>>
                </div>

                <div class="input-area-infoUser">
                    <label for="email-infoUser">email</label>
                    <i class="fas fa-arrow-right" style="color: #227093"></i>
                    <input type="email" name="email-infoUser" id="email-infoUser" <?php if(!empty($user->email) && $user->email != '') { echo 'value="' . ucfirst($user->email) . '"'; }else { echo 'placeholder="Votre email"';} ?>>
                </div>

                <div class="input-area-infoUser">
                    <label for="adresse-infoUser">adresse</label>
                    <i class="fas fa-arrow-right" style="color: #227093"></i>
                    <input type="text" name="adresse-infoUser" id="adresse-infoUser" <?php if(!empty($user->adresse) && $user->adresse != '') { echo 'value="' . ucfirst($user->adresse) . '"'; }else { echo 'placeholder="Votre adresse"';} ?>>
                </div>

                <div class="input-area-infoUser">
                    <label for="password-infoUser">Nouveau mot de passe</label>
                    <i class="fas fa-arrow-right" style="color: #227093"></i>
                    <input type="password" name="password-infoUser" id="password-infoUser">
                </div>

                <div class="input-area-infoUser">
                    <label for="confirmPassword-infoUser">Confirmer nouveau mot de passe</label>
                    <i class="fas fa-arrow-right" style="color: #227093"></i>
                    <input type="password" name="confirmPassword-infoUser" id="confirmPassword-infoUser">
                </div>

                <div class="submitButtonInfoUser">
                    <input class="btn-submit-userInfo loginbutton" type="submit" name="submittedInfoUser" value="Sauvegarder">
                </div>
            </form>
        </div>

    <!-- Espace Vos compétence-->
        <div class="contentItem hidden" id="contentItem-3">
            <h2>Vos compétences</h2>
            <?php if(!empty($competences)) : ?>
            <div id="allSkills">
                <?php foreach($competences as $skill) : ?>
                    <div class="skill">
                        <p><span class="title"><?= $skill->title ?></span> - <span class="description"><?= $skill->description ?></span></p>
                    </div>
                <?php endforeach ?>
            </div>
            <?php endif ?>

            <h2>Ajouter une compétence :</h2>

            <div class="form-control">
                <form action="./Public/ajax/ajax-addSkill.php" method="POST" id="AddSkillNounou" novalidate>
                
                    <div class="input-area">
                        <label for="title">Titre :</label>
                        <input type="text" name="title-addSkill-nounou">
                    </div>

                    <div class="input-area">
                        <label for="description-addSkill-nounou">Description :</label>
                        <textarea name="description-addSkill-nounou"></textarea>
                    </div>

                    <div class="input-area">
                        <input type="submit" value="Ajouter" id="btn-submit-addSkill">
                    </div>

                </form>
            </div>
        </div>

    <!-- Espace Planning-->
        <div class="contentItem hidden" id="contentItem-4">
            <h2>Votre Planning</h2>
            <div class="holdFormAddDateNounou">
                <form action="./Public/ajax/ajax-addCrenaux.php" method="POST" id="AddDateNounou" novalidate>

                    <div class="input-area">
                        <label for="start">Heure de début</label>
                        <input type="datetime-local" name="start" id="startDate">
                    </div>

                    <div class="input-area">
                        <label for="start">Heure de fin</label>
                        <input type="datetime-local" name="end" id="endDate">
                    </div>

                    <div class="input-area">
                        <label for="start">Places disponibles</label>
                        <input type="number" name="place" id="placeDate">
                    </div>

                    <div class="input-area">
                        <input type="submit" name="submit" id="btn-submit-addDate" value="Ajouter disponibilité">
                    </div>
                </form>
            </div>
            <button id="showPlanning">Afficher mon planning</button>
            <section id="HoldCalendar">
                <div id="Calendar"></div>
            </section>
        </div>

    <!-- Espace Certification-->


        <div class="contentItem hidden" id="contentItem-5">
            <h2>Vos fichiers</h2>
            <div>   
                <h2>Status : </h2>
                <p>Envoyer une pièces justificatives : </p>
                <form action="" method="POST" enctype="multipart/form-data" id="PV_form_file">
                    <input type="file" name="PV_file">
                    <button type="submit" name="PV_send_file">Upload File</button>
                </form>
            </div>


        </div>

        <!-- Espace paiment-->


        <div class="contentItem hidden" id="contentItem-6">
            <h2>Vos paiment reçu</h2>
            <div>   
            </div>


        </div>

        <div class="contentItem hidden" id="contentItem-7">
            <h2>Votre crèche</h2>

            <form action="" method="post">
                <div>
                    <label for="">Adresse</label>
                    <input type="text" id="geoadresse">
                </div>

                <div id="geolist">
                    <tr>
                        <th>Adresse</th>
                    </tr>
                    <tr>

                    </tr>
                </div>

                <div>
                    <input type="submit" id="geosubmit">
                </div>

            
            </form>

        </div>

        <!-- Espace paiment-->


        <div class="contentItem hidden" id="contentItem-8">
            <h2>Vos paiment reçu</h2>
            <div>   
            </div>


        </div>
    </div>
</div>

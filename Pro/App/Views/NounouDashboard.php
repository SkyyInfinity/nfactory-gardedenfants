<?php $title = 'Dashboard' ?>

<div id="NounouDashboard">

    <div class="navBar">
        <div id="menuItem-1" class="menuItem active">Dashboard</div>
        <div id="menuItem-2" class="menuItem">Votre profil</div>
        <div id="menuItem-3" class="menuItem">Vos compétences</div>
        <div id="menuItem-4" class="menuItem">Votre planning</div>
        <div id="menuItem-5" class="menuItem">Certification</div>
        <div id="menuItem-6" class="menuItem">Paiment</div>
        <div id="menuItem-7" class="menuItem">Clients</div>
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
            <section id="HoldCalendar">
                <div id="Calendar"></div>
            </section>
        </div>

    <!-- Espace Certification-->
        <div class="contentItem hidden" id="contentItem-5">
            <h2>Votre Planning</h2>
        </div>

        <div class="contentItem hidden" id="contentItem-5">
            <h2>Votre Planning</h2>

            <h1>enorme</h1>
            <div>
                <p>Sastus :</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="submit" name="VerifProFile">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

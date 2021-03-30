<?php
if(!isLogged()) {
    redirect('user');
}
$title = 'Reserver pour ' . $child->name; ?>

<section id="reserve">
    <div class="wrap">
        <h1 class="section-title">Reserver pour <?= $child->name ?></h1>
        <form action="" method="post">
            <div class="champ">
                <label for="startDate">Heure d'arrivé</label>
                <input type="date" name="startDate" id="startDate">
                <?php if(!empty($errors['startDate'])) : ?>
                    <span class="error"><?= $errors['startDate'] ?></span>
                <?php endif ?>
            </div>
            <div class="champ">
                <label for="endDate">Heure de départ</label>
                <input type="date" name="endDate" id="endDate">
                <?php if(!empty($errors['endDate'])) : ?>
                    <span class="error"><?= $errors['endDate'] ?></span>
                <?php endif ?>
            </div>
            <div class="champ">
                <label for="recoverName">Nom de la personne qui viendra chercher <?= $child->name ?></label>
                <input type="text" name="recoverName" id="recoverName">
                <?php if(!empty($errors['recoverName'])) : ?>
                    <span class="error"><?= $errors['recoverName'] ?></span>
                <?php endif ?>
            </div>
            <div class="champ">
                <input class="btn-submit btn-orange" type="submit" value="Réserver">
            </div>
        </form>
    </div>
</section>
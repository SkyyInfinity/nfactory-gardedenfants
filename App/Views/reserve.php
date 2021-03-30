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
            </div>
            <div class="champ">
                <label for="endDate">Heure de départ</label>
                <input type="date" name="endDate" id="endDate">
                <span class="error">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur aliquam architecto perferendis ipsa quo assumenda esse in, error modi voluptatum at ullam temporibus quisquam rerum enim a animi maiores tempore!</span>
            </div>
            <div class="champ">
                <label for="recoverName">Nom de la personne qui viendra chercher <?= $child->name ?></label>
                <input type="text" name="recoverName" id="recoverName">
            </div>
            <div class="champ">
                <input class="btn-submit btn-orange" type="submit" value="Réserver">
            </div>
        </form>
    </div>
</section>
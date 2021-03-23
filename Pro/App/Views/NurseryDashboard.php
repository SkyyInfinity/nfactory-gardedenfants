<?php $title = 'Dashboard'; ?>

<div id="NurseryDashboard">

    <div class="navBar">
        <div id="menuItem-1" class="menuItem active">Dashboard</div>
        <div id="menuItem-2" class="menuItem">Crèche</div>
        <div id="menuItem-3" class="menuItem">Votre planning</div>
        <div id="menuItem-4" class="menuItem">Certification</div>
        <div id="menuItem-5" class="menuItem">Paiment</div>
        <div id="menuItem-6" class="menuItem">Clients</div>
        <div id="menuItem-7" class="menuItem">Enfants</div>
    </div>

    <div class="content">
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

        <div class="contentItem hidden" id="contentItem-2">
            <h2>Votre crèche</h2>

            <form action="" method="post">
                <div>
                    <label for="">Adresse</label>
                    <input type="text" id="geoadresse">
                    <select>
                    
                    </select>
                </div>

                <div>
                    <input type="submit" id="geosubmit">
                </div>

            
            </form>

        </div>

        <div class="contentItem hidden" id="contentItem-3">
            <h2>Votre planning</h2>
        </div>

        <div class="contentItem hidden" id="contentItem-4">
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
    </div>

</div>


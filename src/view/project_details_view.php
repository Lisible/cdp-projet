<div class="container">
    <a href="#">Backlogs</a>
    <a href="#">Sprints</a>
    <a href="#">Ajouter un membre</a>
    <a href="#">Membres</a>

    <?php
    $nom = '';
    $description = '';
    $duree_sprint;
    $date;
    $html = '';
    if ($DATA['project'] != null) {
        $nom = $DATA['project']->getName();
        $description = $DATA['project']->getDescription();
        $duree_sprint = $DATA['project']->getSprintDuration();
        $date = date_create($DATA['project']->getBeginDate());
        $date = date_format($date, "d/m/Y");
        $html = '<div class="row">
            <div class="col-md-12 col-xs-12">
                <h3>Nom du projet : '. $nom .'</h3>
                <h3>Description du projet :
                    <span>'. $description.'</span>
                </h3>
                <h3>Durée des sprints : '. $duree_sprint .'</h3>
                <h3>Date de début du projet : '. $date .' </h3>
            </div>
        </div>';
    }
    echo $html;
    ?>

    <button class="btn btn-primary" type="button" onclick="window.location.href='../project_list.php'">Retour</button>
</div>

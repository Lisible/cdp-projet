<div class="container">
    <?php
    $nom = '';
    $description = '';
    $duree_sprint;
    $date;
    $html = '';
    $project = $DATA['project'];

    if ($project != null) {
        $id = $project->getId();
        $nom = $project->getName();
        $description = $project->getDescription();
        $duree_sprint = $project->getSprintDuration();
        $date = date_create($project->getBeginDate());
        $date = date_format($date, "d/m/Y");
        $html = '
        <a href="list_backlog.php?project_id= '. $id .'" class="btn btn-info" id="backlog-button">Backlogs</a>
        <a href="../list_sprints_of_project.php?project_id='. $id .'" class="btn btn-info" id="sprint-button">Sprints</a>
        <a href="../add_user_to_project.php?project_id='. $id .'" class="btn btn-info" id="membre-button">Ajouter un membre</a>
        <a href="../list_members_of_project.php?project_id='. $id .'" class="btn btn-info" id="list-membre-button">Membres</a>
        <div class="row">
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

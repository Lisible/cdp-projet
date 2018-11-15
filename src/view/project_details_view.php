<div class="container">
    <a href="#">Backlogs</a>
    <a href="#">Sprints</a>
    <a href="#">Ajouter un membre</a>
    <a href="#">Membres</a>

    <?php
    if ($DATA['project'] != null):?>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h3>Nom du projet : <?php echo $DATA['project']->getName() ?></h3>
                <h3>Description du projet :
                    <span><?php echo $DATA['project']->getDescription() ?></span>
                </h3>
                <h3>Durée des sprints : <?php echo $DATA['project']->getSprintDuration() ?></h3>
                <h3>Date de début du projet : <?php echo $DATA['project']->getBeginDate() ?></h3>
            </div>
        </div>
    <?php endif; ?>
</div>

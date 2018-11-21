<?php
$sprints = $DATA['sprints'];
$project_id = $DATA['project_id'];

if($sprints != null): ?>
    <ul class="list-group" id="sprint-list">
        <?php foreach($sprints as $sprint): ?>
            <li class="list-group-item">
                <?php echo "Sprint $sprint"; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<? else: ?>
    <span id="no-sprint">Aucun sprint</span>
<?php endif; ?>

<a href="../project_details.php?project_id=<?php echo $project_id?>" class="btn btn-primary">Retour</a>

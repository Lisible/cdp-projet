<div id="hidden_form_container" style="display:none;"></div>
<button class="btn btn-primary" type="button" id="add-sprint">Ajouter un sprint</button>

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

<script defer>
    document.getElementById('add-sprint').addEventListener("click", function () {
        let theForm, newInput1;
        theForm = document.createElement('form');
        theForm.action = 'list_sprints_of_project.php';
        theForm.method = 'post';

        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'project_id';
        newInput1.value = <?php echo $project_id ?>;

        theForm.appendChild(newInput1);
        document.getElementById('hidden_form_container').appendChild(theForm);

        theForm.submit();
    });
</script>
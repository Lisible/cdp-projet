<div class="container">
    <form data-toggle="data-validator" class="form-horizontal" role="form" method="POST" action="../add_task.php?project_id=<?php echo $DATA['project_id']; ?>&sprint_id=<?php echo $DATA['sprint_id']; ?>">
        <div class="form-group row">
            <label for="task-title" class="col-2 col-form-label">Intitulé
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="text" name="task-title" id="task-title"
                       placeholder="L'intitulé de la tâche" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="task-description" class="col-2 col-form-label">Description</label>
            <div class="col-10">
                <textarea class="form-control" name="task-description" rows="5" id="content"
                          placeholder="Ajoutez une description pour votre projet..."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="task-workload" class="col-2 col-form-label">Charge de travail
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="number" name="task-workload" id="task-workload" min="1" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="task-issue" class="col-2 col-form-label">Issue associée
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="text" name="task-issue" id="task-issue"
                       placeholder="L'issue associée" required>
            </div>
        </div>
        <input type="hidden" name="project_id" value="<?php echo $DATA['project_id']; ?>">
        <input type="hidden" name="sprint_id" value="<?php echo $DATA['sprint_id']; ?>">
        <button type="submit" class="btn btn-success">Valider</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href = '../tasks_sprint.php?project_id=<?php echo $DATA['project_id']; ?>&sprint_id=<?php echo $DATA['sprint_id']; ?>'">
        Annuler</button>
    </form>
</div>
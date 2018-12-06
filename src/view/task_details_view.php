<div class="container">
<?php
  $task = '';
  if (isset($DATA['task'])){
    $task = $DATA['task'];
  }
?>
<div class="form-group row">
  <label style="font-weight: bold;" class="col-2 col-from-label">Intitulé</label>
  <div class="form-group row">
    <?php echo $task->getTitle(); ?>
  </div>
</div>
<div class="form-group row">
  <label style="font-weight: bold;" class="col-2 col-from-label">Description</label>
  <div class="col-10">
    <?php  echo $task->getDescription(); ?>
  </div>
</div>
<div class="form-group row">
  <label style="font-weight: bold;" class="col-2 col-form-label">Charge de travail</label>
  <div class="col-10">
    <?php echo $task->getWorkload();  ?>
  </div>
</div>
<div class="form-group row">
  <label style="font-weight: bold;" class="col-2 col-form-label">Issue(s) associée(s)</label>
  <div class="col-10">
    <?php echo $task->getIssue(); ?>
  </div>
</div>
<div class="form-group row">
  <label style="font-weight: bold;" class="col-2 col-form-label">Etat</label>
  <div class="col-10">
    <?php echo $task->getState(); ?>
  </div>
</div>
<div class="form-group row">
  <label style="font-weight: bold;" class="col-2 col-form-label">Implémentée par</label>
  <div class="col-10">
    <?php echo $task->getImplementor(); ?>
  </div>
</div>
<button class="btn btn-primary" type="button" onclick="window.location.href='../tasks_sprint.php?project_id= <?php echo $task->getProjectId() ?>&sprint_id= <?php echo $task->getSprintId()  ?>'">Retour</button>

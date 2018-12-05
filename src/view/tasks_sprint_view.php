<a href="list_sprints_of_project.php?project_id=<?php echo $DATA['project_id']; ?>">Retour</a>
<a href="add_task.php?project_id=<?php echo $DATA['project_id']; ?>&sprint_id=<?php echo $DATA['sprint_id']; ?>">Ajouter une tâche</a>

<div class="container">
	<div class="row">
		<div class="col">
			<h2>To do</h2>
			<ul>
				<?php foreach($DATA['todoTasks'] as $task): ?>
				<li>
					<div class="task">
						<span class="task-title"><?php echo $task->getTitle() ?></span>
						<span class="task-workload">Charge de travail: <?php echo $task->getWorkload() ?>jh</span>
						<span class="task-issue">Issue associée: <?php echo $task->getIssue() ?></span>
					        <button type="button" class="btn btn-danger" id="delete-task-button" onclick="SupprimerTache(<?php echo $task->getId()?>);">Supprimer</button>
                                        </div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="col">
			<h2>On going</h2>
			<ul>
				<?php foreach($DATA['ongoingTasks'] as $task): ?>
				<li>
					<div class="task">
						<span class="task-title"><?php echo $task->getTitle() ?></span>
						<span class="task-workload">Charge de travail: <?php echo $task->getWorkload() ?>jh</span>
						<span class="task-issue">Issue associée: <?php echo $task->getIssue() ?></span>
					        <button type="button" class="btn btn-danger" id="delete-task-button" onclick="SupprimerTache(<?php echo
                                                    $task->getId()?>);">Supprimer</button>
                                        </div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="col">
			<h2>Done</h2>
			<ul>
				<?php foreach($DATA['doneTasks'] as $task): ?>
				<li>
					<div class="task">
						<span class="task-title"><?php echo $task->getTitle() ?></span>
						<span class="task-workload">Charge de travail: <?php echo $task->getWorkload() ?>jh</span>
						<span class="task-issue">Issue associée: <?php echo $task->getIssue() ?></span>
					        <button type="button" class="btn btn-danger" id="delete-task-button" onclick="SupprimerTache(<?php echo
                                                    $task->getId()?>);">Supprimer</button>
                                        </div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<script defer>
      function SupprimerTache(id_task){
            if(confirm("Voulez-vous vraiment supprimer cette tâche? Cette action sera irréversible.")){
                    window.location.href = "delete_task.php?task_id="+id_task+"&project_id="+<?php echo $DATA['project_id'];?>+"&sprint_id="+<?php echo $DATA['sprint_id'];?>;
                          } else {}
                              }
</script>

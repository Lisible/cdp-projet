<?php
$project_id = $DATA['project_id'];
?>

<a href="list_sprints_of_project.php?project_id=<?php echo $project_id; ?>">Retour</a>
<a href="add_task.php?project_id=<?php echo $project_id; ?>&sprint_id=<?php echo $DATA['sprint_id']; ?>">Ajouter une tâche</a>

<div id="hidden_form_container" style="display: none;"></div>

<div class="container">
	<div class="row">
		<div class="col" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
			<h2>To do</h2>
			<ul id="ultodo">
				<?php foreach($DATA['todoTasks'] as $task): ?>
				<li>
					<div class="task" name="<?php echo $task->getState(); ?>"  id="<?php echo $task->getId();?>" draggable="true" ondragstart="drag(event)">
						<span class="task-title"><?php echo $task->getTitle() ?></span>
						<span class="task-workload">Charge de travail: <?php echo $task->getWorkload() ?>jh</span>
						<span class="task-issue">Issue associée: <?php echo $task->getIssue() ?></span>
					         <button type="button", class="btn btn-info" onclick="window.location.href = 'task_details.php?task_id=<?php echo $task->getId()?>'">Détails</button>
                                                <button type="button" class="btn btn-danger" id="delete-task-button" onclick="SupprimerTache(<?php echo $task->getId()?>);">Supprimer</button>

                                        </div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col" id="ongoing" ondrop="drop(event)" ondragover="allowDrop(event)">
			<h2>On going</h2>
			<ul id="ulongoing">
				<?php foreach($DATA['ongoingTasks'] as $task): ?>
				<li>
					<div class="task" name="<?php echo $task->getState(); ?>"  id="<?php echo $task->getId();?>" draggable="true" ondragstart="drag(event)">
						<span class="task-title"><?php echo $task->getTitle() ?></span>
						<span class="task-workload">Charge de travail: <?php echo $task->getWorkload() ?>jh</span>
						<span class="task-issue">Issue associée: <?php echo $task->getIssue() ?></span>
					         <button type="button", class="btn btn-info" onclick="window.location.href = 'task_details.php?task_id=<?php echo $task->getId()?>'">Détails</button>
					        <button type="button" class="btn btn-danger" id="delete-task-button" onclick="SupprimerTache(<?php echo
                                                    $task->getId()?>);">Supprimer</button>
                                        </div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="col" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
			<h2>Done</h2>
			<ul id="uldone">
				<?php foreach($DATA['doneTasks'] as $task): ?>
				<li>
					<div class="task" name="<?php echo $task->getState(); ?>"  id="<?php echo $task->getId();?>" draggable="true" ondragstart="drag(event)">
						<span class="task-title"><?php echo $task->getTitle() ?></span>
						<span class="task-workload">Charge de travail: <?php echo $task->getWorkload() ?>jh</span>
						<span class="task-issue">Issue associée: <?php echo $task->getIssue() ?></span>
					         <button type="button", class="btn btn-info" onclick="window.location.href = 'task_details.php?task_id=<?php echo $task->getId()?>'">Détails</button>
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
                    window.location.href = "delete_task.php?task_id="+id_task+"&project_id="+<?php echo $project_id;?>+"&sprint_id="+<?php echo $DATA['sprint_id'];?>;
                          } else {}
                              }
  function moveTask(new_state, task_id){
    let form, newInput1, newInput2;
    form = document.createElement('form');
    form.action = 'tasks_sprint.php';
    form.method = 'post';

    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'task_id';
    newInput1.value = task_id;

    newInput2 = document.createElement('input');
    newInput2.type = 'hidden';
    newInput2.name = 'new_state';
    newInput2.value = new_state;

    form.appendChild(newInput1);
    form.appendChild(newInput2);
    document.getElementById('hidden_form_container').appendChild(form);
    form.submit();
  }
  
  function allowDrop(elem){
    elem.preventDefault();
  }

  function drag(elem){
    elem.dataTransfer.setData("text", elem.target.id);
  }

  function drop(elem){
    elem.preventDefault();
    var data = elem.dataTransfer.getData("text");
    var state = document.getElementById(data);
    console.log(state.getAttribute("name").localeCompare(elem.target.id));
    var ul = document.getElementById("ul"+elem.target.id);
    if (ul != null ){ 
      var li = document.createElement("li");
      li.appendChild(document.getElementById(data));
      ul.appendChild(li);
      moveTask(elem.target.id, data);
   }
 }
</script>

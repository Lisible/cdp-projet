<a href="add_project.php" id="add_project_link">+</a>

<?php if($DATA['projects'] != null): ?>
<ul id="project-list">
    <?php foreach($DATA['projects'] as $project): ?>
    <li>
    	<span class="project-name">
        <?php
          print($project->getName());
        ?></span>
    	<a href=<?php echo '"list_backlog.php?project_id=';
    								print($project->getId());
    								echo '"'?>
			 >Backlog</a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if($DATA['projects'] == null): ?>
<span id="no-project">Aucun projet</span>
<?php endif; ?>

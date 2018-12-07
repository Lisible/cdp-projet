<?php
$projects = $DATA['projects'];
?>
<a href="add_project.php" id="add_project_link">+</a>

<?php if($projects != null): ?>
<ul class="list-group" id="project-list">
    <?php foreach($projects as $project): ?>
    <li class="list-group-item">
    	<a href="<?php echo 'project_details.php?project_id=' . $project->getId(); ?>"
            id="project-name"><?php echo $project->getName();?></a>
    	<a href="<?php echo 'list_backlog.php?project_id=' . $project->getId(); ?>" class="btn btn-info btn-xs"
           id="project-backlog">
            Backlog</a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if($projects == null): ?>
<span id="no-project">Aucun projet</span>
<?php endif; ?>

<a href="add_user_story.php" id="add_user_story_link">+</a>

<?php print_r($DATA['backlog']);
			print($GET["project_id"]);
	if($DATA['backlog'] != null): ?>
  <ul id="backlog-list">
  <?php foreach($DATA['backlog'] as $us): ?>
     <li>
       User story here
     </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php if($DATA['backlog'] == null): ?>
  <span id="no-us">Aucune User story</span>
<?php endif; ?>

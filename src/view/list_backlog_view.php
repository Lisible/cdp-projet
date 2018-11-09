<a href="add_user_story.php" id="add_user_story_link">+</a>

<?php 
	if($DATA['backlog'] != null): ?>
  <ul id="backlog-list">
  <?php foreach($DATA['backlog'] as $us): ?>
     <li>
       <span><?php echo $us->getId() ?> </span>
       <span><?php echo $us->getDescription() ?> </span>
       <span><?php echo $us->getPriority() ?> </span>
       <span><?php echo $us->getDifficulty() ?> </span>
     </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php if($DATA['backlog'] == null): ?>
  <span id="no-us">Aucune User story</span>
<?php endif; ?>

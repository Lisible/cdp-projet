<a href=" <?php echo'add_user_story.php?project_id='.$DATA['project_id']; ?>" id="add_user_story_link">+</a>

<?php 
	if($DATA['backlog'] != null): ?>
  <ul id="backlog-list">
  <?php foreach($DATA['backlog'] as $us): ?>
     <li>
       <span><?php echo $us->getNumber() ?> </span>
       <span><?php echo $us->getDescription() ?> </span>
       <span><?php echo $us->getPriority() ?> </span>
       <span><?php echo $us->getDifficulty() ?> </span>
       <button onclick="SupprimerUS(<?php echo $us->getID()?>)" id="delete-us-<?php echo $us->getNumber()?>">Supprimer</button>
     </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php if($DATA['backlog'] == null): ?>
  <span id="no-us">Aucune User story</span>
<?php endif; ?>

<script defer>
  function SupprimerUS(id){
    if(confirm("Voulez-vous vraiment supprimer cette US? cette action sera irréversible.")){
      window.location.href = "delete_user_story.php?user_story_id="+id+"&project_id="+<?php echo $DATA['project_id']; ?>;   
    } else {
    }
  }

</script>

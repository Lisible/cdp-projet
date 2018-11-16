<div class="container">
  <form role="form" method="POST" action="../add_user_story.php">
      <label>Numéro* </label>
      <input type="number" name="number" id="number_us" min="1" step="1" placeholder="Numéro de l'US" required>
      <br>
      <label>Difficulté*</label>
      <input type="number" name="difficulty" id="difficulty" min="1" step="1" placeholder="Difficulté de l'US" required>
      <br>
      <label>Priorité*</label>
      <input type="radio" name="priority" id="priority_h" value="high">Haute
      <input type="radio" name="priority" id="priority_m" value="medium" checked>Moyenne
      <input type="radio" name="priority" id="priority_l" value="low">Basse
      <br>
      <label>Description*</label>
                <textarea name="description" rows="5" cols="50" id="description"  
                          placeholder="Description de votre US" required></textarea>
      <br>
      <input type="hidden" id="project_id" name="project_id" value="<?php echo $DATA['project_id']; ?>">
     <button type="submit">Valider</button>
     <button type="button" onclick="window.location.href = '../list_backlog.php'">Annuler</button>
  </form>
</div>

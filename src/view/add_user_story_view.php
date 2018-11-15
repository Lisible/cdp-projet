<div class="container">
  <form role="form" method="POST" action="../add_user_story.php">
      <label>ID* </label>
      <input type="number" name="id" id="id_us" min="1" step="1" placeholder="Identifiant de l'US" required>
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
     <button type="submit">Valider</input>
     <button type="button" onclick="document.location.href = '../list_backlog.php'">Annuler</button>
  </form>
</div>

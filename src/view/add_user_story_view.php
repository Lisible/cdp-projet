<div class="container">
  <form role="form" method="POST" action="../add_user_story.php">
      <label>ID* </label>
      <input type="number" name="id" id="id_us" min="1" step="1" placeholder="Identifiant de l'US" required>
      <br>
      <label>Description*</label>
                <textarea name="description" rows="5" cols="50" id="description"  
                          placeholder="Description de votre US"></textarea>
      <br>
     <button type="submit">Valider</input>
     <button type="button" onclick="document.location.href = '../list_backlog.php'">Annuler</button>
  </form>
</div>

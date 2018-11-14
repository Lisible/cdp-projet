<div class="container">
    <form data-toggle="data-validator" class="form-horizontal" role="form" method="POST" action="../add_project.php">
        <div class="form-group row">
            <label for="name-input" class="col-2 col-form-label">Nom
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="text" name="nom" id="name-input"
                       placeholder="Le nom du projet" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="description-input" class="col-2 col-form-label">Description</label>
            <div class="col-10">
                <textarea class="form-control" name="description" rows="5" id="content"
                          placeholder="Ajoutez une description pour votre projet..."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="dureeSprint-input" class="col-2 col-form-label">Durée des sprints
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="number" name="duree" id="dureeSprint-input"
                       placeholder="2 est par défault" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date-input" class="col-2 col-form-label">Date
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="date" name="date" id="date-input"
                       placeholder="La date du début du projet : Format : jj-mm-AAAA, Exemple : 05-08-2017" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Valider</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href = '../project_list.php'">
        Annuler</button>
    </form>
</div>
<div class="container">
    <form data-toggle="data-validator" class="form-horizontal" role="form" method="POST" action="../add_user_to_project.php">
        <div class="form-group row">
            <label for="username-input" class="col-4 col-form-label">L'identifiant du nouveau membre
                <span>&#10033;</span>
            </label>
            <div class="col-8">
                <input class="form-control" type="text" name="username" id="username-input"
                       placeholder="L'identifiant du nouveau membre" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Valider</button>
    </form>
</div>
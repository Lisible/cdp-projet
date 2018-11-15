<div class="container">
    <form data-toggle="data-validator" class="form-horizontal" role="form" method="POST" action="../registration.php">
        <div class="form-group row">
            <label for="username-input" class="col-3 col-form-label">Identifiant
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="text" name="username" id="username-input"
                       placeholder="Identifiant" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="password-input" class="col-3 col-form-label">Mot de passe
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="password" name="password" id="password-input"
                       placeholder="Mot de passe" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="firstname-input" class="col-3 col-form-label">Prénom
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="text" name="firstname" id="firstname-input"
                       placeholder="Prénom" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="lastname-input" class="col-3 col-form-label">Nom
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="text" name="lastname" id="lastname-input"
                       placeholder="Nom" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email-input" class="col-3 col-form-label">Email
                <span>&#10033;</span>
            </label>
            <div class="col-10">
                <input class="form-control" type="text" name="email" id="email-input"
                       placeholder="Email" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Valider</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href = '../project_list.php'">
        Annuler</button>
    </form>
</div>
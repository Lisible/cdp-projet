Index

<?php if(isset($DATA['errorMessage'])): ?>
<span><?php echo $DATA['errorMessage']; ?></span>
<?php endif; ?>

<form action="index.php" method="POST">
    <div>
        <label for="username">Nom d'utilisateur:</label>
        <input name="username" type="text">
    </div>
    <div>
        <label for="password">Mot de passe:</label>
        <input name="password" type="password">
    </div>

    <input type="submit" value="Connexion">
</form>
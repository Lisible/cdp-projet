Index
<?php
$errorMessage = $DATA['errorMessage'];
?>

<?php if(isset($errorMessage)): ?>
<!--<span><?php echo $errorMessage; ?></span>--!>
<script defer>alert("<?php echo $errorMessage;  ?>");</script>
<?php endif; ?>

<?php if(isset($DATA['message'])): ?>
<span><?php echo $DATA['message']; ?></span>
<?php endif; ?>

<a href="registration.php">Inscription</a>
<form action="index.php" method="POST">
    <div>
        <label for="username">Nom d'utilisateur:</label>
        <input name="username" type="text" required>
    </div>
    <div>
        <label for="password">Mot de passe:</label>
        <input name="password" type="password" required>
    </div>
     <input type="submit" value="Connexion">
</form>

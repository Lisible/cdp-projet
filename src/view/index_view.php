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

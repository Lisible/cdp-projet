<?php if($DATA['membres'] != null): ?>
    <ul class="list-group" id="membres-list">
        <?php foreach($DATA['membres'] as $member): ?>
            <li class="list-group-item">
                <span><?php echo $member->getFirstname() . " " . $member->getLastname()?></span>
                <br>
                <span><?php echo "Mail : " . $member->getEmail() ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if($DATA['membres'] == null): ?>
    <span id="no-project">Aucun membre dans le projet</span>
<?php endif; ?>

<a href="../project_details.php?project_id=<?php echo $DATA['project_id']?>" class="btn btn-primary">Retour</a>

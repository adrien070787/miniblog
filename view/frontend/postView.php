<?php
$title = $post['title'];
ob_start();
?>

    <h1>Mon super blog !</h1>
    <p><a href="../miniblog2/index.php">Retour à la liste des billets</a></p>


    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

<?php

// Récupération des commentaires
while ($datas = $comments->fetch()) {
    ?>
    <p><strong><?= htmlspecialchars($datas['author']) ?></strong> le <?= $datas['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($datas['comment'])) ?></p>
    <hr/>
    <?php
} // Fin de la boucle des commentaires
$comments->closeCursor();

?>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php

$content = ob_get_clean();


require('template.php');


?>
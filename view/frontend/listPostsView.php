<?
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 21/01/2018
 * Time: 15:05
 */
?>

<?php
$title = 'Mon blog - Accueil';
ob_start(); ?>

    <!-- Afichage des données -->

    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>

<?php
while ($datas = $posts->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($datas['title']) ?>
            <em>le <?= $datas['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($datas['content'])) ?>
            <br/>
            <em><a href="?action=post&id=<?= $datas['id'] ?>">Commentaires</a></em>
        </p>
    </div>
    <?php
} // Fin de la boucle des billets
$posts->closeCursor();
paginate();

$content = ob_get_clean();
require('template.php');

?>
<?php

require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');



function listPosts() {
    if (isset($_GET['page'])&& ($_GET['page']>0)) {
        $postManager = new PostManager($_GET['page'], 0);
        $start = ($_GET['page']*3)-3;
        $posts =  $postManager->getPosts($start);
    } else {
        $postManager = new PostManager(0, 0);
        $posts =  $postManager->getPosts(0);
    }
    require('view/frontend/listPostsView.php');
}

function post() {
    $commentManager = new CommentManager();

    if (isset($_GET['id']) && $_GET['id']>0) {
        $postManager = new PostManager(0, $_GET['id']);
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        if (!empty($post)) {
            require('view/frontend/postView.php');
        } else {
            throw new Exception('Erreur : ce post n\'existe pas');
        }
    } else {
        throw new Exception('Erreur : aucun identifiant de billet envoyé');
    }
}

function addComment()
{
    $commentManager = new CommentManager();
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $affectedLines = $commentManager->setComment($_GET['id'], $_POST['author'], $_POST['comment']);

            //if ($affectedLines == '0' or $affectedLines == 0 or $affectedLines == false) {
            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le commentaire !');
            }
            else {
                header('Location: index.php?action=post&id=' . $_GET['id']);
            }
        } else {
            throw new Exception('Erreur : tous les champs ne sont pas remplis !');
        }
    } else {
        throw new Exception('Erreur : aucun identifiant de billet envoyé');
    }

}

function paginate() {
    $objet = new PostManager(0, NULL);
    $nb_posts = $objet->getPostsCount();
    require('view/frontend/modules/pagination.php');
}

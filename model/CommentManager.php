<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 25/01/2018
 * Time: 12:16
 */

class CommentManager extends Manager
{


    public function getComments($id)
    {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id= ? ORDER BY comment_date_fr DESC');
        $req->execute(array($id));
        // On récupère les commentaires de l'id est passé en paramètre
        return $req;
    }


    public function setComment($postId, $author, $comment)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('INSERT INTO comments(post_id, author, comment, comment_date) 
                              VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

}
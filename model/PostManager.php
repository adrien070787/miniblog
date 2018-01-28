<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 25/01/2018
 * Time: 12:16
 */

class PostManager extends Manager
{

    private $_nb_elmt_page = 3;
    private $_start;
    private $_id;

    /**
     * PostManager constructor.
     * @param $_start
     */
    public function __construct($_start, $_id)
    {
        $this->_start = $_start;
        $this->_id = $_id;
    }

    //public static function withID( $id ) {


    public function getPosts()
    {
        $bdd = $this->dbConnect();


        // On récupère les 5 derniers billets
        $req = $bdd->query('SELECT id, title, SUBSTRING(content, 1, 300) as content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT '.$this->_start.', '.$this->_nb_elmt_page);
        return $req;
    }


    public function getPost()
    {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id= ?');
        $req->execute(array($this->_id));
        // On récupère l'article dont l'id est passé en paramètre
        return $req->fetch();
    }

    public function getPostsCount() {
        $bdd = $this->dbConnect();

        $req = $bdd->query('SELECT count(*) as nb_count FROM posts');
        $result = $req->fetch();
        return $result[0];
        //return $result['nb_count'];
    }

}
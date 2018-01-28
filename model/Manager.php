<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 25/01/2018
 * Time: 12:20
 */

class Manager
{

    protected function dbConnect() {

        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'usr_miniblog', 'mdp_miniblog');
            return $bdd;
        } catch (Exception $e) {
            throw new Exception('Impossible d\'établir une connexion à la base de donnée');

        }

    }

}
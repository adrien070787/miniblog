<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 22/01/2018
 * Time: 14:03
 */

require('controller/frontend.php');


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            post();
        } elseif ($_GET['action'] == 'addComment') {
            addComment();
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    $messageError = $e->getMessage();
    require('view/errorView.php');
}

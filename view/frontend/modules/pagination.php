<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 24/01/2018
 * Time: 10:46
 */

$tiret = '-';

echo '<div class="center">';
for ($page= 1; $page< ($nb_posts/3)+1; $page++) {
    if ($page == ceil(($nb_posts/3))) {
        $tiret = '';
    }

    if (isset($_GET['page'])) {
        if ($_GET['page'] == $page) {
            echo '<a href="index.php?page=' . $page . '"><strong>' . $page . '</strong> ' . $tiret . ' </a>';
        } else {
            echo '<a href="index.php?page=' . $page . '">' . $page . ' ' . $tiret . ' </a>';
        }
    } else {
        if (1 == $page) {
            echo '<a href="index.php?page=' . $page . '"><strong>' . $page . '</strong> ' . $tiret . ' </a>';
        } else {
            echo '<a href="index.php?page=' . $page . '">' . $page . ' ' . $tiret . ' </a>';
        }
    }


}
echo '</div>';
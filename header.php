<?php
session_start();
require_once('User.php');


if (isset($_SESSION['id'])) {
    $user = new User($_SESSION['id']);
    $name = $user->getName();
    $surname = $user->getsurname();
       echo "<div class=\"login\"> Привет : " . " &nbsp". $user->getName() . " &nbsp" . $user->getsurname() . "</div>";
}

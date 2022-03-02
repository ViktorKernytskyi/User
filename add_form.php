<?php
session_start();
require('forma.html');
require_once('User.php');


if (!empty($_POST)) {
    if (empty($_POST['email'])) {
        $errors[] = 'поле email пустое';
    }
    if (empty($_POST['password'])) {
        $errors[] = 'поле password пустое';
    } elseif (!is_numeric($_POST['password'])) {
        $errors[] = 'поле password содержит не цифры';
    }
    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo '<strong>' . $err . '</strong><br>';
        }
    }

}

if(isset($_POST['submit'])){

    $user = new User($users, $_POST['email'], $_POST['password']);
    $user->autendificated($_POST['password']);
}
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    echo "<div class=\"login\"> Привет : " . " &nbsp". $users[$id]['name'] . " &nbsp" . $users[$id]['surname'] . "</div>";
}
else {
    require_once ('forma.html');


}
?> 


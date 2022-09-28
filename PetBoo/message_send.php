<?php

session_start();


$con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

if($_GET['id_membre']){
    $rqt_valid_login = mysqli_query($con, "INSERT INTO `chats` (`id_chats`, `id_membre_send`, `id_membre_receive`, `message`, `date_message`) VALUES (NULL, '" . $_SESSION['id_membre'] . "', '" . $_GET['id_membre'] . "', '" . $_GET['message'] . "', '" . date("Y-m-d H:i:s") . "');");

}

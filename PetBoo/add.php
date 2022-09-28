<?php
$con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
// $rqt_valid_login = mysqli_query($con, "UPDATE `annonce` SET `etat`='free' WHERE `id_annonce` = 31");
// $rqt_valid_login = mysqli_query($con, "UPDATE `annonce` SET `etat`='free' WHERE 1");
$rqt_valid_login = mysqli_query($con, "INSERT INTO `annonce` (`id_annonce`, `id_membre`, `id_race`, `titre`, `ville`, `description`, `date_annonce`, `etat`, `genre`, `number_etat`) VALUES (NULL, '" . $_SESSION['id_membre'] . "', '" . $_GET['id_race'] . "', '" . $_GET['titre'] . "', '" . $_GET['ville'] . "', '" . $_GET['description'] . "', '" . time() . "', 'free', '" . $_GET['genre'] . "', '" . $_GET['number_etat'] . "');");

echo("INSERT INTO `annonce` (`id_annonce`, `id_membre`, `id_race`, `titre`, `ville`, `description`, `date_annonce`, `etat`, `genre`, `number_etat`) VALUES (NULL, '" . $_SESSION['id_membre'] . "', '" . $_GET['id_race'] . "', '" . $_GET['titre'] . "', '" . $_GET['ville'] . "', '" . $_GET['description'] . "', '" . time() . "', 'free', '" . $_GET['genre'] . "', '" . $_GET['number_etat'] . "');");
// header("location: PeetBoo_Mes_Annonce.php");
header("location: global0.php?role=&condition=");
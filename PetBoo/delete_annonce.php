<?php
if ($_GET['id']) {
    
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
    $annonce_query = mysqli_query($con, "DELETE FROM `image` WHERE `id_annonce` = " . $_GET['id']);
    $annonce_query = mysqli_query($con, "DELETE FROM `favoris` WHERE `id_annonce` = " . $_GET['id']);

    $annonce_query = mysqli_query($con, "DELETE FROM `annonce` WHERE `id_annonce` = " . $_GET['id']);
    header("location:PeetBoo_Mes_Annonce.php");
}

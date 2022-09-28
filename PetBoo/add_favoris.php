<?php

    session_start();

    if(isset($_GET['id_annonce'])){
        include 'cnx.php';
        $rqt_vrf = mysqli_query($con, "SELECT * FROM `favoris` WHERE `id_membre` = '" . $_SESSION['id_membre'] . "' AND `id_annonce` = " . $_GET['id_annonce'] . ";");
        
        if (mysqli_num_rows($rqt_vrf) == 0){
            $rqt_valid_login = mysqli_query($con, "INSERT INTO `favoris` (`id_favoris`, `id_membre`, `id_annonce`) VALUES (NULL, '" . $_SESSION['id_membre'] . "', " . $_GET['id_annonce'] . ");");
            echo "1";
        }
        else{
            $rqt_vrf = mysqli_query($con, "DELETE FROM `favoris` WHERE `id_membre` = '" . $_SESSION['id_membre'] . "' AND `id_annonce` = " . $_GET['id_annonce'] . ";");
            echo "0";
        }
    }

?>
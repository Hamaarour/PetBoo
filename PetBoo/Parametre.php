<?php

// use LDAP\Result;

session_start();

function update_session()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
    $rqt =  $con->prepare("SELECT * FROM `membre` WHERE `id_membre` = " . $_SESSION['id_membre'] . ";");
    $rqt->execute();

    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        $_SESSION["id_membre"] = $rows["id_membre"];
        $_SESSION["user_name"] = $rows["user_name"];
        $_SESSION["password"] = $rows["password"];
        $_SESSION["telephone"] = $rows["telephone"];
        $_SESSION["ville"] = $rows["ville"];
        $_SESSION["bio"] = $rows["bio"];
        $_SESSION["img"] = $rows["img"];
        $_SESSION["nb_ban"] = $rows["nb_ban"];
    }
}
function remplir_ville()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    $rqt = $con->prepare("SELECT * FROM `ville` ORDER BY `ville`.`ville` ASC");

    $rqt->execute();

    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        echo '<option value="' . $rows['id'] . '">' . $rows['ville'] . '</option>\n';
    }
}

if (isset($_POST['save_mdp'])) {
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
    $rqt_valid_login = mysqli_query($con, "SELECT * FROM `membre` WHERE `id_membre` = '" . $_SESSION['id_membre'] . "' AND `password` = '" . $_POST['pass_acctuel'] . "';");
    if (mysqli_num_rows($rqt_valid_login) >= 1) {
        $rqt_valid_login = mysqli_query($con, "UPDATE `membre` SET `password` = '" . $_POST['new_pass'] . "' WHERE `membre`.`id_membre` = '" . $_SESSION['id_membre'] . "';");
        update_session();
        header("Location: global0.php?condition=&role=");
        echo '<script> alert("Votre mot de pass est correct"); </script>';
    } else {
        echo '<script> alert("Votre mot de pass est bien modifiée"); </script>';
    }
}

function deletePictture(){
    
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
    $rqt =  $con->prepare("SELECT * FROM `membre` WHERE `id_membre` = " . $_SESSION['id_membre'] . ";");
    $rqt->execute();

    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        unlink("images/profile/" . $rows['img']);
    }
}

if (isset($_POST['save_info'])) {

    deletePictture();

    $my_file = $_FILES['file_img'];

    copy($my_file['tmp_name'] , 'images/profile/' . $my_file['name']);
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
    $rqt_valid_login = mysqli_query($con, "UPDATE `membre` SET `user_name` = '" . $_POST['user_name'] . "', `telephone` = '" . $_POST['telephone'] . "', `ville` = '" . $_POST['slc_ville'] . "', `img` = '" . $my_file['name'] . "' WHERE `membre`.`id_membre` = " . $_SESSION['id_membre'] . ";");
    echo '<script> alert("Votre information est bien modifié"); </script>';


    update_session();
    header("Location: global0.php?condition=&role=");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetBoo - Réglages</title>

    <!--
    - logo 
    -->

    <link rel="shortcut icon" href="./assets/images/logo/logo2.svg" type="image/x-icon">

    <!--
    - custom css link
    -->
    <link rel="stylesheet" href="./assets/css/preloader_style.css">
    <link rel="stylesheet" href="./assets/css/PetBoo_button.css">
    <link rel="stylesheet" href="./assets/css/parametre.css">
    <link rel="stylesheet" href="./assets/css/header.css">

    <!--
    - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--
      - Arabic --google font link
    -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================= preloader end ========================= -->
    <!--
    - Overlay
  -->
    <div class="overlay" data-overlay></div>

    <!--
    - MODAL
  -->

    <!--
    - HEADER
  -->


    <?php
    include "header.php";

    echo '<style>
    .desktop-menu-category-list, .div_ggg{
        display: none;
    }

</style>';

    ?>

    <!--
    - MAIN
  -->
    <main>
        <!-- <form> -->

        <div class="page">
            <!-- tabs -->
            <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                <label for="tab1">Modifier vos informations</label>

                <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                <label for="tab2">Modifier le mot de passe</label>
                <ul>
                    <li class="tab-content tab-content-first typography">

                        <form action="Parametre.php" method="POST" enctype="multipart/form-data">
                            <div class="have-tobe-flex">
                                <div class="profile-pic-div">
                                    <img src=<?php if ($_SESSION['img'] == "") 
                                                        echo '"./assets/images/user.png"';
                                                    else 
                                                        echo '"./images/profile/' . $_SESSION['img'] . '"' ?> id="photo" />
                                    <input type="file" id="file" name="file_img" />
                                    <label for="file" id="uploadBtn">Choose Photo</label>
                                </div>
                                <div class="info">

                                    <label for="nomutili"><span class="red">*</span> Nom d'utilisateur </label>
                                    <input type="text" name="user_name" id="nomutili" value=<?php echo "\"" . $_SESSION['user_name'] . "\""; ?> />
                                    <div class="err err3">
                                        <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Le nom d'utilisateur est incorrect !</small>
                                    </div>
                                    <div class="err err4">
                                        <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Ce nom d'utilisateur existe déjà !</small>
                                    </div>

                                    <label for="tele"><span class="red">*</span> Telephone </label>
                                    <input type="tel" name="telephone" id="tele" value=<?php echo "\"" . $_SESSION['telephone'] . "\""; ?>>
                                    <div class="err err2">
                                        <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Le numéro de téléphone est incorrect !</small>
                                    </div>


                                    <label for="mail"><span class="red">*</span> E-mail </label>
                                    <input type="email" id="mail" disabled value=<?php echo "\"" . $_SESSION['email'] . "\""; ?> />
                                    <div><span class="impossi">l'adresse mail ne peut pas être modifiée</span></div>

                                    <label for="ville"><span class="red">* </span> Ville</label>
                                    <div>
                                        <select name="slc_ville" id="slc_ville" class="select">
                                            <option value="">-- sélectionnez votre choix --</option>
                                            <?php remplir_ville(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="button" class="btn cancel-info" onclick="annuler();">Annuler</button>
                                <button type="submit" name="save_info" class="btn save-info">Sauvegarder</button>
                            </div>
                        </form>
                    </li>

                    <li class="tab-content tab-content-2 typography">
                        <div>
                            <form action="Parametre.php" method="POST">
                                <label for="pass-acctuel"><span class="red">*</span> Mot de passe actuel </label>
                                <input type="password" name="pass_acctuel" placeholder="Mot de passe actuel" id="pass-acctuel" onkeyup='javascript:isCharSet()' />
                                <div class="err erreur1">
                                    <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>mot de passe erroné !</small>
                                </div>
                                <div class="err erreur_leng_1">
                                    <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Votre mot de passe est trop court. Il doit contenir au minimum 8 caractères.</small>
                                </div>

                                <label for="new_pass"><span class="red">*</span> Nouveau mot de passe </label>
                                <input type="password" name="new_pass" placeholder="Nouveau mot de passe" id="new_pass" onkeyup='javascript:isCharSet()' />
                                <div class="err erreur2">
                                    <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Veuillez renseigner ce champ</small>
                                </div>
                                <div class="err erreur_leng">
                                    <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Votre mot de passe est trop court. Il doit contenir au minimum 8 caractères.</small>
                                </div>

                                <label for="confirm_pass"><span class="red">*</span> Confirmer le mot de passe</label>
                                <input type="password" placeholder="Confirmer le mot de passe" id="confirm_pass" onkeyup='javascript:isCharSet()' />
                                <div class="err erreur3">
                                    <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Veuillez vérifier votre mot de passe</small>
                                </div>
                                <div class="buttons">
                                    <button type="button" class="btn cancel-mdp" onclick="annuler();">Annuler</button>
                                    <button type="submit" name="save_mdp" class="btn save-mdp">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <!--/ tabs -->
        </div>
        <!-- </form> -->
    </main>




    <!--
     FOOTER
  -->


    <?php include "footer.php"; ?>

    <!--
    - custom js link
  -->

    <script src="./assets/js/heder.js"></script>
    <script src="./assets/js/menuToggle.js"></script>
    <script src="./assets/js/preloader.js"></script>
    <script src="./assets/js/reglage.js"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>


    <!--
      - Font Awesome link
    -->
    <script src="https://kit.fontawesome.com/e9ea40599a.js" crossorigin="anonymous">
    </script>
</body>

<script>
    document.getElementById('slc_ville').value =
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
        $rqt =  $con->prepare("SELECT * FROM `ville` WHERE `id` = " . $_SESSION['ville']);
        $rqt->execute();
        $rqt1 = $rqt->get_result();
        while ($rows = $rqt1->fetch_assoc()) {
            echo ($rows['id']);
        }
        ?>;

    function annuler() {
        window.location = "global0.php?condition=&role=";
    }
</script>

</html>
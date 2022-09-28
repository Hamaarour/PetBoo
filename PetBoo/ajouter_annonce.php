<?php

session_start();

function remplir_categorie()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    $rqt = $con->prepare("SELECT * FROM categorie");

    $rqt->execute();

    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        echo '<option value="' . $rows['id_categorie'] . '">' . $rows['nom_categorie'] . '</option>';
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

function remplire_pictures($condition)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    $rqt = $con->prepare("SELECT * FROM `image` WHERE `id_annonce` = $condition");
    $rqt->execute();
    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        echo '<div class="im">
        <img src="assets/images/products/' . $rows['image'] . '" alt="im">
        <span onclick="delImage(0)">×</span>
    </div>';
    }
}

if (isset($_GET['btn_sub_hh'])) {
    if (isset($_GET['role'])) {
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
        // if ($_GET['role'] == "modifier") {
        if (isset($_GET['role'])) {
        } else {

            // $count = count($_FILES['file']['name']);
            // for($i = 0; $i < $count; $i++){
            //     // $file_name = $_FILES['file']['name'][$i];
            //     // echo '<script> alert("' . $_FILES['file']['name'][$i] . '"); </script>';
            //     // copy($_FILES['file']['tmp_name'][$i] , 'images/profile/' . $_FILES['file']['name'][$i]);
            // }
            include "add.php";
            // echo '<script> alert("Votre annonce est bien ajouter"); </script>';
            // header("location: chat.php");
        }
    }
}

if (isset($_GET['role'])) {
    if ($_GET['role'] == "modifier") {
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

        $rqt = mysqli_query($con, "SELECT * FROM `annonce` WHERE `id_annonce` = " . $_GET['condition'] . " AND `id_membre` = " . $_SESSION['id_membre']);

        if (mysqli_num_rows($rqt) == 0) {
            header("location: deconnection.php");
        } else {
            $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

            $rqt = $con->prepare("SELECT * FROM `annonce` WHERE `id_annonce` = " . $_GET['condition'] . " AND `id_membre` = " . $_SESSION['id_membre']);

            $rqt->execute();

            $rqt1 = $rqt->get_result();
            while ($rows = $rqt1->fetch_assoc()) {
                $id_race = $rows['id_race'];
                $ville = $rows['ville'];
                // choisir_ville($ville);
                $titre = $rows['titre'];
                $description = $rows['description'];
                $genre = $rows['genre'];


                if ($genre == "female") {
                    $rad_female = "checked";
                    $rad_male = "";
                } else {
                    $rad_female = "";
                    $rad_male = "checked";
                }

                $id_race_select = $rows['id_race'];
                $id_ville_select = $rows['ville'];

                $rqt_race = $con->prepare("SELECT * FROM `race` WHERE `id_race` = " . $id_race);

                $rqt_race->execute();

                $rqt_race_result = $rqt_race->get_result();
                while ($rows1 = $rqt1->fetch_assoc()) {
                    $race = $rows1['nom_race'];
                }
            }
        }
    } else {

        $rad_female = "";
        $rad_male = "checked";
        $id_race_select = 1;
        $id_ville_select = $_SESSION['ville'];

        $titre = "";
        $description = "";
        $genre = "";

        // choisir_ville("");

        $rad_female = "";
        $rad_male = "checked";
    }
} else {
    header("location: PeetBoo_Mes_Annonce.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if ($_GET['role'] == "")
        echo '<title>PetBoo - Création d\'annonce</title>';
    else
        echo '<title>PetBoo - Modification d\'annonce</title>';
    ?>


    <!--
    - logo 
  -->
    <link rel="shortcut icon" href="./assets/images/logo/logo2.svg" type="image/x-icon">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/preloader_style.css">
    <link rel="stylesheet" href="./assets/css/ajouter_annonce.css">
    <link rel="stylesheet" href="./assets/css/PetBoo_button.css">

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
        <form class="form" id="form" method="POST" enctype="multipart/form-data" action="ajouter_annonce.php">
            <div class="wrapper">
                <div class="header">
                    <ul>
                        <li class="active form_1_progessbar">
                            <div>
                                <p>1</p>
                            </div>
                        </li>
                        <li class="form_2_progessbar">
                            <div>
                                <p>2</p>
                            </div>
                        </li>
                        <li class="form_3_progessbar">
                            <div>
                                <p>3</p>
                            </div>
                        </li>
                        <li class="form_4_progessbar">
                            <div>
                                <p>4</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form_wrap">
                    <div class="form_1 data_info">
                        <h2>INFORMATIONS GÉNÉRALES</h2>
                        <div class="form_container">
                            <div class="input_wrap">
                                <label for="email"><span class="impo">* </span> Categories</label>
                                <select id="slc_cat" class="select" onchange="sous_rubrique();">
                                    <option value="">-- sélectionnez votre choix --</option>
                                    <?php remplir_categorie(); ?>
                                </select>
                            </div>
                            <div class="input_wrap">
                                <label for="email"><span class="impo">* </span> Races</label>
                                <select name="slc_race" id="slc_race" class="select">
                                    <option value="">-- sélectionnez votre choix --</option>
                                </select>
                            </div>
                            <!-- <script>
                                document.getElementById('slc_cat').value =
                                    <?php
                                    // $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
                                    // $rqt =  $con->prepare("SELECT * FROM `race` WHERE `id_race` = " . $id_race_select);
                                    // $rqt->execute();
                                    // $rqt1 = $rqt->get_result();
                                    // while ($rows = $rqt1->fetch_assoc()) {
                                    //     $rqt0 =  $con->prepare("SELECT * FROM `categorie` WHERE `id_categorie` = " . $rows['id_categorie']);
                                    //     $rqt0->execute();
                                    //     $rqt11 = $rqt0->get_result();
                                    //     while ($rows2 = $rqt11->fetch_assoc()) {
                                    //         echo ($rows2['id_categorie']);
                                    //     }
                                    // }
                                    ?>;
                            </script> -->
                            <div class="input_wrap">
                                <label for="ville"><span class="impo">* </span> Ville</label>
                                <select name="slc_ville" id="slc_ville" class="select">
                                    <option value="">-- sélectionnez votre choix --</option>
                                    <?php remplir_ville(); ?>
                                </select>
                                <div class="ville_import" style="display: none;">
                                    <span>Veuillez renseigner ce champ</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form_2 data_info" style="display: none;">
                        <h2>DESCRIPTION De l'annonce</h2>
                        <div class="form_container">
                            <div class="input_wrap">
                                <div class="radio-group">
                                    <label for="h" class="sexe">
                                        <input type="radio" value="male" name="genre" id="h" <?php echo $rad_male; ?>>
                                        mâle
                                        <span for="h"></span>
                                    </label>
                                    <label for="f" class="sexe">
                                        <input type="radio" value="female" name="genre" id="f" <?php echo $rad_female; ?>>
                                        female
                                        <span for="f"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="input_wrap">
                                <label for="titre"><span class="impo">*</span> Titre de l'annonce</label>
                                <input value=<?php echo "\"" . $titre . "\"" ?> type="text" name="titre_ann" class="input" id="titre">
                                <div class="message_error erreur_input">
                                    <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Veuillez renseigner ce champ</small>
                                </div>
                            </div>
                            <div class="input_wrap">
                                <label for="text_ann"><span class="impo">*</span> Texte de l’annonce</label>
                                <textarea name="descript" id="text_ann" cols="30" rows="7" class="imput"><?php echo $description ?> </textarea>
                                <div class="message_error erreur_area">
                                    <ion-icon name="alert-circle-outline"></ion-icon>&nbsp;<small>Veuillez renseigner ce champ</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form_3 data_info" style="display: none;">
                        <div class="form_container">
                            <div class="input_wrap">
                                <div class="card">
                                    <span class="inner"><span class="err">
                                            <ion-icon name="alert-circle-outline" class="er"></ion-icon>&nbsp;Photos (4 maximum)
                                        </span><span class="upload">Ajouter photos</span></span>
                                    <input name="file" type="file" class="file" multiple onclick="div_pic();" />
                                </div>
                            </div>
                            <div class="input_wrap">
                                <div class="photos " id="div_pic">
                                    <?php
                                    if ($_GET['role'] == "modifier") {
                                        remplire_pictures($_GET['condition']);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form_4 data_info" style="display: none;">
                        <h2>VOS INFORMATIONS</h2>
                        <div class="form_container">
                            <div class="input_wrap">
                                <label for="nom_pre"><span class="impo">*</span> Nom d'utilisateur </label>
                                <input type="text" name="nom_pr" class="input" id="nom_pre" disabled value="<?php echo $_SESSION['user_name']; ?>">
                            </div>
                            <div class="input_wrap">
                                <label for="tel"><span class="impo">*</span> Téléphone</label>
                                <input type="tel" name="telephone" class="input" id="tel" disabled value="<?php echo $_SESSION['telephone']; ?>">
                                <div class="center">
                                    <label for="masquer"><small>Masquer le numéro dans l'annonce</small></label>
                                    <input type="checkbox" id="masquer" checked>
                                </div>
                            </div>
                            <div class="input_wrap">
                                <label for="mail"><span class="impo">*</span> E-mail</label>
                                <input type="email" name="mail" class="input" id="mail" disabled value="<?php echo $_SESSION['email'] ?>" ;>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btns_wrap">
                    <div class="common_btns form_1_btns">
                        <button type="button" class="btn_next">Continuer <span class="icon">
                                <ion-icon name="arrow-forward-sharp"></ion-icon>
                            </span></button>
                    </div>
                    <div class="common_btns form_2_btns" style="display: none;">
                        <button type="button" class="btn_back"><span class="icon">
                                <ion-icon name="arrow-back-sharp"></ion-icon>
                            </span>Retour</button>
                        <button type="button" class="btn_next">Continuer <span class="icon">
                                <ion-icon name="arrow-forward-sharp"></ion-icon>
                            </span></button>
                    </div>
                    <div class="common_btns form_3_btns" style="display: none;">
                        <button type="button" class="btn_back"><span class="icon">
                                <ion-icon name="arrow-back-sharp"></ion-icon>
                            </span>Retour</button>
                        <button type="button" class="btn_next">Continuer <span class="icon">
                                <ion-icon name="arrow-forward-sharp"></ion-icon>
                            </span></button>
                    </div>
                    <div class="common_btns form_4_btns" style="display: none;">
                        <button type="button" class="btn_back"><span class="icon">
                                <ion-icon name="arrow-back-sharp"></ion-icon>
                            </span>Retour</button>
                        <button type="button" class="btn_done" name="btn_sub_hh">Déposer</button>
                        <!-- <button type="submit" class="btn_done" name="btn_sub_hh">Déposer</button> -->
                    </div>
                </div>
            </div>
            <div class="modal_wrapper">
                <div class="shadow"></div>
                <div class="success_wrap">
                    <span class="modal_icon">
                        <ion-icon name="checkmark-sharp"></ion-icon>
                    </span>
                    <p>Félicitations <span>Ilyas</span> votre annonce est bien passée.</p>
                </div>

            </div>
        </form>
    </main>
    <!--
      - BANNER
    -->

    <!--
      - PRODUCT
    -->



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
    <script src="./assets/js/ajouter_annonce.js"></script>

    <!-- <script>
        function show_img() {
            let images = '';
            files.forEach((e, i) => {
                images += `<div class="im">
    			<img src="${URL.createObjectURL(e)}" alt="im">
    			<span onclick="delImage(${i})">&times;</span>
    		</div>`
            })

            container.innerHTML = images;
        }
    </script> -->

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

<script src="./jquery.ajaxchimp.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    sous_rubrique();

    function sous_rubrique() {

        var id_rubrique = document.getElementById('slc_cat').value;

        $.ajax({

            url: './remplire_race.php',

            type: 'GET',

            data: '&rubrique=' + id_rubrique,

            success: function(data) {

                document.getElementById("slc_race").innerHTML = data;

            }

        });

    }

    document.getElementById('slc_ville').value =
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
        $rqt =  $con->prepare("SELECT * FROM `ville` WHERE `id` = " . $id_ville_select);
        $rqt->execute();
        $rqt1 = $rqt->get_result();
        while ($rows = $rqt1->fetch_assoc()) {
            echo ($rows['id']);
        }

        ?>;

    document.getElementById('slc_cat').value =
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
        $rqt =  $con->prepare("SELECT * FROM `race` WHERE `id_race` = " . $id_race_select);
        $rqt->execute();
        $rqt1 = $rqt->get_result();
        while ($rows = $rqt1->fetch_assoc()) {
            $rqt0 =  $con->prepare("SELECT * FROM `categorie` WHERE `id_categorie` = " . $rows['id_categorie']);
            $rqt0->execute();
            $rqt11 = $rqt0->get_result();
            while ($rows2 = $rqt11->fetch_assoc()) {
                echo ($rows2['id_categorie']);
            }
        }
        ?>;
    sous_rubrique();

    document.getElementById('slc_race').value =
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
        $rqt =  $con->prepare("SELECT * FROM `race` WHERE `id_race` = " . $id_race_select);
        $rqt->execute();
        $rqt1 = $rqt->get_result();
        while ($rows = $rqt1->fetch_assoc()) {
            echo ($rows['id_race']);
        }
        ?>;
</script>

</html>
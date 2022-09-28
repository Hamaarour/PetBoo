<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetBoo - Annonce</title>

    <!--
    - logo 
  -->
    <link rel="shortcut icon" href="./assets/images/logo/logo2.svg" type="image/x-icon">

    <!--
    - custom css link
    -->

    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/preloader_style.css">
    <link rel="stylesheet" href="./assets/css/Annonce_style.css">
    <link rel="stylesheet" href="./assets/css/annonce_model_style.css">




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
    - HEADER
    -->

    <?php include "header.php"; ?>


    <!--
            - MAIN
          -->

    <main>

        <!--
                - PRODUCT
                  -->

        <div class="product-container ">

            <div class="container">

                <div class="container-fav">

                    <div class="box-container has-scrollbar-des">

                        <?php remplire_annonce(); ?>

                        <div class="product-box">

                            <div class="product-main">

                                <h2 class="title">Animaux</h2>

                                <div class="product-grid">

                                    <?php plus_annonce(); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!--
          FOOTER
      -->

    <?php include "footer.php" ?>

    <!--
          - custom js link
        -->
    <script src="./assets/js/menuToggle.js"></script>
    <script src="./assets/js/annonce.js"></script>
    <script src="./assets/js/preloader.js"></script>
    <script src="./assets/js/model_annonce.js"></script>


    <!--
          - ionicon link
        -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        function affich_annonce(href) {
            window.location = "Annonce-details.php?id_annonce=" + href;
        }

        function copyToClipboard(text) {
            const elem = document.createElement('textarea');
            elem.value = "http://localhost/pfe2/Annonce-details.php?id_annonce=" + text;
            document.body.appendChild(elem);
            elem.select();
            document.execCommand('copy');
            document.body.removeChild(elem);
        }

        function add_favoris(id_annonce) {
            var objXMLHttpRequest = new XMLHttpRequest();
            objXMLHttpRequest.open('GET', 'add_favoris.php?id_annonce=' + id_annonce);
            objXMLHttpRequest.send();
        }
    </script>

</body>

</html>

<?php

function remplire_annonce()
{
    if (isset($_GET['id_annonce'])) {
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

        $rqt_annonce = $con->prepare("SELECT * FROM `annonce` WHERE `id_annonce` = " . $_GET['id_annonce'] . ";");
        $rqt_annonce->execute();

        $annonce_result = $rqt_annonce->get_result();
        while ($rows = $annonce_result->fetch_assoc()) {
            echo '<div class="box">
            <div class="image-container">
                <div class="small-image">';
              
                $rqt_ville =  $con->prepare("SELECT * FROM `image` WHERE `id_annonce` = " . $_GET['id_annonce']);
                $rqt_ville->execute();
                $rqt_ville_result = $rqt_ville->get_result();
                $i = 0;
                $src = "";
                while ($rows1 = $rqt_ville_result->fetch_assoc()) {
                    echo ('<img src="assets/images/products/' . $rows1['image'] . '" class="small-img-1" alt="">');
                    if($i == 0){
                        $src = $rows1['image'];
                        $i++;
                    }
                }

              echo'</div>
                <div class="big-image">
                    <img src="assets/images/products/' . $src . '" class="big-img-1" alt="">
                </div>
            </div>
            <div class="content">
                <h3 class="titre">' . $rows["titre"] . '</h3>';

            $rqt_race = $con->prepare("SELECT r.nom_race, c.nom_categorie FROM `race` r, categorie c WHERE r.id_categorie = c.id_categorie and r.id_race = " . $rows['id_race'] . ";");
            $rqt_race->execute();

            $race_result = $rqt_race->get_result();
            while ($rows1 = $race_result->fetch_assoc()) {
                echo '<h4 class="categorie-race">' . $rows1['nom_categorie'] . ',<span><i>' . $rows1['nom_race'] . '</i></span></h4>';
            }

            echo '
            <h5 class="sexe">Genre :<span><i>' . $rows["genre"] . '</i></span></h5>

            <p class="description  has-scrollbar">' . $rows["description"] . ' </p>
            <h4 class="city">la Ville :<span><u>'; 
              
            $rqt_ville =  $con->prepare("SELECT * FROM `ville` WHERE `id` = " . $rows['ville']);
            $rqt_ville->execute();
            $rqt_ville_result = $rqt_ville->get_result();
            while ($rows1 = $rqt_ville_result->fetch_assoc()) {
                echo ($rows1['ville']);
            }

        echo'</u></span></h4>
            </div>
        </div>';

            $rqt_membre = $con->prepare("SELECT * FROM `membre` WHERE `id_membre` = " . $rows['id_membre'] . ";");
            $rqt_membre->execute();

            $membre_result = $rqt_membre->get_result();

            while ($rows1 = $membre_result->fetch_assoc()) {
                $src = "";
                if ($rows1['img'] == "") 
                    $src = './assets/images/user.png';
                else 
                    $src = './images/profile/' . $rows1['img'];

                echo '
                    <div class="box-information">
                        <div class="picture">
                            <img class="user-pic" src="' . $src . '" alt="">
                            <div class="user">
                                <p class="name-user">' . $rows1['user_name'] . '</p>
                                <div class="seniority">
                                    Membre depuis 2021
                                </div>
                            </div>
                        </div>
                        <div class="inf-button">
                            <button class="chat">
                                <div class="svg-wrapper-1">
                                    <div class="svg-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <span>CHAT</span>
                            </button>

                            <button type="button" class="information-btn" id="open" onclick="addClass();">
                                <div class="svg-wrapper-1">
                                    <div class="svg-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="24" height="24">

                                            <path d="M451 374c-15.88-16-54.34-39.35-73-48.76-24.3-12.24-26.3-13.24-45.4.95-12.74 9.47-21.21 17.93-36.12 14.75s-47.31-21.11-75.68-49.39-47.34-61.62-50.53-76.48 5.41-23.23 14.79-36c13.22-18 12.22-21 .92-45.3-8.81-18.9-32.84-57-48.9-72.8C119.9 44 119.9 47 108.83 51.6A160.15 160.15 0 0083 65.37C67 76 58.12 84.83 51.91 98.1s-9 44.38 23.07 102.64 54.57 88.05 101.14 134.49S258.5 406.64 310.85 436c64.76 36.27 89.6 29.2 102.91 23s22.18-15 32.83-31a159.09 159.09 0 0013.8-25.8C465 391.17 468 391.17 451 374z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                        </svg>
                                    </div>
                                </div>
                                <span class="show-info">AFFICHE LES INFORMATION</span>
                            </button>
                            <!--
                                    Modal information
                                -->
                            <div class="modal-bg">
                                <div class="modal">
                                    <h3 class="attention">
                                        <ion-icon name="megaphone-outline" class="attention-icon"></ion-icon>
                                        ATTENTION
                                    </h3>
                                    <P class="attention-p">
                                        Les animaux disponibles sur le site sont à l\'adoption
                                        uniquement et non à la vente
                                    </P>
                                    <p class="attention-p2">
                                        <span>
                                            <ion-icon name="warning-outline"></ion-icon>
                                        </span>
                                        Toutes personnes demande de largent, veuillez nous <span class="contact-us" onclick="openPage();">contacter</span>
                                    </p>
                                    <div class="information-model">
                                        <p class="email">Email : <span class="em">' . $rows1['email'] . '</span></p>
                                        <p class="appeler">
                                            <ion-icon name="call-outline"></ion-icon>&nbsp; Appeler <span> ' . $rows1['user_name'] . ' </span>
                                        </p>
                                        <button class="" name="" id="">' . $rows1['telephone'] . '</button>
                                        <span class="modal-close" id="close">X</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    ';
            }
        }
    }
}

function plus_annonce()
{

    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    if (isset($_GET['id_annonce'])) {
        $rqt_valid_login = mysqli_query($con, "UPDATE `annonce` SET `etat`='free' WHERE `id_annonce` = " . $_GET['id_annonce']);
        $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

        $rqt_annonce = $con->prepare("SELECT * FROM `annonce` WHERE `id_annonce` = " . $_GET['id_annonce'] . ";");
        $rqt_annonce->execute();

        $annonce_result = $rqt_annonce->get_result();
        while ($rows1 = $annonce_result->fetch_assoc()) {

            $rqt = $con->prepare("SELECT * FROM `annonce` WHERE `id_race` = " . $rows1['id_race'] . " AND `id_annonce` <> " . $_GET['id_annonce'] . ";");
            $rqt->execute();

            $rqt1 = $rqt->get_result();
            while ($rows = $rqt1->fetch_assoc()) {
                echo
                '<div class="showcase">
      
          <div class="showcase-banner">
            <img src="./assets/images/products/3.jpg" alt="photo d\'annonce" class="product-img default" width="300">
            <img src="./assets/images/products/4.jpg" alt="photo d\'annonce" class="product-img hover" width="300">
        
            <!--<p class="showcase-badge angle black">sale</p>-->
        
            <div class="showcase-actions">
        
              <button type="button" onclick="add_favoris(' . $rows["id_annonce"] . ');" class="btn-action" title="Favorie" name="' . $rows["id_annonce"] . '_favori">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button type="button" onclick="affich_annonce(' . $rows["id_annonce"] . ');" class="btn-action" title="Voir l\'article" name="' . $rows["id_annonce"] . '_view_articl">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button type="button" onclick="copyToClipboard(' . $rows["id_annonce"] . ');" class="btn-action" title="Copier lien" name="' . $rows["id_annonce"] . '_copy_link">
                <ion-icon name="copy-outline"></ion-icon>
              </button>
        
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">' . $rows['titre'] . '</a>
        
            <h3>
              <a href="#" class="showcase-title">' . $rows['description'] . '</a>
            </h3>
        
        
        
            <div class="city-box">
              <p class="city">'; 
              
              $rqt_ville =  $con->prepare("SELECT * FROM `ville` WHERE `id` = " . $rows['ville']);
              $rqt_ville->execute();
              $rqt_ville_result = $rqt_ville->get_result();
              while ($rows5 = $rqt_ville_result->fetch_assoc()) {
                  echo ($rows5['ville']);
              }

          echo'</p>
        
            </div>
        
          </div>
        
        </div>';
        

                // </script>';

            }
        }
    }
}
?>
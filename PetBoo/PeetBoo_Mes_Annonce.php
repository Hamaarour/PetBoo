<?php
session_start();
function remplire_annonce()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    $rqt = $con->prepare("SELECT * FROM `annonce` WHERE `id_membre` = " . $_SESSION['id_membre']);
    // die("SELECT * FROM `annonce` WHERE `id_membre` = " . $_SESSION['id_membre']);

    $rqt->execute();

    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        echo
        '

            <div class="showcase">

                <div class="showcase-banner">';
        
                $rqt_img =  $con->prepare("SELECT * FROM `image` WHERE `id_annonce` = " . $rows["id_annonce"]);
                $rqt_img->execute();
                $rqt_img_result = $rqt_img->get_result();
                $i = 0;
                while ($rows8 = $rqt_img_result->fetch_assoc()) {
                    if ($i == 0){
                      echo ('<img src="./assets/images/products/' . $rows8['image'] . '" alt="photo d\'annonce" class="product-img default" width="300">');
                        $i++;
                    }
                    else if($i == 1){
                      echo ('<img src="./assets/images/products/' . $rows8['image'] . '" alt="photo d\'annonce" class="product-img hover" width="300">');
                        $i++;
                    }
                }
        
              echo'

                    <!--<p class="showcase-badge angle black">sale</p>-->

                    <div class="showcase-actions">

                        <button type="button" onclick="modifier_annonce(' . $rows["id_annonce"] . ');" id="modif_' . $rows['id_annonce'] . '" class="btn-action" title="Modifier">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </button>
                        <button type="button" onclick="affich_annonce(' . $rows["id_annonce"] . ');" class="btn-action" title="Voir l\'article">
                            <ion-icon name="eye-outline"></ion-icon>
                        </button>

                        <button type="button" onclick="copyToClipboard(' . $rows["id_annonce"] . ');" class="btn-action" title="Copier lien">
                            <ion-icon name="copy-outline"></ion-icon>
                        </button>
                        <button type="button" onclick="delete_annonce(' . $rows["id_annonce"] . ')" class="btn-action" title="Supprimer" style="color: red;">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>

                    </div>
                </div>

                <div class="showcase-content">
                    <a href="#" class="showcase-category">' . $rows['titre'] . '</a>

                    <h3>
                        <a href="#" class="showcase-title">' . $rows['description'] . '</a>
                    </h3>

                </div>


        </div>';

        // </script>';

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetBoo Mes Annonces</title>

    <!--
    - logo 
  -->
    <link rel="shortcut icon" href="./assets/images/logo/logo1.svg" type="image/x-icon">

    <!--
    - custom css link
    -->

    <link rel="stylesheet" href="./assets/css/preloader_style.css">
    <link rel="stylesheet" href="./assets/css/PetBoo_Mes_Annonces.css">
    <link rel="stylesheet" href="./assets/css/PetBoo_button.css">

    <!--
    - google font link
- -->
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
<?php
    include "header.php";

    echo '<style>
            .desktop-menu-category-list, .sidebar, .has-scrollbar{
                display: none;
            }
        </style>';

    ?>

    <!--
        -- MAIN
    -->

    <main>
        <div class="product-container">

            <div class="container">


                <!--
                  - SIDEBAR
                -->

                <div class="sidebar  has-scrollbar" data-mobile-menu>

                    <?php include "left_menu.php"; ?>

                </div>

                <!--
                   - PRODUCT GRID
                 -->

                <div class="product-box">

                    <div class="product-main">


                        <h2 class="title">Mes Annonces</h2>

                        <div class="product-grid">
                            <?php remplire_annonce(); ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>



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

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--
      - Font Awesome link
    -->
    <script src="https://kit.fontawesome.com/e9ea40599a.js" crossorigin="anonymous">
    </script>
</body>

<script>
    function affich_annonce(href) {
        window.location = "Annonce-details.php?id_annonce=" + href;
    }

    function modifier_annonce(href) {
        window.location = "ajouter_annonce.php?role=modifier&condition=" + href;
    }

    function copyToClipboard(text) {
        const elem = document.createElement('textarea');
        elem.value = "http://localhost/pfe2/Annonce-details.php?id_annonce=" + text;
        document.body.appendChild(elem);
        elem.select();
        document.execCommand('copy');
        document.body.removeChild(elem);
    }

    function question() {
        var retVal = confirm("Do you want to continue ?");
        if (retVal == true) {
            return true;
        } else {
            return false;
        }
    }

    function delete_annonce(id) {

        if (question()) {
            window.location = "delete_annonce.php?id=" + id;
        }
    }
</script>

</html>
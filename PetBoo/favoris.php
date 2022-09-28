<?php
session_start();

if (!isset($_SESSION["user_name"])) {
    header("location: login.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pets -Favoris</title>

        <!--
    - logo 
  -->
        <link rel="shortcut icon" href="./assets/images/logo/logo2.svg" type="image/x-icon">

        <!--
    - custom css link
  -->
        <link rel="stylesheet" href="./assets/css/global_style.css">
        <link rel="stylesheet" href="./assets/css/style-favoris.css">
        <link rel="stylesheet" href="./assets/css/preloader_style.css">

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
        <form action="#">

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
    - MAIN
  -->

            <main>


                <!--
      - PRODUCT
    -->

                <div class="product-container">

                    <div class="container">


                        <!--
                  - SIDEBAR
                -->

                        <div class="sidebar  has-scrollbar" data-mobile-menu>
                            <?php
                            include "left_menu.php";
                            ?>
                        </div>

                        <div class="container-fav">



                            <div class="box-container has-scrollbar-des">

                                <?php
                                liste_favorie();
                                ?>

                            </div>

                        </div>

                    </div>
                </div>





            </main>





            <!--
     FOOTER
  -->

            <?php
            include "footer.php";
            ?>

        </form>

        <!--
    - custom js link
  -->
        <script src="./assets/js/menuToggle.js"></script>
        <script src="./assets/js/favoris-js.js"></script>
        <script src="./assets/js/preloader.js"></script>



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
        </script>


    </body>

    <script>
        function add_favoris(id_annonce) {
            var objXMLHttpRequest = new XMLHttpRequest();
            objXMLHttpRequest.onreadystatechange = function() {
                if (objXMLHttpRequest.readyState === 4) {
                    if (objXMLHttpRequest.status === 200) {
                        if (objXMLHttpRequest.responseText == "1") {
                            document.getElementById(id_annonce).style.background = "#ff0000";
                        } else {
                            document.getElementById(id_annonce).style.background = "#212121";
                        }
                        //   alert("----" + objXMLHttpRequest.responseText + "----");
                    } else {
                        alert('Error Code: ' + objXMLHttpRequest.status);
                        alert('Error Message: ' + objXMLHttpRequest.statusText);
                    }
                }
            }
            objXMLHttpRequest.open('GET', 'add_favoris.php?id_annonce=' + id_annonce);
            objXMLHttpRequest.send();
        }
    </script>

    </html>
    <!-- TODO:gha nteste hadchi ki dayr w sf  -->

<?php
}

function liste_favorie()
{
    include 'cnx.php';

    $rqt = $con->prepare("SELECT * FROM `favoris` WHERE `id_membre` = '" . $_SESSION["id_membre"] . "';");
    $rqt->execute();

    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        // echo $rows["id_annonce"];
        $rqt2 = $con->prepare("SELECT * FROM `annonce` WHERE `id_annonce` = '" . $rows["id_annonce"] . "';");
        $rqt2->execute();

        $rqt3 = $rqt2->get_result();
        while ($rows1 = $rqt3->fetch_assoc()) {
            echo ' 
                <div class="box">
                    <div class="image-container">
                        <div class="small-image">';
              
                            $rqt_ville =  $con->prepare("SELECT * FROM `image` WHERE `id_annonce` = " . $rows["id_annonce"]);
                            $rqt_ville->execute();
                            $rqt_ville_result = $rqt_ville->get_result();
                            $i = 0;
                            $src = "";
                            while ($rows11 = $rqt_ville_result->fetch_assoc()) {
                                echo ('<img src="assets/images/products/' . $rows11['image'] . '" class="small-img-1" alt="">');
                                if ($i == 0){
                                    $src = $rows11['image'];
                                    $i++;
                                }
                            }
            
                          echo'
                        </div>
                        <div class="big-image">
                            <img src="assets/images/products/' . $src . '" class="big-img-1" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <h3>' . $rows1["titre"] . '</h3>
                        <p class="description  has-scrollbar">' . $rows1["description"] . '</p>
                            <div class="user">
                            <div class="profile">
                                <img src="./assets/images/user.png" />
                                <p class="user-name">
                                    <a href="#">' . $_SESSION['user_name'] . '</a>
                                </p>
                            </div>

                        </div>
                        <button type="button" onclick="affich_annonce(' . $rows["id_annonce"] . ');" class="btn">Afficher l\'annonce</button>

                        <button type="button" onclick="add_favoris(' . $rows["id_annonce"] . ');" href="#" id="' . $rows["id_annonce"] . '" class="btn-del">
                            <ion-icon name="heart-outline"></ion-icon>
                            supprimer
                        </button>
                    </div>
                </div>
            ';
        }
    }
}


?>
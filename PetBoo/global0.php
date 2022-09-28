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
        <title>PetBoo - site web d'adoption des animaux</title>

        <!--
    - logo 
  -->
        <link rel="shortcut icon" href="./assets/images/logo/logo2.svg" type="image/x-icon">

        <!--
    - custom css link
  -->

        <link rel="stylesheet" href="./assets/css/global_style.css">
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
        <!--
    - Overlay
  -->
        <div class="overlay" data-overlay></div>

        <!--
    - MODAL
  -->

        <div class="modal" data-modal>

            <div class="modal-close-overlay" data-modal-overlay></div>

            <div class="modal-content">

                <button class="modal-close-btn" data-modal-close>
                    <ion-icon name="close-outline"></ion-icon>
                </button>

                <div class="newsletter-img">
                    <img src="./assets/images/newsletter.png" alt="subscribe" width="400" height="400">
                </div>

                <div class="newsletter">

                    <form action="global0.php" method="POST">

                        <div class="newsletter-header">

                            <h3 class="newsletter-title">Bienvenue ! <span> <?php echo $_SESSION['user_name'] ?></span></h3>

                            <p class="newsletter-desc">
                                visitez <b>PetBoo</b> pour obtenir le dernier animal que vous souhaitez adopter.

                            </p>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--
    - NOTIFICATION TOAST
  -->

        <div class="notification-toast" data-toast>

            <button class="toast-close-btn" data-toast-close>
                <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="toast-banner">
                <img src="./assets/images/glob.jpeg" alt="pic" width="80" height="70">
            </div>

            <div class="toast-detail">

                <p class="toast-message">
                </p>

                <p class="toast-title">
                    N'hesitez pas de partager PetBoo avec tes amis

                </p>

                <p class="toast-meta">
                    Merci &#128522;
                </p>

            </div>

        </div>





        <!--
    - HEADER
  -->




        <?php include "header.php"; ?>



        <!--
    - MAIN
  -->

        <main>

            <!--
      - BANNER
    -->

            <div class="banner">

                <div class="container">

                    <div class="slider-container has-scrollbar">

                        <div class="slider-item">

                            <img src="./assets/images/banners/5.png" alt="" class="banner-img">

                            <div class="banner-content">
                                <ion-icon name="paw" class="paw"></ion-icon>
                                <h2 class="banner-title">LIFE IS BETTER WITH PETS</h2>

                                <!--<a href="#" class="banner-btn">Shop now</a>-->

                            </div>

                        </div>

                        <div class="slider-item">

                            <img src="./assets/images/banners/banner-2.png" alt="" class="banner-img">

                            <div class="banner-content">
                            </div>

                        </div>

                        <div class="slider-item">

                            <img src="./assets/images/banners/birds.png" alt="" class="banner-img">

                            <div class="banner-content">


                                <i class="fas fa-dove" id="bird"></i>
                                <h2 class="banner-title">VOTRE MEILLEUR AMI VOUS ATTEND</h2>



                                <!--<a href="#" class="banner-btn">Shop now</a>-->

                            </div>

                        </div>

                    </div>

                </div>

            </div>





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
                        include "left_menu.php"
                        ?>



                    </div>

                    <!--
           - PRODUCT GRID
         -->

                    <div class="product-box">

                        <div class="product-main">

                            <h2 class="title">Animaux</h2>

                            <div class="product-grid" id="product-grid">

                                <?php
                                remplire_annonce();
                                ?>

                                <!-- <button type="button" onclick="lister_annonce(20);">0000000</button> -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>



            <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

            <div>

                <div class="container">

                    <div class="testimonials-box">

                        <!--
            - TESTIMONIALS 1
          -->

                        <div class="testimonial">
                            <div class="testimonial-card">

                                <img src="./assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">

                                <p class="testimonial-desc">
                                    Tant q'on a pas aime un animal une partie de notre ame reste endormie.
                                </p>

                            </div>

                        </div>

                        <!--
            - CTA
          -->

                        <!--
              - TESTIMONIALS 2
           -->
                        <!--TODO 4-->
                        <div class="testimonial">


                            <div class="testimonial-card">
                                <img src="./assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">

                                <p class="testimonial-desc">
                                    Les animaux sont des amis
                                    tellement agréables-ils ne posent
                                    jamais de questions, ils ne font
                                    aucune critique.
                                </p>

                            </div>

                        </div>

                        <div class="testimonial">


                            <div class="testimonial-card">
                                <img src="./assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">
                                <p class="testimonial-desc">
                                    Respecter les animaux est une obligation, les aimer est un privilège.
                                </p>
                            </div>
                        </div>

                        <div class="testimonial">


                            <div class="testimonial-card">
                                <img src="./assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">
                                <p class="testimonial-desc">
                                    Nous ne savons vraiment rien de l'amour si nous n'aimons pas les animaux.
                                </p>

                            </div>

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




        <!--
    - custom js link
  -->
        <script src="./assets/js/script.js"></script>
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

            // function favorie(){

            // }
        </script>
    </body>

    </html>

<?php
}

function remplire_annonce()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
    if ($_GET['role'] != "search") {
        if ($_GET['condition'] == "") {
          $rqt = $con->prepare("SELECT * FROM `annonce` WHERE `etat` = 'free'");
        } else {
          $rqt = $con->prepare("SELECT * FROM `annonce` WHERE `etat` = 'free' AND `id_race` = " . $_GET['condition']);
        }
      } else {
        $rqt = $con->prepare("SELECT a.* FROM `annonce` a, `ville` v, `race` r, `categorie` c WHERE a.id_race = r.id_race AND a.ville = v.id AND r.id_categorie = c.id_categorie AND ( v.ville LIKE '%" . $_GET['condition'] . "%' OR a.titre LIKE '%" . $_GET['condition'] . "%' OR a.ville LIKE '%" . $_GET['condition'] . "%' OR a.description LIKE '%" . $_GET['condition'] . "%' OR a.etat LIKE '%" . $_GET['condition'] . "%' OR a.genre LIKE '%" . $_GET['condition'] . "%' OR c.nom_categorie LIKE '%" . $_GET['condition'] . "%' OR c.nom_categorie LIKE '%" . $_GET['condition'] . "%' and a.etat = 'free');");
      }
      $rqt->execute();

    $rqt1 = $rqt->get_result();
    while ($rows = $rqt1->fetch_assoc()) {
        echo
        '<div class="showcase">
    
        <div class="showcase-banner" style="
        height: 250px;
    ">';
        
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
        while ($rows1 = $rqt_ville_result->fetch_assoc()) {
            echo ($rows1['ville']);
        }
        echo
        '</p>
      
          </div>
      
        </div>
      
      </div>';

        // </script>';

    }
}

?>
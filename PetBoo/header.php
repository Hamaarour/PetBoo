<?php
// session_start();

// function header 
function remplire_header_menu()
{
  include 'cnx.php';

  $rqt = $con->prepare("SELECT * FROM categorie");
  $rqt->execute();

  $rqt1 = $rqt->get_result();
  while ($rows = $rqt1->fetch_assoc()) {
    echo '
            <li class="menu-category">
                <a class="menu-title">' . $rows['nom_categorie'] . '</a>
                <ul class="dropdown-list">';

    $rqt2 = $con->prepare("SELECT * FROM race WHERE id_categorie = '" . $rows["id_categorie"] . "'");
    $rqt2->execute();

    $rqt3 = $rqt2->get_result();
    while ($rows1 = $rqt3->fetch_assoc()) {
      echo '
          <button type="button" class="dropdown-item" onclick="filter(' . $rows1['id_race'] . ');">
              <a> ' . $rows1['nom_race'] . '</a>
          </button>';
    }
    echo '</ul>';
  }
}

function remplire_left_menu_phone()
{
  include 'cnx.php';

  $rqt = $con->prepare("SELECT * FROM categorie");
  $rqt->execute();

  $rqt1 = $rqt->get_result();
  while ($rows = $rqt1->fetch_assoc()) {
    echo '<li class="menu-category">

            <button type="button" class="accordion-menu" data-accordion-btn>
            <p class="menu-title">' . $rows['nom_categorie'] . '</p>
        
            <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
            </button>
        
            <ul class="submenu-category-list" data-accordion>';

    $rqt2 = $con->prepare("SELECT * FROM race WHERE id_categorie = '" . $rows["id_categorie"] . "'");
    $rqt2->execute();

    $rqt3 = $rqt2->get_result();
    while ($rows = $rqt3->fetch_assoc()) {
      echo '<li class="submenu-category">
                <a href="#" class="submenu-title">' . $rows['nom_race'] . '</a>
                </li>';
    }
    echo '</ul>';
  }
}

function nb_favoris()
{
  include 'cnx.php';

  $rqt = $con->prepare("SELECT * FROM favoris WHERE id_membre = " . $_SESSION['id_membre'] . "");
  $rqt->execute();

  $rqt1 = $rqt->get_result();
  $i = 0;
  while ($rows = $rqt1->fetch_assoc()) {
    $i += 1;
  }
  return $i;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/css/PetBoo_button.css">
</head>

<body>
  <header>

    <div class="header-top">

      <div class="container">

        <ul class="header-social-container">

          <li>
            <a href="https://www.facebook.com/PetBoo-100685252651285" class="social-link ">
              <ion-icon name="logo-facebook" id="facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://www.instagram.com/petboo4e/" class="social-link">
              <ion-icon name="logo-instagram" id="instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="mailto:petboo4e@gmail.com" class="social-link">
              <ion-icon name="logo-google" id="google"></ion-icon>
            </a>
          </li>

        </ul>

        <div class="header-alert-news">
          <p>

            Pour l'AMOUR des animaux
          </p>
        </div>

        <div class="header-top-actions">


          <select name="language">
            <option value="fr" selected>Fran&ccedil;ais</option>

          </select>

        </div>

      </div>

    </div>
    <!-- <form action=""> -->
    <div class="header-main">

      <div class="container">

        <a href="global0.php?condition=&role=" class="header-logo">
          <img src="./assets/images/logo/1.svg" alt="" width="150" height="60">
          <!-- <img src="./assets/images/logo/logo2.svg" alt="" width="150" height="60"> -->
        </a>

        <!--? Search bare-->
        <div class="header-search-container">

          <input type="search" id="input_search" name="search" class="search-field" placeholder="Entrée le nom de l'animal ...">

          <button class="search-btn" onclick="filter_search();">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </div>

        <div class="header-user-actions">

          <!--? Menu-user header-->
          <button type="button" type="button" class="action-btn">
            <div class="action" title="profile">
              <div class="profile" onclick="menuToggle();">
                <img src=<?php 
                if ($_SESSION['img'] == "") 
                    echo '"./assets/images/user.png"';
                  else 
                    echo '"./images/profile/' . $_SESSION['img'] . '"' ?> alt="" style="width: 60px; height: 60px;" />
              </div>
              <div class="menu">
                <ul>

                  <li>
                    <img src="./assets/images/icons/copy-outline.svg" /><a href="./PeetBoo_Mes_Annonce.php" title="Edite Mon Profile">Mes annonces</a>
                  </li>

                  <li>
                    <img src="./assets/images/icons/heart-outline.svg" /><a href="./favoris.php" title="Parametre de mon page">Mes favoris</a>
                  </li>
                  <li>
                    <img src="./assets/images/icons/chat-svgrepo-com.svg" /><a href="./chat.php" title="Parametre de mon page">Chat</a>
                  </li>
                  <li>
                    <img src="./assets/images/icons/settings-outline.svg" /><a href="./Parametre.php" title="Parametre de mon page">Réglages</a>
                  </li>
                  <li>
                    <img src="./assets/images/icons/log-in-outline.svg" /><a href="deconnection.php" title="Deconnecter">Se déconnecter</a>
                  </li>
                </ul>
              </div>
            </div>
          </button>
        </div>

      </div>

      <div class="div_ggg">
        <button class="cta" onclick="openPage();">
          <ion-icon name="add-outline"></ion-icon>
          <span>Déposer une annonce</span>
        </button>
      </div>

    </div>
    <!-- </form> -->
    <!--?  Desktop Navigation-->

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="./global0.php?condition=&role=" class="menu-title">Home</a>
          </li>

          <?php
          remplire_header_menu();
          ?>

        </ul>

      </div>

    </nav>

    <!--?---------------------->
    <!--?---Phone Navigation--->
    <!--?---------------------->
    <div class="mobile-bottom-navigation">

      <!--?Menu button-->
      <button type="button" class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <!--? Profile Button-->
      <button type="button" class="action-btn" profile-data-mobile-menu-open-btn>
        <ion-icon name="person-outline"></ion-icon>
      </button>

      <!--? Home Button-->
      <a href="./global0.php?condition=&role=">
        <button type="button" class="action-btn">
          <ion-icon name="home-outline"></ion-icon>
        </button>
      </a>

      <!--? Heart Button-->
      <button type="button" class="action-btn">
        <a href="./favoris.php">
          <ion-icon name="heart-outline"></ion-icon>
          <span class="count">
            <?php
            echo
            nb_favoris();
            ?>
          </span>
        </a>
      </button>
      <!--? Categorie Button-->
      <button type="button" class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>
    <!--? Menu Button-->
    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button type="button" class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="global0.php?condition=&role=" class="menu-title">Home</a>
        </li>

        <?php
        remplire_left_menu_phone();
        ?>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-category-list">

          <li class="menu-category">

            <button type="button" class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Language</p>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">العربية</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Fren&ccedil;ais</a>
              </li>

            </ul>

          </li>

        </ul>

        <!--? Social media-->

        <ul class="menu-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>


        </ul>

      </div>

    </nav>


    <!--? Profile Menu-->
    <nav class="mobile-navigation-menu  has-scrollbar" profile-data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Profile</h2>

        <button type="button" class="menu-close-btn" profile-data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <div>
            <img src=<?php if ($_SESSION['img'] == "") echo '"./assets/images/user.png"';
                      else echo '"./images/profile/' . $_SESSION['img'] . '"' ?> alt="" style="width: 60px; height: 60px;" />
          </div>
          <b><a href="#" class="menu-title" style="margin-left: 60px;"><?php echo $_SESSION['user_name'] ?></a></b>
        </li>

        <li class="menu-category">

          <button type="button" class="accordion-menu" data-accordion-btn>

            <a href="#">
              <p class="menu-title">Profile</p>
            </a>
            <div class="Menu-profile">
              <ion-icon name="person-outline"></ion-icon>
            </div>
          </button>

        </li>


        <li class="menu-category">

          <button type="button" class="accordion-menu" data-accordion-btn>
            <a href="">
              <p class="menu-title">Mes annoncese</p>
            </a>
            <div>
              <ion-icon name="copy-outline" class="add-icon"></ion-icon>
            </div>
          </button>

        </li>

        <li class="menu-category">

          <button type="button" class="accordion-menu" data-accordion-btn>
            <a href="./favoris.php">
              <p class="menu-title">Mes favoris</p>
            </a>
            <div>

              <ion-icon name="heart-outline" class="add-icon"></ion-icon>
            </div>
          </button>

        </li>

        <li class="menu-category">

          <button type="button" class="accordion-menu" data-accordion-btn>
            <a href="./chat.php">
              <p class="menu-title">Chat</p>
            </a>
            <div>

              <ion-icon name="heart-outline" class="add-icon"></ion-icon>
            </div>
          </button>

        </li>

        <li class="menu-category">

          <button type="button" class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Réglages</p>

            <div>
              <ion-icon name="settings-outline" class="add-icon"></ion-icon>
            </div>
          </button>

        </li>

        <li class="menu-category">

          <button type="button" class="accordion-menu" data-accordion-btn ">
        
        <a href=" deconnection.php" class="menu-title">Se déconnecter</a>
            <ion-icon name="log-out-outline"></ion-icon>
          </button>

        </li>


      </ul>


    </nav>

  </header>
</body>

<script>
  function filter(condition) {
    window.location = "./global0.php?condition=" + condition + "&role=";
  }

  function openPage() {
    window.location = "ajouter_annonce.php?role=&condition=";
  }

  function filter_search() {
    condition = document.getElementById("input_search").value;
    window.location = "./global0.php?condition=" + condition + "&role=search";

  }
</script>

</html>
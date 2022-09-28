<?php
session_start();

if (isset($_SESSION["user_name"])) {
  header("location: global0.php?condition=&role=");
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- 
    - favicon link
  -->
    <link rel="shortcut icon" href="./assets/images/logo/logo2.svg" type="image/svg+xml">
    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/Login_Styl.css">
    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body id="top">
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
    <!-- 
    - #HEADER
  -->
    <header data-header>
      <!-- 
      - #overlay
    -->
      <div class="overlay" data-overlay></div>
      <div class="container">
        <a href="./home.html" class="logo">
          <img src="./assets/images/logo/logo2.svg" alt="logo">
        </a>
      </div>
    </header>


    <!-- 
    - #LOGIN
  -->


    <section class="log">
      <div class="login" id="container">
        <div class="row">
          <div class="form-container sign-up-container">
            <form action="login.php" method="POST" onsubmit="return inscr_test_vider();">
              <h1>Créer un compte</h1>
              <input type="email" name="txt_inscr_email" id="incr_email" placeholder="Email (xx@xx.xx)" required />
              <input type="text" name="txt_inscr_user_name" id="incr_user_name" placeholder="Nom d'utilisateur " required />
              <input type="password" name="txt_inscr_password" id="incr_password" placeholder="Mot de passe" required />
              <input type="password" id="incr_conferm_password" placeholder="Confirmer mot de passe" required />
              <label for="">
                <?php
                logout();
                ?>
              </label>
              <input type="submit" name="btn_inscr_sub" class="btn" value="S'inscrire" />
              <p id="mobile_para">Connectez-vous ici !!</p>
              <button class="ghost_mobile" id="signIn_mobile">Se connecter</button>
            </form>
          </div>
          <div class="form-container sign-in-container">
            <form action="login.php" method="POST" onsubmit="return login_test_vider();">
              <h1>Connexion</h1>
              <input type="email" name="txt_login_email" id="login_email" placeholder="Email" required />
              <input type="password" name="txt_login_password" id="login_password" placeholder="Mot de passe" required />
              <a href="send_email.php">Mot de passe oublié ?</a>
              <label for="">
                <?php
                login();
                ?>
              </label>
              <input type="submit" name="btn_login_sub" class="btn" value="Se connecter" />
              <p id="mobile_para">Inscrivez-vous ici !!</p>
              <button class="ghost_mobile" id="signUp_mobile">S'inscrire</button>
            </form>
          </div>
          <div class="overlay-login">
            <div class="overlay_">
              <div class="overlay-panel overlay-left">
                <h1>Bienvenus !</h1>
                <p>Pour rester en contact avec nous, veuillez vous connecter avec vos informations personnelles</p>
                <button class="ghost" id="signIn">Se connecter</button>
              </div>
              <div class="overlay-panel overlay-right">
                <h1>Salut !</h1>
                <p>Entrez vos données personnelles et commencez votre voyage avec nous</p>
                <button class="ghost" id="signUp">S'inscrire</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- 
    - #FOOTER
  -->
    <footer>
      <div class="footer-bottom">
        <div class="container">
          <p class="copyright">
            <a href="" class="footer-logo">
              <img src="./assets/images/logo/logo2.svg" alt="logo">
            </a>
          </p>
          <hr class="divider">
          <ul class="social-list">
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
            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <!-- 
    - custom js link
  -->
    <script src="./assets/js/Login_main.js"></script>
    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
      function inscr_test_vider() {
        if (document.getElementById("incr_email").value.trim() == "" || document.getElementById("incr_user_name").value.trim() == "" || document.getElementById("incr_password").value.trim() == "" || document.getElementById("incr_conferm_password").value.trim() == "") {
          alert("Veuillez remplir les champs");
          return false;
        } else {
          if (document.getElementById("incr_password").value != document.getElementById("incr_conferm_password").value) {
            alert("Entrer un mot de passe valide s'il vous plait");
            return false;
          } else {
            return true;
          }
        }
      }

      function login_test_vider() {
        if (document.getElementById("login_email").value.trim() == "" /* || document.getElementById("login_password").value.trim() == ""*/ ) {
          alert("Veuillez remplir les champs");
          return false;
        } else {
          return true;
        }
      }
    </script>
  </body>

  </html>

<?php
}

function login()
{
  // include "login0.php";
  if (isset($_REQUEST['btn_login_sub'])) {

    $login_email = $_REQUEST['txt_login_email'];
    $_SESSION["email"] = $login_email;
    $login_pass = $_REQUEST['txt_login_password'];

    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    $rqt_test_ban = mysqli_query($con, "SELECT * FROM `membre` WHERE email = '" . $login_email . "' AND `id_membre` NOT IN (SELECT `id_membre` FROM `ban`)");

    if (mysqli_num_rows($rqt_test_ban) >= 1) {

      $rqt_valid_login = mysqli_query($con, "SELECT * FROM `membre` WHERE email = '" . $login_email . "' and password = '" . $login_pass . "';");

      if (mysqli_num_rows($rqt_valid_login) >= 1) {

        $rqt =  $con->prepare("SELECT * FROM `membre` WHERE email = '" . $login_email . "' and password = '" . $login_pass . "';");
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

        header("Location: global0.php?condition=&role=");
      } else {
        echo "Email ou le mot de passe est incorrect";
      }
    } else {
      echo "Il semble que ce compte ait été suspendu.\n<a class=\"msg\">Visitez le centre d'aide pour plus d'informations.</a>";
    }
  }
}

function logout()
{
  // include "login0.php";
  if (isset($_REQUEST['btn_inscr_sub'])) {
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    $inscr_email = $_REQUEST['txt_inscr_email'];
    $_SESSION["email"] = $inscr_email;
    $inscr_user_name = $_REQUEST['txt_inscr_user_name'];
    $inscr_pass = $_REQUEST['txt_inscr_password'];

    $rqt_vrf = mysqli_query($con, "SELECT * FROM `membre` WHERE email = '" . $inscr_email . "';");

    if (mysqli_num_rows($rqt_vrf) == 0) {
      $rqt_vrf = mysqli_query($con, "SELECT * FROM `membre` WHERE user_name = '" . $inscr_user_name . "';");

      if (mysqli_num_rows($rqt_vrf) == 0) {
        $rqt_valid_login = mysqli_query($con, "INSERT INTO `membre` (`id_membre`, `user_name`, `email`, `password`, `telephone`, `ville`, `img`, `bio`, `nb_ban`) VALUES (NULL, '" . $inscr_user_name . "', '" . $inscr_email . "', '" . $inscr_pass . "', '', '1', '', '', '0');");

        $rqt =  $con->prepare("SELECT * FROM `membre` WHERE email = '" . $inscr_email . "';");
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

        header("Location: Parametre.php");
      } else {
        echo "Ce nom d'utilisateur est déjà enregistré";
      }
    } else {
      echo "Ce email est déjà enregistré";
    }
  }
}
?>
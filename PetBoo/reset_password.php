<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mot de passe oublié</title>
  <!-- 
    - favicon link
  -->
  <link rel="shortcut icon" href="./assets/images/2.svg" type="image/svg+xml">
  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/ForgetPaas_style.css">
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
      <a href="#" class="logo">
        <img src="./assets/images/2.svg" alt="logo">
      </a>
    </div>
  </header>
  <!-- 
    - #LOGIN
  -->
  <section class="log">
    <div class="container padding-bottom-3x mb-2 mt-5">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
              <form class="card mt-4">
                <h2>Choisissez un nouveau mot de passe</h2>
                <p>Créez un mot de passe fort est une combinaison de lettres, de chiffres et de signes de ponctuation.</p>
                <div class="card-body">
                    <div class="form-group">
                      <input class="form-control" type="password" id="mdp" required="" placeholder="Nouveau mot de passe:">
                      <input class="form-control" type="password" id="mdp_confirm" required="" placeholder="Confirmer le mot de passe:">
                      <label for="">nn</label>
                    </div>
                </div>
                <div class="card-footer"> 
                  <button class="btn btn-success" type="submit">Continuer</button>
                </div>
              </form>
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
          <a href="#" class="footer-logo">
            <img src="./assets/images/2.svg" alt="logo">
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
  <script src="./assets/js/forget_pass.js"></script>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
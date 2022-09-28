<?php
$con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
if ($_GET['condition'] == "") {
    $rqt = $con->prepare("SELECT * FROM `annonce`");
} else {
    $rqt = $con->prepare("SELECT * FROM `annonce` WHERE `id_race` = " . $_GET['condition']);
}
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
            <p class="city">' . $rows['ville'] . '</p>
      
          </div>
      
        </div>
      
      </div>';

    // </script>';


}

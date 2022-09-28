<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="sidebar-category">

    <div class="sidebar-top">
      <h2 class="sidebar-title">categories</h2>

      <button type="button" class="sidebar-close-btn" data-mobile-menu-close-btn>
        <ion-icon name="close-outline"></ion-icon>
      </button>
    </div>

    <ul class="sidebar-menu-category-list">

      <?php
      left_menu();
      ?>

    </ul>
  </div>
</body>

</html>


<?php

function left_menu(){
  include 'cnx.php';

  $rqt = $con->prepare("SELECT * FROM categorie");
  $rqt->execute();
  
  $rqt1 = $rqt->get_result();
  while ($rows = $rqt1->fetch_assoc()) {
    echo '<li class="sidebar-menu-category">
  
      <button type="button" class="sidebar-accordion-menu" data-accordion-btn>
  
        <div class="menu-title-flex">
          <img src="./assets/images/icons/' . $rows['nom_categorie'] . '.png" alt="clothes" width="20" height="20"
            class="menu-title-img">
  
          <p class="menu-title">' . $rows['nom_categorie'] . '</p>
        </div>
  
        <div>
          <ion-icon name="add-outline" class="add-icon"></ion-icon>
          <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
        </div>
  
      </button>
      <ul class="sidebar-submenu-category-list" data-accordion>
  
            ';
  
  
    $rqt2 = $con->prepare("SELECT * FROM race WHERE id_categorie = '" . $rows['id_categorie'] . "'");
    $rqt2->execute();
  
    $rqt3 = $rqt2->get_result();
    while ($rows2 = $rqt3->fetch_assoc()) {

      $href = 'global0.php?condition=' . $rows2['id_race'] . '&role=';

      // echo $rows2['nom_race'] . '<br>';
      echo '<li class="sidebar-submenu-category">
              <a href=' . $href . ' class="sidebar-submenu-title">
                <p class="product-name">' . $rows2['nom_race'] . '</p>
                <data value="300" class="stock" title="Available Stock">' . get_number_race($rows2['id_race']) . '</data>
              </a>
            </li>';
    }
  
    echo '</ul> </li>';
  }
}

function get_number_race($id_race)
{
  include 'cnx.php';

  $rqt = $con->prepare("SELECT * FROM annonce WHERE id_race = '" . $id_race . "'");
  $rqt->execute();

  $rqt1 = $rqt->get_result();
  $i = 0;
  while ($rows = $rqt1->fetch_assoc()) {
    $i += 1;
  }
  return $i;
}

?>
<?php

$con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

$id_rubrique = strip_tags(htmlentities(addslashes($_GET['rubrique'])));

$res_sous_rubrique = mysqli_query($con, "select * from race  where  id_categorie=" . $id_rubrique);

while ($data_sous_rubrique = mysqli_fetch_array($res_sous_rubrique)) {

    $option .= '<option value=' . $data_sous_rubrique['id_race'] . '>' . html_entity_decode($data_sous_rubrique['nom_race']) . '</option> ';

}

echo $option;
<?php

$con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

$rqt = mysqli_query($con, "SELECT * FROM `categorie`");
$categories = mysqli_fetch_all($rqt, MYSQLI_ASSOC);
$rqt_race = mysqli_query($con, "SELECT * FROM `race`");
$races = mysqli_fetch_all($rqt_race, MYSQLI_ASSOC);

if (isset($_POST['btn_ajouter_annonce_sub'])) {

    // $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');
    // $id_race = $_POST['id_race'];
    // $ville = $_POST['id'];
    // $titre = $_POST['txt_ajouter_annonce_titre'];
    // $genre = $_POST['rb_ajouter_annonce_genre'];
    // $desc = $_POST['txt_ajouter_annonce_desc'];
    // $date = date("Y-m-d");

    $tmp_file = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $content_dir = './image/';
    $i = 1;
    if (!is_uploaded_file($tmp_file)) {
        $i = 2;
        $err = "image non trouvée";
    }
    $type_file = $_FILES['image']['type'];
    $url_image = $_FILES['image']['name'];
    if ($i == 1) {
        if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
            $i = 2;
        $err = "Le fichier est pas une image ou pdf";
    }
    $name_file = $_FILES['image']['name'];
    $extention = strrchr($name_file, '.');
    $db_name = md5(rand(1000000, 5000000)) . $extention;
    if (!move_uploaded_file($tmp_file, $content_dir . $db_name)) {
        $i = 2;
        $err = "Impossible de copier le fichier";
    }
    
    $annonce_query = mysqli_query($con, "INSERT INTO `annonce` (`id_annonce`, `id_membre`, `id_race`, `titre`, `ville`, `description`, `date_annonce`, `etat`, `genre`)
        VALUES (NULL, '24', $id_race, '$titre', $ville, '$desc', '$date', 'free', '$genre');");
    $last_id = mysqli_query($con, "SELECT id_annonce FROM `annonce` ORDER BY id_annonce DESC limit 1");
    $last_idd = mysqli_fetch_assoc($last_id);
    $id = $last_idd['id_annonce'];

    if ($i == 1) {
        $img_query = mysqli_query($con, "INSERT INTO `image`(`id_image`, `id_annonce`, `image`) VALUES(NULL,  '$id','$db_name')");

        // header("location:./image_appartement.php?id=" . $appartement . "&done&" . $err);
    } else {
        // header("location:./image_appartement.php?id=" . $appartement . "&err_piece&" . $err);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter annonce</title>
</head>

<body>
    <form action="Ajouter_annonce_Test.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <input type="hidden" name="txt_ajouter_annonce_id" id="">
                </td>
            </tr>
            <tr>
                <td> Categorie : </td>
                <td>
                    <select name="id_categorie" id="">
                        <option value="-1">Séléctionnez la catégorie</option>
                        <?php foreach ($categories as $cat) { ?>
                            <option value="<?= $cat['id_categorie'] ?>"><?= $cat['nom_categorie'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Race : </td>
                <td>
                    <select name="id_race" id="">
                        <option value="-1">Séléctionnez la race</option>

                        <?php foreach ($races as $rac) { ?>
                            <option value="<?= $rac['id_race'] ?>"><?= $rac['nom_race'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Ville : </td>
                <td>
                    <select name="id" id="">
                        <option value="-1">Séléctionnez la ville</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Image : </td>
                <td>
                    <input type="file" id="" name="image">
                </td>
            </tr>
            <tr>
                <td> Titre : </td>
                <td>
                    <input type="text" name="txt_ajouter_annonce_titre" id="">
                </td>
            </tr>
            <tr>
                <td> genre : </td>
                <td>
                    <input type="radio" name="rb_ajouter_annonce_genre" value="Female">female
                    <input type="radio" name="rb_ajouter_annonce_genre" value="Male">male
                </td>
            </tr>
            <tr>
                <td> description : </td>
                <td>
                    <input type="text" name="txt_ajouter_annonce_desc" id="">
                </td>
            </tr>
        </table>
        <input type="submit" name="btn_ajouter_annonce_sub" value="Ajouter annonce">
    </form>
</body>

</html>



<!-- if(($_FILES["image"]["tmp_name"])>0)
        {
            for($c=0;$c<count($_FILES["image"]["tmp_name"]); $c++)
            {
                $image_file=addslashes(file_POST_contents($_FILES['image']['tmp_img'][$c]));
                $img_query=mysqli_query($con,"INSERT INTO `image`(`id_annonce`, `image`,) VALUES($id_annonce,'$image_file')");
            }
        }    
        echo 'SUCCESS';
    
-->
<?php
session_start();
function remplire_contact()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

    $_list_id_innonce_1 = [];
    $_list_id_innonce_2 = [];
    $_list_id_innonce_3 = [];

    $rqt_1 = $con->prepare("SELECT `id_membre_send` FROM `chats` WHERE `id_membre_receive` = " . $_SESSION['id_membre'] . " GROUP BY `id_membre_send`;");
    $rqt_2 = $con->prepare("SELECT `id_membre_receive` FROM `chats` WHERE `id_membre_send` = " . $_SESSION['id_membre'] . " GROUP BY `id_membre_receive`;");

    $rqt_1->execute();
    $result_1 = $rqt_1->get_result();
    $_list_id_innonce_1 = $result_1->fetch_all();

    $rqt_2->execute();
    $result_2 = $rqt_2->get_result();
    $_list_id_innonce_2 = $result_2->fetch_all();

    $_list_id_innonce_3 = $_list_id_innonce_1;

    foreach ($_list_id_innonce_2 as $i) {
        if (!in_array($i, $_list_id_innonce_3)) {
            array_push($_list_id_innonce_3, $i);
        }
    }

    foreach ($_list_id_innonce_3 as $i) {
        $rqt_3 = $con->prepare("SELECT * FROM `membre` WHERE `id_membre` = " . $i[0] . ";");

        $rqt_3->execute();
        $result_3 = $rqt_3->get_result();
        while ($row = $result_3->fetch_assoc()) {
            echo
            '  <button type="button" onclick="contact_click(' . $i[0] . ', \'' . $row['user_name'] . '\');" class="friend-drawer friend-drawer--onhover">
                    <img class="profile-image"
                        src="./images/profile/' . $row['img'] . '" alt="">
                    <div class="text">
                        <h6>' . $row['user_name'] . '</h6>
                        <p class="text-muted">';

            $rqt_message = $con->prepare("SELECT * FROM `chats` WHERE `id_membre_send` = " . $_SESSION['id_membre'] . " OR `id_membre_receive` = " . $_SESSION['id_membre'] . ";");

            $rqt_message->execute();
            $result = $rqt_message->get_result();
            $messsge = "";
            $i = "";
            while ($row_message = $result->fetch_assoc()) {
                if ($row_message['id_membre_send'] == $row['id_membre'] || $row_message['id_membre_receive'] == $row['id_membre']) {
                    $message = $row_message['message'];

                    if ($row_message['id_membre_send'] == $row['id_membre'] && $row_message['id_membre_receive'] == $_SESSION['id_membre'])
                        $i = "";
                    else  if ($row_message['id_membre_receive'] == $row['id_membre'] && $row_message['id_membre_send'] == $_SESSION['id_membre'])
                        $i = 'Vous: ';
                    // } else if ($row['id_membre_receive'] == $row['id_membre'] && $row['id_membre_send'] == $_GET['id_membre']) {
                    //     echo '<div class="row no-gutters">
                    //             <div class="col-md-3">
                    //                 <div class="chat-bubble chat-bubble--left">
                    //                 ' . $row['message'] . '
                    //                 </div>
                    //             </div>
                    //         </div>';
                    // }

                }

            }
            
            echo $i . $message;

            echo '</p>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </button>
                <hr>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetBoo - Chat</title>

    <!--
    - logo 
  -->
    <link rel="shortcut icon" href="./assets/images/logo/logo1.svg" type="image/x-icon">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/Boostrap.min.css">

    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="stylesheet" href="./assets/css/preloader_style.css">
    <link rel="stylesheet" href="./assets/css/chat.css">

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">

    <style>
        .friend-drawer--onhover:focus {
            border: 0px;
        }

        .friend-drawer--onhover {
            border: 0px;
            width: 100%;
            text-align: left;
        }
    </style>

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
            .desktop-menu-category-list, .sidebar, .has-scrollbar, .div_ggg{
                display: none;
            }
        </style>';

    ?>

    <div class="container-msg">
        <div class="row no-gutters">
            <div class="col-md-4 border-right">
                <div class="search-box">
                    <div class="input-wrapper">
                        <i class="material-icons">search</i>
                        <input placeholder="Search here" type="text">
                    </div>
                </div>

                <?php
                remplire_contact();
                ?>
            </div>
            <div class="col-md-8" id="col_md_8">
                <img src="./assets/images/chat/welcome_chat.svg" class="welcome-img">
            </div>
        </div>
    </div>


    <!--
     FOOTER
  -->

    <?php
    include "footer.php";
    ?>

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
    <!-- <script src="./jquery.ajaxchimp.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function contact_click(id_membre, name) {
            // afficher_header_name(name);
            remplire_message(id_membre);
        }

        // function afficher_header_name(name) {
        //     document.getElementById("div_name_title").innerHTML = name;
        // }

        function remplire_message(id_membre) {
            $.ajax({
                url: './remplire_message.php',
                type: 'GET',
                data: '&id_membre=' + id_membre,
                success: function(data) {
                    document.getElementById("col_md_8").innerHTML = data;
                    // document.getElementById("chat_panel").innerHTML = data;
                }
            });
        };

        function message_send(id_membre) {
            message = document.getElementById("inputt").value;
            $.ajax({
                url: './message_send.php',
                type: 'GET',
                data: '&id_membre=' + id_membre + '&message=' + message,
            });
            remplire_message(id_membre);
        };
    </script>
</body>

<!--
    - custom js link
  -->
<script src="./assets/js/heder.js"></script>
<script src="./assets/js/menuToggle.js"></script>
<script src="./assets/js/preloader.js"></script>
<!-- <script src="./assets/js/emoji-button-3.0.3.min.js"></script>
    <script src="./assets/js/emoji_script.js"></script> -->

</html>
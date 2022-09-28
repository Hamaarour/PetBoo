<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

session_start();


$con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

if (isset($_GET['id_membre'])) {
    $rqt = $con->prepare("SELECT * FROM `membre` WHERE `id_membre` = " . $_GET['id_membre'] . ";");

    $rqt->execute();
    $result = $rqt->get_result();
    while ($row = $result->fetch_assoc()) { ?>
    
    <div class="settings-tray">
        <div class="friend-drawer no-gutters friend-drawer--grey">
            <img class="profile-image" src="./images/profile/<?php  echo $row['img'] ; ?>" alt="">
            <div class="text">
                <h6 id="div_name_title"> <?php echo $row['user_name'] ; ?> </h6>
            </div>

        </div>
    </div>
    <div class="chat-panel" id="chat_panel">
    <?php }
    $rqt = $con->prepare("SELECT * FROM `chats` WHERE `id_membre_send` = " . $_SESSION['id_membre'] . " OR `id_membre_receive` = " . $_SESSION['id_membre'] . ";");

    $rqt->execute();
    $result = $rqt->get_result();
    while ($row = $result->fetch_assoc()) {
        if ($row['id_membre_send'] == $_SESSION['id_membre'] && $row['id_membre_receive'] == $_GET['id_membre']) {?>
            <div class="row no-gutters">
                    <div class="col-md-3 offset-md-9">
                        <div class="chat-bubble chat-bubble--right"><?php echo$row['message'];?>
                        </div>
                    </div>
                </div>
        <?php } else if ($row['id_membre_receive'] == $_SESSION['id_membre'] && $row['id_membre_send'] == $_GET['id_membre']) { ?>
            <div class="row no-gutters">
                    <div class="col-md-3">
                        <div class="chat-bubble chat-bubble--left"><?php echo$row['message'];?>
                        </div>
                    </div>
                </div>
        <?php }
    }
    ?>
    <div class="row">
            <div class="col-12">
                <div class="chat-box-tray">
                    <button id="emoji-button" class="btn-emoji">
                        <i class="material-icons">sentiment_very_satisfied</i>
                    </button>
                    <input type="text" placeholder="Tapez votre message ici..." id="inputt" class="input-typing">
                    <?php
                    echo '<i class="material-icons" onclick="message_send(' . $_GET['id_membre'] . ');">send</i>';
                    ?>
                </div>
            </div>
        </div>
    
    <script src="./assets/js/emoji-button-3.0.3.min.js"></script>
    <script src="./assets/js/emoji_script.js"></script>

<?php
}
?>
</body>
</html>

<!-- <?php

// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------

// <?php

// session_start();


// $con = mysqli_connect('localhost', 'root', '', 'gestion_animaux');

// if (isset($_GET['id_membre'])) {
//     $rqt = $con->prepare("SELECT * FROM `membre` WHERE `id_membre` = " . $_GET['id_membre'] . ";");

//     $rqt->execute();
//     $result = $rqt->get_result();
//     while ($row = $result->fetch_assoc()) {
//     echo'<div class="settings-tray">
// <div class="friend-drawer no-gutters friend-drawer--grey">
// <img class="profile-image" src="./images/profile/' . $row['user_name'] . '.svg" alt="">
// <div class="text">
//     <h6 id="div_name_title">' . $row['user_name'] . '</h6>
// </div>

// </div>
// </div>
// <div class="chat-panel" id="chat_panel">';
//     }
//     $rqt = $con->prepare("SELECT * FROM `chats` WHERE `id_membre_send` = " . $_SESSION['id_membre'] . " OR `id_membre_receive` = " . $_SESSION['id_membre'] . ";");

//     $rqt->execute();
//     $result = $rqt->get_result();
//     while ($row = $result->fetch_assoc()) {
//         if ($row['id_membre_send'] == $_SESSION['id_membre'] && $row['id_membre_receive'] == $_GET['id_membre']) {
//             echo '<div class="row no-gutters">
//                     <div class="col-md-3 offset-md-9">
//                         <div class="chat-bubble chat-bubble--right">
//                         ' . $row['message'] . '
//                         </div>
//                     </div>
//                 </div>';
//         } else if ($row['id_membre_receive'] == $_SESSION['id_membre'] && $row['id_membre_send'] == $_GET['id_membre']) {
//             echo '<div class="row no-gutters">
//                     <div class="col-md-3">
//                         <div class="chat-bubble chat-bubble--left">
//                         ' . $row['message'] . '
//                         </div>
//                     </div>
//                 </div>';
//         }
//     }
//     echo '<div class="row">
//             <div class="col-12">
//                 <div class="chat-box-tray">
//                     <button id="emoji-button" class="btn-emoji">
//                         <i class="material-icons">sentiment_very_satisfied</i>
//                     </button>
//                     <input type="text" placeholder="Tapez votre message ici..." id="inputt" class="input-typing">

//                     <i class="material-icons" onclick="message_send(' . $_GET['id_membre'] . ');">send</i>
//                 </div>
//             </div>
//         </div>';
    
//     echo'<script src="./assets/js/emoji-button-3.0.3.min.js"></script>
//     <script src="./assets/js/emoji_script.js"></script>';
//         // echo'</div>';
    
// // echo '345';
// }
// // echo '012';
?> -->
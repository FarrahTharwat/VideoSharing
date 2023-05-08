<?php
include 'ManageReact.php';
include 'ManageHistory.php';
 echo $_POST['userID'];
if (isset($_POST['action']) && $_POST['action'] == 'addReacts') {
    // Call the addReact function and echo a message

    addReacts($_POST['userID'], $_POST['videoID'], $_POST['react']);
    echo "React added successfully";
    echo"wow";
}

function addReacts($userID, $videoID, $react)
{
    $manage = new ManageReact();
    $manage->addReact($videoID, $userID, $react);
}
 echo $_POST['userID'];



 if (isset($_POST['action']) && $_POST['action'] == 'wow') {
     // Call the wow function and echo a message
 wow($_POST['userID'], $_POST['videoID']);
 echo "Wow, the wow function was called with name ".$_POST['userID']." and age ".$_POST['videoID']."!";
 }
 
 
 function wow($userID, $videoID)
 {
     $kk = new ManageHistory();
     $kk->remove($userID,$videoID);
     echo "wooooooooow";
 }
 
 
 
 
 if (isset($_POST['action']) && $_POST['action'] == 'weew') {
     // Call the wow function and echo a message
 weew($_POST['userID']);
 echo "Wow, the wow function was called with name ".$_POST['userID']." and age ".$_POST['videoID']."!";
 }
 
 echo $uid;
 function weew($userID)
 {
     $kk = new ManageHistory();
     $kk->delete($userID);
     echo "wooooooooow";
 }
 ?>

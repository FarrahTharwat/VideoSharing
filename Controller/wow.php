<?php
require_once 'Database.php';
require_once 'ManageReact.php';
require_once 'ManageHistory.php';
require_once 'ManageSubscribtion.php';


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
///////////

if (isset($_POST['action']) && $_POST['action'] == 'addReacts') {
    // Call the addReact function and echo a message

    addReacts($_POST['userID'], $_POST['videoID'], $_POST['react']);
    echo "React added successfully";
    echo"wow";
}

function addReacts($userID, $videoID, $react)
{
    $manage = new ManageReact();
    $manage->toggleReact($videoID, $userID, $react);
}

if (isset($_POST['action']) && $_POST['action'] == 'subscribe') {
    // Call the addReact function and echo a message

    toggleSubscribe($_POST['userID'],$_POST['channelID'] );

}
function toggleSubscribe($userID,$channelID)
{
    $manage = new  ManageSubscribtion();
    $manage->addsubscription($userID,$channelID);
}


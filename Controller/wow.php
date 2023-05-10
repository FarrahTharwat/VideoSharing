<?php
require_once 'Database.php';
require_once 'ManageReact.php';
require_once 'ManageHistory.php';
require_once 'ManageSubscribtion.php';
require_once 'ManagePlaylist.php';


 if (isset($_POST['action']) && $_POST['action'] == 'wow') {
     // Call the wow function and echo a message
 wow($_POST['userID'], $_POST['videoID']);

 }
 
 
 function wow($userID, $videoID)
 {
     $kk = new ManageHistory();
     $kk->remove($userID,$videoID);

 }
 
 
 
 
 if (isset($_POST['action']) && $_POST['action'] == 'weew') {
     // Call the wow function and echo a message
 weew($_POST['userID']);

 }
 

 function weew($userID)
 {
     $kk = new ManageHistory();
     $kk->delete($userID);


 }
///////////
function RemoveFromPlaylits($pID,$uID)
 {
     $kk = new ManagePlaylist();
     $kk->remove($pID,$uID);
     echo 'wowwow'.$pID,$uID;
 }
if (isset($_POST['action']) && $_POST['action'] == 'RemoveFromPlaylits') {
    // Call the addReact function and echo a message

    RemoveFromPlaylits($_POST['PlaylistID'], $_POST['VideoID']);
   echo 'yallawy'.$pID,$uID;

}

function RemovePlaylits($pID)
 {
     $kk = new ManagePlaylist();
     $kk->delete($pID);
     echo 'wowwow'.$pID;
 }
if (isset($_POST['action']) && $_POST['action'] == 'RemovePlaylits') {
    // Call the addReact function and echo a message

    RemovePlaylits($_POST['PlaylistID']);
   echo 'yallawy'.$pID;

}

if (isset($_POST['action']) && $_POST['action'] == 'addReacts') {
    // Call the addReact function and echo a message

    addReacts($_POST['userID'], $_POST['videoID'], $_POST['react']);
   

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
    $manage->toggleSubscription($userID,$channelID);
}
if (isset($_POST['action']) && $_POST['action'] == 'bell') {
    // Call the addReact function and echo a message

    toggleBill($_POST['userID'],$_POST['channelID'] );

}
function toggleBill($userID,$channelID)
{
    $manage = new ManageSubscribtion();
    $manage->toggleBell($userID,$channelID);

}


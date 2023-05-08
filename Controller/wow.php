<?php
include 'ManageReact.php';
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

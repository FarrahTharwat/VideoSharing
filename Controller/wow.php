
<?php
include 'ManageHistory.php';
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

?>





<?php
include 'Database.php';
class ManageSubscribtion
{
    public function addsubscription($SubscriberID,$ChannelID)
    {
        $database = new Database();
        $conn = $database->getConn();

        $query ="INSERT INTO subscribed values ('$SubscriberID','$ChannelID',0)";
        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

// Close the database connection
        $conn->close();
    }
    public function deletesubscription($SubscriberID,$ChannelID)
    {
        $database = new Database();
        $conn = $database->getConn();

        $query ="DELETE FROM subscribed WHERE SubscriberID='$SubscriberID' and ChannelID='$ChannelID'";
        if ($conn->query($query) === TRUE) {
            echo "record Deleted successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

// Close the database connection
        $conn->close();
    }
}
$manage=new managesubscribtion;
$manage->deletesubscription(1,2);
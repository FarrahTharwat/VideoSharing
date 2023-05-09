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
    public function toggleSubscription($subscriberID, $channelID)
    {
        $database = new Database();
        $conn = $database->getConn();

        // Check if the record already exists
        $checkQuery = "SELECT * FROM subscribed WHERE SubscriberID='$subscriberID' AND ChannelID='$channelID'";
        $result = $conn->query($checkQuery);

        if ($result->num_rows > 0) {
            // If the record exists, delete it
            $deleteQuery = "DELETE FROM subscribed WHERE SubscriberID='$subscriberID' AND ChannelID='$channelID'";
            if ($conn->query($deleteQuery) === TRUE) {
                echo "Subscription cancelled successfully";
            } else {
                echo "Error: " . $deleteQuery . "<br>" . $conn->error;
            }
        } else {
            // If the record doesn't exist, add it
            $addQuery = "INSERT INTO subscribed VALUES ('$subscriberID','$channelID',0)";
            if ($conn->query($addQuery) === TRUE) {
                echo "Subscription added successfully";
            } else {
                echo "Error: " . $addQuery . "<br>" . $conn->error;
            }
        }

        // Close the database connection
        $conn->close();
    }
}
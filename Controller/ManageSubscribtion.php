<?php
include 'Database.php';
class ManageSubscribtion
{
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
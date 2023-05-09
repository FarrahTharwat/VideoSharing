function triggerLikeFunction() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Open a new AJAX request
    xhr.open("GET", "http://localhost/VideoSharing/View/video-page.php?action=wow", true);

    // Define the callback function for when the AJAX request completes
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the PHP function
            console.log(xhr.responseText);
        }
    };

    // Send the AJAX request
    xhr.send();
}

// Get a reference to the button element
var myButton = document.getElementById("but");
consle.log(myButton);
// Add an event listener to the button
myButton.addEventListener("click", function() {
    triggerWowFunction();
    console.log("wow");
});
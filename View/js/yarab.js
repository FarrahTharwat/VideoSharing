function triggerWowFunction(userID, videoID) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Open a new AJAX request
    xhr.open("POST", "../Controller/wow.php", true);

    // Define the callback function for when the AJAX request completes
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the PHP function
            console.log(xhr.responseText);
        }
    };

    // Create a new FormData object and append the data you want to send
    var formData = new FormData();
    formData.append("userID", userID);
    formData.append("videoID", videoID);
    formData.append("action", 'wow');
    // Send the AJAX request with the form data
    xhr.send(formData);
}


function triggerWeewFunction(userID) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
        console.log(userID);
    // Open a new AJAX request
    xhr.open("POST", "../Controller/wow.php", true);

    // Define the callback function for when the AJAX request completes
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the PHP function
            console.log(xhr.responseText);
        }
    };

    // Create a new FormData object and append the data you want to send
    var formData = new FormData();
    formData.append("userID", userID);
    formData.append("action", 'weew');
    // Send the AJAX request with the form data

    xhr.send(formData);

}
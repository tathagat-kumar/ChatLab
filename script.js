// Add event listener to the button
document.getElementById("sendButton").addEventListener("click", function() {
    // Call your JavaScript method first
    sendMessage();

    // Then, make an asynchronous call to the PHP script
    fetch('save_message.php', {
        method: 'POST',
        body: new URLSearchParams({
            //'messageId': messageId,
            'msgTo': usernameReceiver,
            'msgFrom': usernameSender,
            'message': message,
            'timestamp': timestamp
        })
    })
    .then(response => {
        if (response.ok) {
            return response.text(); // or response.json() if expecting JSON data
        } else {
            throw new Error('Failed to fetch data from PHP script');
        }
    })
    .then(data => {
        // Process the response data if needed
        console.log('Data received from PHP script:', data);
    })
    .catch(error => {
        console.error('Error fetching data from PHP script:', error);
    });
});


function sendMessage() {
    // Your JavaScript method logic here
	    var usernameSender = document.getElementById("usernameInputSender").value;
    var usernameReceiver = document.getElementById("usernameInputReceiver").value;
    var message = document.getElementById("messageInput").value;
    var chatBox = document.getElementById("chatBox");
    var timestamp = new Date().toLocaleString();

    if (usernameSender && usernameReceiver && message) {
        // Create a unique message ID
        var messageId = generateMessageId();
        
        // Append the message to the chat box
        var messageElement = document.createElement("div");
        messageElement.innerHTML = "<strong>" + usernameSender + "</strong>: " + message + " <span>(" + timestamp + ")</span>";
        chatBox.appendChild(messageElement);
        
        // Clear the message input field
        document.getElementById("messageInput").value = "";
        console.log(messageId);
        console.log(usernameReceiver);
        console.log(usernameSender);
        console.log(message);
        console.log(timestamp);
        // Send message data to the server for database storage
        //saveMessageToDatabase(messageId, usernameReceiver, usernameSender, message, timestamp);
    } else {
        alert("Please enter both username and message.");
    }
}

function generateMessageId() {
    // Generate a random number between 100000 and 999999 (inclusive)
    return Math.floor(100000 + Math.random() * 900000);
}


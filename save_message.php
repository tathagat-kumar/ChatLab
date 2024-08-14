<?php
// Establish a database connection
$servername = "localhost"; // Change this to your database server name
$username = "id22105477_admin"; // Change this to your database username
$password = "Tiger#123"; // Change this to your database password
$dbname = "id22105477_sys_info"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the message details from the POST request
$messageId = $_POST['messageId'];
$msgTo = $_POST['usernameInputReceiver1']; // Assuming you pass the user_id of the recipient
$msgFrom = $_POST['usernameInputSender1']; // Assuming you pass the user_id of the sender
$message = $_POST['messageInput'];
$timestamp = $_POST['timestamp']; // Assuming you pass the timestamp

// Get the current date
$currentDate = date("Y-m-d");

// Get the current time
$currentTime = date("H:i:s");

echo "Message ID from save_message.php: " . $messageId . "<br>";
echo "Message To from save_message.php: " . $msgTo . "<br>";
echo "Message From from save_message.php: " . $msgFrom . "<br>";
echo "Message from save_message.php: " . $message . "<br>";
echo "Timestamp from save_message.php: " . $timestamp . "<br>";


// Prepare a SQL statement to insert the message details into the MSG_INFO table
$sql = "INSERT INTO MSG_INFO (`MSG_ID`, `MSG_TO`, `MSG_FROM`, `MSG_TEXT`, `MSG_TIME`, `MSG_DATE`,`MSG_TIMESTAMP`) 
        VALUES (485341, $msgTo, $msgFrom, $message, $currentTime, $currentDate, $timestamp)";


// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Message saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

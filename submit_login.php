<?php
// Database connection
$servername = "localhost";
$username = "id22105477_admin"; // Your MySQL username
$password = "Tiger#123"; // Your MySQL password
$dbname = "id22105477_sys_info"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form submission
    $input_username = $_POST['login_username'];
    $input_password = $_POST['login_password'];

    // Prepare SQL statement to retrieve user from database
    $sql = "SELECT * FROM USER_INFO WHERE USER_NAME = '$input_username' AND USER_PASSWORD = '$input_password'";

    // Execute SQL statement
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        // User exists, display appropriate information
       // $row = $result->fetch_assoc();
        //echo "<h2>Login Successful!</h2>";
        //echo "<p>Welcome back, " . $row["USER_NAME"] . "!</p>";
        // Display additional user information as needed
         // User exists, redirect to the new page
       header("location: success_login.html");
        exit; // Stop further execution of PHP script
        
    } else {
        // User does not exist or incorrect credentials
        echo "<h2>Login Failed</h2>";
        echo "<p>Incorrect username or password. Please try again.</p>";
    }
}

// Close database connection
$conn->close();
?>

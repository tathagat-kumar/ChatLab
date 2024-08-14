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

echo "You are on Admin Page";

// If admin credentials are submitted, retrieve records from database
//if(isset($_POST['admin_username']) && isset($_POST['admin_password'])) {
    // Retrieve data from form submission
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Check if admin credentials are correct
    if($admin_username === 'admin' && $admin_password === 'tiger') {
        // Prepare SQL statement to retrieve records from USER_INFO table
        $sql = "SELECT * FROM USER_INFO";

        // Execute SQL statement
        $result = $conn->query($sql);

        // Display records in tabular form
        if ($result->num_rows > 0) {
            echo "<h2>User Information:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Username</th><th>Password</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["USER_NAME"]. "</td><td>" . $row["USER_PASSWORD"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
    } else {
        echo "Incorrect admin credentials";
    }
//}

// Close database connection
$conn->close();
?>

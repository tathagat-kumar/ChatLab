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

// If username and password are submitted, insert into database
if(isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve data from form submission
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Generate a unique user ID
    $userid = generateUniqueNumber(); // Call the JavaScript function to generate the unique number
    
    $sql_count = "SELECT COUNT(USER_NAME) AS total_records FROM USER_INFO WHERE USER_ID = $userid";
    //echo $sql_count;
    //echo $userid;
    
    // Execute the query
    $result = $conn->query($sql_count);

   // Check if the query was successful 
    if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Store the count of records in a variable
    $total_records = $row['total_records'];

    // Print the count of records
   // echo "Total Records: " . $total_records;
}
   
    if($total_records == 0){
    // Prepare SQL statement to insert data into database
   // $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
   $sql = "INSERT INTO USER_INFO (`USER_NAME`, `USER_PASSWORD`,`USER_ID`) VALUES ('$username','$password','$userid')";
    }
    else {
        echo "Try again after sometime,(records already exist!)";
    }

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Congrates you are now registered with us!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
// Function to generate a unique 5-digit number (placeholder)
function generateUniqueNumber() {
    // Generate a random 5-digit number
    return mt_rand(10000, 99999);
}
?>

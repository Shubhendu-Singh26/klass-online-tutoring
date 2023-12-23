<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data based on the selected role
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Additional fields based on the role
    if ($role === 'student') {
        $class = $_POST['class'];
        $password = $_POST['password'];

        // Save data to the database or perform other actions
        // Insert the data into the student table in your database
        // Example: 
        $sql = "INSERT INTO studentdata (name, email, mobile, class, password) VALUES ('$name', '$email', '$mobile', '$class', '$password')";
    } elseif ($role === 'tutor') {
        $qualification = $_POST['qualification'];
        $courses = $_POST['courses'];

        // Save data to the database or perform other actions
        // Insert the data into the tutor table in your database
        // Example: 
        $sql = "INSERT INTO tutordata (name, email, mobile, qualification, courses) VALUES ('$name', '$email', '$mobile', '$qualification', '$courses')";
    }

    // Connect to your database using the provided PHP code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "form";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Execute the SQL query and close the connection
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
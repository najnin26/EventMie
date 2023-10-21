<?php
if(isset($_POST['submit'])){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_db";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user inputs for security
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Attempt insert query execution
    $sql = "INSERT INTO contact (name, email, number, subject, message) VALUES ('$name', '$email', '$number', '$subject', '$message')";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Your message has been sent successfully.')</script>";
        header("refresh:0,url=contact.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>

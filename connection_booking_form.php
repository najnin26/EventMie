<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the form data
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $event = $_POST["event"];
  $date = $_POST["date"];
  $time = $_POST["time"];
  $guests = $_POST["guests"];
  $comments = $_POST["comments"];
  $equipment = implode(",", $_POST["equipment"]);
  $food = implode(",", $_POST["food"]);
  $decoration = implode(",", $_POST["decoration"]);
  $invitation_card = implode(",", $_POST["invitation_card"]);

  // Insert the form data as pending
  $sql = "INSERT INTO booking_form (firstName, lastName, email, phone, event, date, time, guests, comments, equipment, food, decoration, status , invitation_card)
          VALUES ('$firstName', '$lastName', '$email', '$phone', '$event', '$date', '$time', '$guests', '$comments', '$equipment', '$food', '$decoration', 'pending' ,'$invitation_card')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Booking request submitted successfully.'); window.location.href='book.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
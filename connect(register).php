<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if ($password !== $confirm_password) {
    echo "Error: Passwords do not match";
    exit;
  }
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$hashed_confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);
$conn = new mysqli('localhost', 'root', '', 'project1');
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // User already exists, so show an error message
  echo "Error: User already exists";
  exit;
} else {
  // Insert the new user into the database
  $sql = "INSERT INTO user (username, email, password ,confirm_password) VALUES ('$username', '$email', '$hashed_password','$hashed_confirm_password')";
  if (mysqli_query($conn, $sql)) {
    // Registration successful, so redirect to the success page
    header('Location: popup.php');
    exit;
  } else {
    // Error inserting the user into the database, so show an error message
    echo "Error: " . mysqli_error($conn);
    exit;
  }
}

// Close the database connection
mysqli_close($conn);
?>
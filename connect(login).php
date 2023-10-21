<?php
if (!isset($_POST['email']) || empty($_POST['email'])) {
    echo "Email is required";
    exit;
}
if (!isset($_POST['password']) || empty($_POST['password'])) {
    echo "Password is required";
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'project1');

// Retrieve the user with the given email
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

// Check if the user was found
if (mysqli_num_rows($result) > 0) {
  // Verify the password
  $row = mysqli_fetch_assoc($result);
  if (password_verify($password, $row['Password'])) {
    // Password is correct, so start a new session and redirect to the dashboard
    session_start();
    $_SESSION['user_id'] = $row['id'];
    header('Location: p.php');
    exit;
  } else {
    // Password is incorrect, so show an error message
    echo "Error: Incorrect password";
    exit;
  }
} else {
  // User was not found, so show an error message
  echo "Error: User not found";
  exit;
}

// Close the database connection
mysqli_close($conn);
?>

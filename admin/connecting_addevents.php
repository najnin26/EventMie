<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "user_db");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the event name
    $eventName = $_POST['event_name'];

    // Process the uploaded event image
    $eventImage = $_FILES['event_image']['name'];
    $eventImageTmp = $_FILES['event_image']['tmp_name'];
    $eventImageDir = "images/"; // Directory to store the event images

    // Move the uploaded image to the target directory
    move_uploaded_file($eventImageTmp, $eventImageDir . $eventImage);

    // Insert the event details into the database
    $sql = "INSERT INTO events (event_name, event_image) VALUES ('$eventName', '$eventImage')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Event added successfully.'); window.location.href='add-event.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

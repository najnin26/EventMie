<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the booking ID and status are provided
    if (isset($_POST['bookingId']) && isset($_POST['status'])) {
        $bookingId = $_POST['bookingId'];
        $status = $_POST['status'];

        // Perform the database update
        $sql = "UPDATE booking_form SET status = '$status' WHERE id = $bookingId";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Update successful
            header("Location: edit_booking.php");
            exit;
        } else {
            // Update failed
            echo "<p>Failed to update booking status.</p>";
        }
    } else {
        // Invalid parameters
        echo "<p>Invalid parameters.</p>";
    }
} else {
    // Form not submitted
    echo "<p>No form submitted.</p>";
}
?>







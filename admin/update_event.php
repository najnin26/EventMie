
<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted form data
    $eventId = $_POST['event_id'];
    $eventName = $_POST['event_name'];

    // Check if a new image file is uploaded
    if ($_FILES['event_image']['name']) {
        $imagePath = "images/";
        $imageName = $_FILES['event_image']['name'];
        $imageTmp = $_FILES['event_image']['tmp_name'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate the image file
        if (in_array($imageExtension, $allowedExtensions)) {
            // Generate a unique image filename
            $newImageName = uniqid('event_', true) . '.' . $imageExtension;
            $newImagePath = $imagePath . $newImageName;

            // Move the uploaded image to the target directory
            if (move_uploaded_file($imageTmp, $newImagePath)) {
                // Update the event information with the new image path
                $query = "UPDATE events SET event_name = '$eventName', event_image = '$newImageName' WHERE event_id = '$eventId'";
            } else {
                // Handle the case when image upload fails
                echo "Error uploading image.";
            }
        } else {
            // Handle the case when an invalid image format is uploaded
            echo "Invalid image format. Only JPG, JPEG, PNG, and GIF formats are allowed.";
        }
    } else {
        // Update the event information without modifying the image
        $query = "UPDATE events SET event_name = '$eventName' WHERE event_id = '$eventId'";
    }

    // Execute the update query
    if (isset($query) && mysqli_query($conn, $query)) {
        // Redirect to the events page upon successful update
        header("Location: add-event.php");
        exit();
    } else {
        // Handle the case when update fails
        echo "Error updating event: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

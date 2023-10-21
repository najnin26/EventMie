<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");
if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $deleteQuery = "DELETE FROM user_form WHERE id = '$userId'";
    mysqli_query($conn, $deleteQuery);
    header("Location: user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Booking</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style(book).css">
</head>
<body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <a href="#" id="profile-icon"><span class="material-icons-outlined">account_circle</span></a>
          <div class="admin-card">
              <p>Name: Admin</p>
              <p>Email: admin123@gmail.com</p>
          </div>
        </div>
      </header>
      <!-- End Header -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">groups </span> Admin Panel
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="index.php">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="add-event.php">
              <span class="material-icons-outlined">event</span>Add events
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="upcoming_event.php">
              <span class="material-icons-outlined">category</span>Upcoming Events
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="user.php">
              <span class="material-icons-outlined">groups</span> Users
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="contact.php">
              <span class="material-icons-outlined">message</span>Messages 
            </a>
          </li>

          <li class="sidebar-list-item">
            <a href="review.php">
              <span class="material-icons-outlined">reviews</span>Reviews 
            </a>
          </li>
          
          <li class="sidebar-list-item">
            <a href="booking.php">
              <span class="material-icons-outlined">book</span>Booking
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">payment</span>Payment
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->
      <!-- Main -->
      <main class="main">
    <div class="container-b">
        <h1>Edit Booking</h1>

        <?php
        // Check if the booking ID is provided
        if (isset($_GET['id'])) {
            $bookingId = $_GET['id'];

            // Fetch the booking details from the database
            $sql = "SELECT * FROM booking_form WHERE id = $bookingId";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $booking = mysqli_fetch_assoc($result);
                ?>
                <br>
                <h3>Booking Details:</h3>
                <p><strong>ID:</strong> <?php echo $booking['id']; ?></p>
                <p><strong>First Name:</strong> <?php echo $booking['firstName']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $booking['lastName']; ?></p>
                <p><strong>Email:</strong> <?php echo $booking['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $booking['phone']; ?></p>
                <p><strong>Event:</strong> <?php echo $booking['event']; ?></p>
                <p><strong>Date:</strong> <?php echo $booking['date']; ?></p>
                <p><strong>Time:</strong> <?php echo $booking['time']; ?></p>
                <p><strong>Guests:</strong> <?php echo $booking['guests']; ?></p>
                <p><strong>Comments:</strong> <?php echo $booking['comments']; ?></p>
                <p><strong>Equipment:</strong> <?php echo $booking['equipment']; ?></p>
                <p><strong>Food:</strong> <?php echo $booking['food']; ?></p>
                <p><strong>Decoration:</strong> <?php echo $booking['decoration']; ?></p>

                <?php
                // Check if there is an event on the selected date
                $selectedDate = $booking['date'];
                $eventCheckSql = "SELECT * FROM booking_form WHERE date = '$selectedDate' AND id != $bookingId";
                $eventCheckResult = mysqli_query($conn, $eventCheckSql);

                if (mysqli_num_rows($eventCheckResult) > 0) {
                    echo '<script>alert("There is an event on the selected date. Please choose a different date.");</script>';
                }
                ?>

                <h3>Edit Status:</h3>
                <form action="update_status.php" method="POST" class="status-form">
                    <input type="hidden" name="bookingId" value="<?php echo $booking['id']; ?>">
                    <select name="status" class="status-select">
                        <option value="pending" <?php if ($booking['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="approved" <?php if ($booking['status'] == 'approved') echo 'selected'; ?>>Approved</option>
                    </select>
                    <button type="submit" class="update-button" onclick="alert('Booking status updated successfully.');">Update</button>
                </form>
            <?php } else {
                echo "<p>This booking is edited.</p>";
            }
        } else {
            echo "<p>This booking is edited.</p>";
        }
        ?>
    </div>
</main>
      <!-- End Main -->
    </div>
    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
</body>
</html>

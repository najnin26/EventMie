<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");

// Check if the event ID is provided
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    // Retrieve the event information from the database
    $query = "SELECT * FROM events WHERE event_id = '$eventId'";
    $result = mysqli_query($conn, $query);
    $event = mysqli_fetch_assoc($result);
} else {
    // Redirect to the events page if no event ID is provided
    header("Location: add-event.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style(addevent).css">
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

            <!-- Edit Event Form -->
<div class="edit-event-container">
    <h2>Edit Event</h2>
    <form action="update_event.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>">
        <div class="form-group">
            <label for="event_name">Event Name:</label>
            <br>
            <input type="text" name="event_name" id="event_name" value="<?php echo $event['event_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="event_image">Event Image:</label>
            <br>
            <input type="file" name="event_image" id="event_image" accept="image/*">
        </div>
        <button type="submit">Update Event</button>
        <button type="submit"><a href="add-event.php" style="text-decoration: none ; font-size: 16px; color: black;">Not Now</a></button>
    </form>
</div>
<!-- End Edit Event Form -->

            <!-- End Edit Event Form -->
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

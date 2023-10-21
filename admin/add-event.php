<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");
$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);

// Delete event
if (isset($_GET['delete'])) {
    $eventId = $_GET['delete'];
    $deleteQuery = "DELETE FROM events WHERE event_id = '$eventId'";
    mysqli_query($conn, $deleteQuery);
    header("Location: add-event.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Add Events</title>

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
        <!-- Header content here -->
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
      
      <!-- Sidebar -->
      <aside id="sidebar">
        <!-- Sidebar content here -->
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
      <main class="main-a">
  <div class="container-a">
    <div class="form-card-a">
      <h2 class="form-heading-a">Add Event</h2>
      <form action="connecting_addevents.php" method="POST" enctype="multipart/form-data">
        <div class="form-group-a">
          <label for="event_name">Event Name:</label>
          <input type="text" name="event_name" id="event_name" required>
        </div>
        <div class="form-group-a">
          <label for="event_image">Event Image:</label>
          <input type="file" name="event_image" id="event_image" required accept="image/*">
        </div>
        <button class="submit-button-a">Add Event</button>
      </form>
    </div>
    <div class="table-container-a">
      <!-- Event Table -->
      <h2 class="form-heading-a">Added Events</h2>
      <table class="event-table-a">
        <thead>
          <tr>
            <th>ID</th>
            <th>Event Name</th>
            <th>Event Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $fetch['event_id']; ?></td>
              <td><?php echo $fetch['event_name']; ?></td>
              <td>
                <?php
                 $imagePath = "images/" . $fetch['event_image'];
                if (file_exists($imagePath)) {
                  $imageInfo = pathinfo($imagePath);
                  $imageExtension = strtolower($imageInfo['extension']);
                  if (in_array($imageExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo '<img src="' . $imagePath . '" alt="Event Image">';
                  } else {
                    echo 'Invalid Image Type';
                  }
                } else {
                  echo 'Image not found';
                }
                ?>
              </td>
              <td>
              <div class="action-buttons">
            <a href="?delete=<?php echo $fetch['event_id']; ?>" onclick="return confirm('Are you sure you want to delete this event?')" class="delete-button-a">Delete</a>
            <a href="edit_event.php?id=<?php echo $fetch['event_id']; ?>" class="edit-button">Edit</a>
          </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
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

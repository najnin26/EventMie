<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");
$query = "SELECT * FROM contact";
$result = mysqli_query($conn, $query);

// Delete message
if (isset($_GET['delete'])) {
    $messageId = $_GET['delete'];
    $deleteQuery = "DELETE FROM contact WHERE id = '$messageId'";
    mysqli_query($conn, $deleteQuery);
    header("Location: messages.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Contact</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <!-- Header content goes here -->
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
        <!-- Sidebar content goes here -->
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
      <main class="main-container">
      <h2>MESSAGES</h2>
        <div class="container">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card-m">
              <div class="card-title">Name : <?php echo $row['name']; ?></div>
              <div class="card-content">Email : <?php echo $row['email']; ?></div>
              <div class="card-content">Subject : <?php echo $row['subject']; ?></div>
              <div class="card-content">Number : <?php echo $row['number']; ?></div>
              <div class="card-content">Message : <?php echo $row['message']; ?></div>
              <div class="card-actions">
                <form method="GET" action="">
                  <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this message?')" class="delete-button">Delete</button>
                </form>
              </div>
            </div>
          <?php } ?>
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

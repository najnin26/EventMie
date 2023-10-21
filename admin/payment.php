<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");
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
  <style>
.event-table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #ddd;
  margin-top: 20px;
}
.event-table th {
  background-color: #263043;
  color:white;
  border: 1px solid white;
  padding: 10px;
  text-align: left;
  text-align: center;
}
.event-table td {
  border: 1px solid #ddd;
  color: white;
  padding: 10px;
  text-align: center;
}
  </style>  
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
  <div class="container">
    <h1 style="color: white;">Payments</h1>

    <?php
    // Fetch upcoming events with approved status from the database
    $sql = "SELECT * FROM transaction WHERE status = 'valid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      ?>
      <table class="event-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Tran_date</th>
            <th>Tran_id</th>
            <th>Val_id</th>
            <th>Amount</th>
            <th>Bank_tran_id</th>
            <th>Card_type</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><?php echo $row['tran_date']; ?></td>
              <td><?php echo $row['tran_id']; ?></td>
              <td><?php echo $row['val_id']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td><?php echo $row['bank_tran_id']; ?></td>
              <td><?php echo $row['card_type']; ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
      <?php
    } else {
      echo "<p>No upcoming events found.</p>";
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

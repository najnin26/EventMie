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
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>EVENTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1>0</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>REVIEWS</h3>
              <span class="material-icons-outlined">reviews</span>
            </div>
            <h1>0</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>USERS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>0</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>MESSAGES</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1>0</h1>
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
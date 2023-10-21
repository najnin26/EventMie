<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:user_login.php');
};
if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:user_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="style_book.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style_menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
    <a href="#" class="logo"><span>Event</span>Mie</a>
    <nav class="navbar">
        <a href="landing.php">home</a>
        <a href="service.php">services</a>
        <a href="about.php">about</a>
        <a href="book.php">booking</a>
        <a href="#price">payment</a>
        <a href="rating.php">review</a>
        <a href="contact.php">contact</a>
        <div class="action">
        <div class="profile" onclick="menuToggle();">
        <?php
         $select = mysqli_query($connection, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
             $fetch = mysqli_fetch_assoc($select);
            }
        if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
        }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
            }
        ?>
        </div>
        <div class="menu">
            <h3>Welcome back<br><span>Good to see you</span></h3>
            <ul>
                <li><img src="images/user.png"><a href="home.php">My Profile</a></li>
                <li><img src="images/edit.png"><a href="update_profile.php">Edit Profile</a></li>
                <li><img src="images/envelope.png"><a href="#">Inbox</a></li>
                <li><img src="images/settings.png"><a href="#">Settings</a></li>
                <li><img src="images/question.png"><a href="#">Help</a></li>
                <li><img src="images/log-out.png"><a href="index.php">Log Out</a></li>
            </ul>
        </div>
    </div>
    <script>
        function menuToggle(){
            const toggleMenu=document.querySelector('.menu');
            toggleMenu.classList.toggle('active');
        }
    </script>
    </nav>
    <div id="menu-bars" class="fas fa-bars"></div>
</header>
<br><br><br><br><br><br><br><br><br><br>
<h1 class="heading"><span>Request A</span> Booking</h1>
<form action="connection_booking_form.php" method="post" class="form-container">
  <div class="form-row">
  
    <div class="form-group">
      <h3><label for="firstName">First Name:</label></h3>
      <input type="text" id="firstName" name="firstName" required>
    </div>
    <div class="form-group">
      <h3><label for="lastName">Last Name:</label></h3>
      <input type="text" id="lastName" name="lastName" required>
   </div>
   <div class="form-group">
      <h3><label for="email">Email:</label></h3>
      <input type="email" id="email" name="email" required>
   </div>
    <div class="form-group">
      <h3><label for="phone">Phone:</label></h3>
      <input type="tel" id="phone" name="phone" required>
    </div>
    <div class="form-group">
    <h3><label for="event">Event:</label></h3>
      <select id="event" name="event" required>
        <option value="">Select an event</option>
        <option value="Birthday">Birthday</option>
        <option value="Wedding">Wedding</option>
        <option value="Conference">Conference</option>
        <option value="Concert">Concert</option>
        <option value="Met Gala">Met Gala</option>
        <option value="Seminar and Workshop">Seminar and Workshop</option>
        <option value="Charity Event">Charity Event</option>
        <option value="Others">Others</option>
      </select>
    </div>
    <div class="form-group">
      <h3><label for="date">Date:</label></h3>
      <input type="date" id="date" name="date" required>
    </div>
    <div class="form-group">
      <h3><label for="time">Time:</label></h3>
      <input type="time" id="time" name="time" required>
    </div>
    <div class="form-group">
      <h3><label for="guests">Number of guests:</label></h3>
      <input type="number" id="guests" name="guests" required>
    </div>
    <div class="form-group">
      <h3><label for="comments">Comments:</label></h3>
      <textarea id="comments" name="comments"></textarea>
    </div>
    <br>
    <div class="form-group">
      <h3><label for="equipment">Equipment:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="DJ" name="equipment[]" value="DJ">
        <label for="DJ">DJ</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="Mike" name="equipment[]" value="Mike">
        <label for="Mike">Mike</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="Speaker" name="equipment[]" value="Speaker">
        <label for="Speaker">Speaker</label>
      </div>
    </div>
    <div class="form-group">
      <h3><label for="food">Food:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="breakfast" name="food[]" value="Breakfast">
        <label for="breakfast">Breakfast</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="lunch" name="food[]" value="Lunch">
        <label for="lunch">Lunch</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="tea" name="food[]" value="Tea & Snacks">
        <label for="tea">Tea & Snacks</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="dinner" name="food[]" value="Dinner">
        <label for="dinner">Dinner</label>
      </div>
    </div>
    <div class="form-group">
      <h3><label for="decoration">Decoration:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="lighting" name="decoration[]" value="Lighting">
        <label for="lighting">Lighting</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="flower" name="decoration[]" value="Flower">
        <label for="flower">Flower</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="seating" name="decoration[]" value="Seating">
        <label for="seating">Seating</label>
      </div>
    </div>
    <div class="form-group">
      <h3><label for="invitation_card">Invitation Card:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="Yes" name="invitation_card[]" value="Yes">
        <label for="Yes">Yes</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="No" name="invitation_card[]" value="No">
        <label for="No">No</label>
      </div>
    </div>
  </div>
<br>
<div class="form-group">
  <button type="submit">Submit Request</button>
</div>
</form>

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>branches</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Dhaka </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Chittagong </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Sylhet </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i>Rajshahi</a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i>Barishal</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> service </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> gallery </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> price </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> reivew </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> contact </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> najninshirin@gmail.com </a>
            <a href="#"> <i class="fas fa-envelope"></i> fahimhasan@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Dhanmondi , Dhaka- 1209</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>

    </div>

    <div class="credit"> created by <span>Digital Dynamos</span> | all rights reserved </div>
</section>

<div class="theme-toggler">
    <div class="toggle-btn">
        <i class="fas fa-cog"></i>
    </div>
    <h3>choose color</h3>
    <div class="buttons">
        <div class="theme-btn" style="background: #3867d6;"></div>
        <div class="theme-btn" style="background: aqua;"></div>
        <div class="theme-btn" style="background:darkorange;"></div>
        <div class="theme-btn" style="background:chartreuse;"></div>
        <div class="theme-btn" style="background:crimson;"></div>
        <div class="theme-btn" style="background:darkorchid;"></div>
    </div>

</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html
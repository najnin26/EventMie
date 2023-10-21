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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en"xmlns="http://www.w3.org/1999/xhtml>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_menu.css">
    <link rel="stylesheet" href="style_contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

</head>
<body>
<header class="header">
    <a href="#" class="logo"><span>Event</span>Mie</a>
    <nav class="navbar">
        <a href="landing.php">home</a>
        <a href="service.php">services</a>
        <a href="about.php">about</a>
        <a href="#gallery">booking</a>
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
<section class="contact" id="contact">
    <form action="connection_contact.php" method="post">
    <h1 class="heading"><span><br><br>contact</span> us <br></h1>
        <div class="inputBox">
            <input type="text"  placeholder="name" name="name">
            <input type="email"  placeholder="email" name="email">
        </div>
        <div class="inputBox">
            <input type="number"  placeholder="number" name="number">
            <input type="text" placeholder="subject" name="subject">
        </div>
        <textarea name="message" placeholder="your message" id="" cols="30" rows="10"></textarea>
        <input name="submit"type="submit"value="send message" class="btn">
    </form>
</section>
<div class="contact-wrap">
    <div class="contact-in">
		<h1>Contact Info</h1>
		<h2><i class="fa fa-phone" aria-hidden="true"></i> Phone</h2>
		<p>   123-456-789</p>
		<h2><i class="fa fa-envelope" aria-hidden="true"></i> Email</h2>
		<p>digitaldynamos@gmail.com</p>
		<h2><i class="fa fa-map-marker" aria-hidden="true"></i> Address</h2>
		<p>Dhanmondi, Dhaka ,Bangladesh</p>
		<ul>
		<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
		<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
		</ul>
	</div>
    <div class="contact-in">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14608.036949834075!2d90.3671072!3d23.74705!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33cffc3fb%3A0x4a826f475fd312af!2sDhanmondi%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1681186243611!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</div>
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
        <div class="theme-btn" style="background: crimson;"></div>
        <div class="theme-btn" style="background: darkorchid;"></div>
    </div>

</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
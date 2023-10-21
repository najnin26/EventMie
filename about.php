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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style_menu.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <title>About</title>
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
 
<section class="about" id="about">
<h1 class="heading"><span>about</span> us </h1>
<br>
<div class="row">
    <div class="image">
        <img src="images/about-img.jpg" alt="">
    </div>
    <div class="content">
        <h3>we will give a very special celebration for your event</h3>
        <p>Our team is dedicated to organize your events.We invest the time, effort, and resources necessary to ensure every event we organize is a resounding success. From meticulous planning to flawless execution, we leave no stone unturned in our pursuit of perfection. Let us continue to embrace our dedication, foster innovation, and create events that exceed all expectations.</p>
        <a href="#" class="btn">contact us</a>
    </div>
</div>
</section>
<br><br>
<h1 class="heading"> our <span>Team</span> </h1>
<div class="card-container">
    <div class="card">
        <div class="container">
            <div class="img-container">
                <img src="images/fahim.png" alt="Photo profile">
            </div>
            <p class="full-name">Md Fahim Hasan</p>
            <p class="role">UX/UI Developer</p>
            <p class="description">
            Dedicated to creating intuitive and visually appealing user interfaces. With a focus on user experience design and front-end development, I strive to deliver exceptional digital experiences that combine creativity and technical proficiency.
            </p>
            <div class="social-container">
                <a href="https://github.com/login" target="_blank">
                    <button><i class="fab fa-github"></i></button>
                </a>
                <a href="https://twitter.com/login" target="_blank">
                    <button><i class="fab fa-twitter"></i></button>
                </a>
                <a href="https://linkedin.com/login" target="_blank">
                    <button><i class="fab fa-linkedin-in"></i></button>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container">
            <div class="img-container">
                <img src="images/self1.jpg" alt="Photo profile">
            </div>
            <p class="full-name">Najnin Sultana Shirin</p>
            <p class="role">Web Developer</p>
            <p class="description">
            Experienced web developer proficient in HTML, CSS, and JavaScript, creating dynamic and user-friendly websites. Dedicated to delivering seamless user experiences and visually appealing designs.
            </p>
            <div class="social-container">
                <a href="https://github.com/login" target="_blank">
                    <button><i class="fab fa-github"></i></button>
                </a>
                <a href="https://twitter.com/login" target="_blank">
                    <button><i class="fab fa-twitter"></i></button>
                </a>
                <a href="https://linkedin.com/login" target="_blank">
                    <button><i class="fab fa-linkedin-in"></i></button>
                </a>
            </div>
        </div>
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
        <div class="theme-btn" style="background:crimson;"></div>
        <div class="theme-btn" style="background:darkorchid;"></div>
    </div>

</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
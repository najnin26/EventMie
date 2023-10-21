<?php
include 'config_user.php';
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
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style_user.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3>User id : <?php echo $fetch['id']; ?></h3>
      <h3>User name : <?php echo $fetch['name']; ?></h3>
      <h3>Email : <?php echo $fetch['email']; ?></h3>

      <a href="update_profile.php" class="btn">update profile</a>
      <a href="index.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <a href="landing.php" class="btn">Not Now</a>
   </div>

</div>

</body>
</html>
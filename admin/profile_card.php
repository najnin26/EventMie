<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");
$query = "SELECT * FROM user_form";
$result = mysqli_query($conn, $query);
// Delete user
if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $deleteQuery = "DELETE FROM user_form WHERE id = '$userId'";
    mysqli_query($conn, $deleteQuery);
    header("Location: profile_card.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style(profile_card).css">
</head>
<body>
    <div class="container">
    <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
            <div class="user-card">
                <h4>Id : <?php echo $fetch['id']; ?></h4>
                <h4>Name : <?php echo $fetch['name']; ?></h4>
                <p>Email: <?php echo $fetch['email']; ?></p>
                <img src="images/<?php echo $fetch['image']; ?>" alt="User Image">
                <a href="?delete=<?php echo $fetch['id']; ?>"onclick="return confirm('Are you sure you want to delete this user?')"class="delete-button">Delete</a>
            </div>
        <?php } ?>
    </div>
</body>

</html>

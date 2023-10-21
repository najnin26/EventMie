<?php
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$con = new mysqli("localhost","root","","user_db");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
}else{
    $stmt = $con->prepare("select * from admin where email=?");
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password']==$password){
            header("Location: index.php");
            exit();
        }else{
            echo "<h2>Invalid email or Password</h2>";
        }
    }else{
        echo "<h2>Invalid email or Password</h2>";
    }
}
?>

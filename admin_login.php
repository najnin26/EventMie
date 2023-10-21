<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style(admin_login).css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <div class="myform">
            <form action="connection_admin_login.php" method="post">
                <h2>ADMIN LOGIN</h2>
                <input type="email" placeholder="Email" id ="email"name="email" required>
                <input type="password" placeholder="Password" id="password" name="password" required>
                <button type="submit">LOGIN</button>
            </form> 
        </div>
        <div class="image">
            <img src="images/img13.webp" width='300px'>
        </div>
    </div>
</body>
</html>
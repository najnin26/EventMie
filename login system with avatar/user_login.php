
<!DOCTYPE html>
<html>
<head>
	<title>Animated Forms</title>
	<link rel="stylesheet" type="text/css" href="user_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="signin-signup">
			<form action="connect(login).php" method="post" class="sign-in-form">
				<h2 class='title'>Sign In</h2>
				<div class="input-field">
                    <i class="fa fa-envelope"></i>
                    <input type="email" placeholder="Email" id ="email"name="email" required>
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Password" id="password" name="password" required>
                </div>
                <input type="submit"value="Log In" class="btn">
                <p class="social-text">Or sign in with social platform</p>
                <div class="social-media">
                    <a href=""class="social-icon">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href=""class="social-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href=""class="social-icon">
                        <i class="fa fa-google"></i>
                    </a>
                    <a href=""class="social-icon">
                        <i class="fa fa-linkedin-square"></i>
                    </a>
                    <p><br>Or go to <a href="index.php">Home Page</a></p>
                </div>
                <p class="account-text">Don't have an account?<a href="#" id="sign-up-btn2">Sign Up</a></p>
			</form>
            <form action="connect(register).php" method="post" class="sign-up-form">
				<h2 class='title'>Sign Up</h2>
				<div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="UserName" name="username">
                </div>
                <div class="input-field">
                    <i class="fa fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email">
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Confirm Password"  name="confirm_password" required>
                </div>
                <input type="submit"value="Sign Up" class="btn">
                <p class="social-text">Or sign up with social platform</p>
                <div class="social-media">
                    <a href=""class="social-icon">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href=""class="social-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href=""class="social-icon">
                        <i class="fa fa-google"></i>
                    </a>
                    <a href=""class="social-icon">
                        <i class="fa fa-linkedin-square"></i>
                    </a>
                    <p><br>Or go to <a href="index.php">Home Page</a></p>
                </div>
                <p class="account-text">Alrady have an account?<a href="#" id="sign-in-btn2">Sign In</a></p>
			</form>
		</div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Mamber Of Site?</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam est harum delectus nulla quas voluptatem?</p>
                    <button class="btn" id="sign-in-btn">Sign in</button> 
                </div>
                <img src="images/signin.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Site?</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam est harum delectus nulla quas voluptatem?</p>
                    <button class="btn" id="sign-up-btn">Sign up</button> 
                </div>
                <img src="images/signup.svg" alt="" class="image">
            </div>
        </div>
    </div> 
    <script src="login.js"></script>   
</body>
</html>

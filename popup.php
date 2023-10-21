<!DOCTYPE html>
<html>
<head>
  <title>Registration successful</title>
  <style>
    body {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999;
  background-color: whitesmoke;
  color: white;
  padding: 20px;
  text-align: center;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #222;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
      text-align: center;
      animation-name: fade-in;
      animation-duration: 1s;
      animation-fill-mode: both;
    }
    h1 {
      font-size: 36px;
      margin-top: 0;
    }
    p {
      font-size: 18px;
      line-height: 1.5;
      margin-bottom: 20px;
    }
    a {
      color: #007bff;
      text-decoration: none;
    }
    @keyframes fade-in {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <script>
      alert("Registration successful");
    </script>
    <h1>Registration successful</h1>
    <p>You have successfully registered.</p>
    <p>Click <a href="user_login.php">here</a> to log in.</p>
  </div>
</body>
</html>

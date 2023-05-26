<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  //something was posted
  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  if (checkUsernameExists($user_name, $con)) {
    echo "Username already exists.";
  } else {
        if (!empty ($user_name) && !empty ($password)) {
          //save to database
          $query = "insert into users (user_name, email, password) value ('$user_name', '$email', '$password')";            
          mysqli_query ($con, $query) ;
          header("Location: HOME PAGE.html");
          die ;
          }
        else {
            echo "Please Enter Valid Information!" ;
          }
        }
}
?>

<html>
  <head>
    <title>Signup page</title>
   </head>
  <style>
    body {
      background-color: #A1045A;
      font-family: "Asap", sans-serif;
    }
    .signup {
      overflow: hidden;
      background-color: white;
      padding: 40px 30px 30px 30px;
      border-radius: 10px;
      position: absolute;
      top: 50%;
      left: 50%;
      width: 400px;
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      -o-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
      -moz-transition: -moz-transform 300ms, box-shadow 300ms;
      transition: transform 300ms, box-shadow 300ms;
      box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
    }
    .signup::before, .signup::after {
      content: "";
      position: absolute;
      width: 600px;
      height: 600px;
      border-top-left-radius: 40%;
      border-top-right-radius: 45%;
      border-bottom-left-radius: 35%;
      border-bottom-right-radius: 40%;
      z-index: -1;
    }
    .signup::before {
      left: 40%;
      bottom: -130%;
      background-color: rgba(69, 105, 144, 0.15);
      -webkit-animation: wawes 6s infinite linear;
      -moz-animation: wawes 6s infinite linear;
      animation: wawes 6s infinite linear;
    }
    .signup::after {
      left: 35%;
      bottom: -125%;
      background-color: rgba(2, 128, 144, 0.2);
      -webkit-animation: wawes 7s infinite;
      -moz-animation: wawes 7s infinite;
      animation: wawes 7s infinite;
    }
    .signup > input {
      font-family: "Asap", sans-serif;
      display: block;
      border-radius: 5px;
      font-size: 16px;
      background: white;
      width: 100%;
      border: 0;
      padding: 10px 10px;
      margin: 15px -10px;
    }
    .signup > button {
      font-family: "Asap", sans-serif;
      cursor: pointer;
      color: #fff;
      font-size: 16px;
      text-transform: uppercase;
      width: 80px;
      border: 0;
      padding: 10px 0;
      margin-top: 10px;
      margin-left: -5px;
      border-radius: 5px;
      background-color: #A1045A;
      -webkit-transition: background-color 300ms;
      -moz-transition: background-color 300ms;
      transition: background-color 300ms;
    }
    .signup > button:hover {
      background-color: #db7093;
    }
@-webkit-keyframes wawes {
  from {
    -webkit-transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-moz-keyframes wawes {
  from {
    -moz-transform: rotate(0);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}
@keyframes wawes {
  from {
    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    -ms-transform: rotate(0);
    -o-transform: rotate(0);
    transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
a {
  text-decoration: none;
  color: rgba(255, 255, 255, 0.6);
  position: absolute;
  right: 10px;
  bottom: 10px;
  font-size: 12px;
}
</style>
<body>
  <form class="signup" method="POST">
    <input id="text" type="text" placeholder="Username" name="user_name" required>
    <input id="text" type="text" placeholder="Email" name="email" required>
    <input id="text" type="password" placeholder="Password" name="password" required>
    <button type="submit" class="btn2">Sign up</button>
    <hr>
    <br>
    <a href="LOGIN.php"><p style="color: black; font-size: 12px; font-weight: 400; padding: 0px 200px;">Login</style></p></a>
  </form>
</body>
</html>
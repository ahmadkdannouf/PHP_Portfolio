<?php 
require_once('../connection.php');
// If the username session is not set, then the user has not logged in yet
//if (!isset($_SESSION['username']))
if (isset($_POST['sign_in']))
{
    // If the page is receiving the email and password from the login form then verify the login data
    if (isset($_POST['email']) && isset($_POST['password']))
    {
        $stmt = $conn->prepare("SELECT username, password FROM users WHERE email=:email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();

        $queryResult = $stmt->fetch();
        
        // Verify password submitted by the user with the hash stored in the database
        if(!empty($queryResult) && password_verify($_POST['password'], $queryResult['password']))
        {
            // Create session variable
            $_SESSION['username'] = $queryResult['username']; 
            
            // Redirect to URL 
            echo '<script>alert("Log In Successful")</script>';
            header("Location:../admin.php");
        } else {
            // Password mismatch
            echo '<script>alert("Password Mismatch")</script>';
            //header("Location:login.php");
            foreach($queryResult as $r){
                echo $r['password'];
            }
            
            exit();
        }
    }
    else
    {
        // Show login page
        echo '<script>alert("Password Mismatch")</script>';
        header("Location:login.php");
        exit();
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link rel="stylesheet" href="login/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

<body>

<main class="form-signin">
  	<form action = "login.php" method = "post">
    <center><h1>ADMIN</h1></center>

    <div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="johndoe@gmail.com" name="email" required>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="sign_in">Sign In</button>
	<br>
	
	</form>
<p class="mt-5 mb-3 text-muted">&copy; 2022</p>


</body>
</html>
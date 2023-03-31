<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <div class="bg-img">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" />
</head>
<style>
    body {
        background-image: url("image/login.png");
        background-size: cover;
    }

    .form {
        display: flex;
        justify-content: center;
        margin-top: 275px;
        
    }
</style>

<body><?php
        require('db.php');
        session_start();
        if (isset($_POST['username'])) {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            // Check user is exist in the database
            $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
            $result = mysqli_query($con, $query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: about.php");
            } else {
                echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
            }
        } else {
        ?><form class="form" method="post" name="login">
            <div class="bg-img">
                <h1 class="login-title">Login</h1><input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" /><input type="password" class="login-input" name="password" placeholder="Password" /><input type="submit" value="Login" name="submit" class="login-button" />
                <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
        </form>
        </div><?php
            }
                ?></body>

</html>
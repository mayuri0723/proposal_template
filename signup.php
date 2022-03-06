<?php
    require('db.php');  // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  </div>";
                } else {
                    echo "<div class='form'>
                          <h3>Required fields are missing.</h3><br/>
                        //   <p class='link'>Click here to <a href='login.php'>registration</a> again.</p>
                          </div>";
                }
            } 

            
?> 



<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
    crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/" integrity="sha384-
       BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
<?php
    require('db.php');
   
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
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
            // header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
 

<section>
      <div class="container active">
          <!-- sign in -->
        <div class="user signinBx">
          <div class="imgBx"><img src="img/5.jpeg" /></div>
          <div class="formBx">
            <form>
              <h2>Sign In</h2>
              <input type="text" name="" placeholder="Username" />
              <input type="password" name="" placeholder="Password" />
              <input type="submit" name="" value="Login" />
              <p class="signup" style="color:black;">
                Don't have an account ?<a href="#" onclick="toggleForm();">
                  Sign Up
                </a>
              </p>
            </form>
            <?php
    }
?>
          </div>
        </div>


        <?php
    require('db.php');  // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  </div>";
                } else {
                    echo "<div class='form'>
                          <h3>Required fields are missing.</h3><br/>
                        //   <p class='link'>Click here to <a href='login.php'>registration</a> again.</p>
                          </div>";
                }
            } else{

            
?> 
        <!-- sign up -->
        <div class="user signupBx">
          <div class="formBx">
            <form>
              <h2>Create an Account</h2>
              <input type="text" name="" placeholder="Username" />
              <input type="email" name="" placeholder="Email Id" />
              <input type="password" name="" placeholder="Create Password" />
               <!-- <input type="password" name="" placeholder="Confirm Password" /> -->
              <input type="submit" name="" value="Sign Up" />
              <p class="signup"  style="color:black;">
                Already have an account ?
                <a href="#" onclick="toggleForm();"> Sign In </a>
              </p>
            </form>
            <?php
    }
?>
          </div>
          <div class="imgBx"><img src="img/5.jpeg" /></div>
        </div>
      </div>
    </section>
    <script>
              function toggleForm() {
        var container = document.querySelector(".container");
        container.classList.toggle("active");
               }
        </script>
</body>
</html>
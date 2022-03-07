<?php
 session_start();
    require('db.php');
    
    // When form submitted, check and create user session.
    if($_SERVER['REQUEST_METHOD']=='POST'){
     
      if ( isset($_POST['formType'])) 
      {
          /**
           * HANDLE SIGNIN REQUEST
           */
          if($_POST['formType']=='signin'){
            if( isset($_POST['username']) && isset($_POST['password']))
            {
              $username = stripslashes($_REQUEST['username']);    // removes backslashes
              // $username = mysqli_real_escape_string($con, $username);
              $password = stripslashes($_REQUEST['password']);
              // $password = mysqli_real_escape_string($con, $password);
  
  
              // Check user is exist in the database
              /**
               *  LOGIN QUERY
               */
              
              $query    = "SELECT id FROM `users` WHERE username= ? AND password = ? ";
              $stmt=mysqli_prepare($conn, $query);
              
              mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
              mysqli_stmt_execute($stmt);
              $result=mysqli_stmt_get_result($stmt);
              if($row=mysqli_fetch_assoc($result)){
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['id'];
                header("Location: dashboard.php");
                exit();
              }else{
                /**
                 * Task : find a way to display this messege in side form or above form 
                 */
                $_SESSION['msg'] = "invalid credentials";
  
                header("Location: user.php");
                exit();
                
              }
            }
            else{
              echo"incomplete data";
            }
            echo "<script> window.location.href='user.php'; </script>";
          }else if ($_POST['formType']=='signup'){
            if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) )
            {
              $username = stripslashes($_REQUEST['username']);    // removes backslashes
              // $username = mysqli_real_escape_string($con, $username);
              $password = stripslashes($_REQUEST['password']);
              $email = stripslashes($_REQUEST['email']);
              $datetime= date('Y-m-d H:i:s');

              // $password = mysqli_real_escape_string($con, $password);
  
              echo $username." ".$password." ".$datetime; 
              // Check user is exist in the database
              /**
               *  SIGN UP QUERY
               */
              
              $query = "INSERT INTO users (username, email, password, create_datetime) VALUE( ?,?,?,?)";
              $stmt=mysqli_prepare($conn, $query);
              

              mysqli_stmt_bind_param($stmt, 'ssss', $username, $email, $password, $datetime);
              
              
              if(mysqli_stmt_execute($stmt)){
                $_SESSION['msg']="user created successfully";
                header("Location: user.php");
                exit();

              }else{
                /**
                 * Task : find a way to display this messege in side form or above form 
                 */
                echo"invalid credentials";
                header("Location: user.php");
                exit();
              }
            }
            else{
              echo"incomplete data";
            }
            
          }
          
      }
    }   
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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



<section>
      <div class="container">
          <!-- sign in -->
        <div class="user signinBx">
          <div class="imgBx"><img src="img/5.jpeg" /></div>
          <div class="formBx">

            <form method='POST' action='user.php'>
              <h2>Sign In</h2>
              <?php
                if(isset($_SESSION['msg'])){
                  // echo "hello";
                  $msg=$_SESSION['msg'];
                    ?>
                      <p>
                        <?php   echo $msg ;
                        
                          
                        ?>
                      </p>
                    <?php

                }
                unset($_SESSION['msg']);
                //$_SESSION['msg']="bla bla";
              ?>
              <input type="hidden" name="formType" value="signin">
              <input type="text" name="username" placeholder="Username" />
              <input type="password" name="password" placeholder="Password" />
              <input type="submit" name="" value="Login" />
              <p class="signup" style="color:black;">
                Don't have an account ?<a href="#" onclick="toggleForm();">
                  Sign Up
                </a>
              </p>
            </form>
         
          </div>
        </div>


      
        <!-- sign up -->
        <div class="user signupBx">
          <div class="formBx">
            <form method="POST" action="user.php">
              <h2>Create an Account</h2>
              <input type="hidden" name="formType" value="signup">
              <input type="text" name="username" placeholder="Username" />
              <input type="email" name="email" placeholder="Email Id" />
              <input type="password" name="password" placeholder="Create Password" />
               <!-- <input type="password" name="" placeholder="Confirm Password" /> -->
              <input type="submit" name="" value="Sign Up" />
              <p class="signup"  style="color:black;">
                Already have an account ?
                <a href="#" onclick="toggleForm();"> Sign In </a>
              </p>
            </form>
            
    

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
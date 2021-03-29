<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Admin Roaming</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <link rel="shortcut icon" href="APP/images/Orange.png" />
        <link rel="stylesheet" href="APP/css/login.css">
    </head>

    <body>
        
        <div class="cont">
          <div class="demo">
            <?php
                if(isset($_POST['signin'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if($username == "Admin" && $password == "Admin"){
                        $_SESSION["Admin"] = "Admin";
                        // header used  to redirect to another page 
                        header("location: zones.php");
                        exit();
                    }else{
                        header("location: AdminLogin.php?message=error");
                        exit();
                    }
                }
                if(isset($_GET['message'])){
                    echo '<div class="red">
                            <p>Username or Password didn\'t Match <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            ?>
            <div class="login">
              <div class="login__form">
                  <form action="AdminLogin.php" method="POST">
                    <div class="login__row">
                      <svg class="login__icon name svg-icon">
                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                      </svg>
                      <input type="text" class="login__input name" placeholder="Username"  name="username"/>
                    </div>
                    <div class="login__row">
                      <svg class="login__icon pass svg-icon">
                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                      </svg>
                      <input type="password" class="login__input pass" placeholder="Password" name="password" style="color:#FF7000"/>
                    </div>
                    <button type="sumit" class="login__submit" name="signin" value="signin">Sign in</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>

<?php require_once("./include/DB.php"); ?>
<?php require_once("./include/session.php"); ?>
<?php require_once("./include/function.php"); ?>

<?php
    if(isset($_POST["btn-login"]))
    {
        
        //grab the form data
        
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
       
        //check empty field
        if(empty($username) || empty($password) )
        {
            $_SESSION["errMsg"] = "empty";
            redirect_to("login.php");
            return;
        }
        $found_acc = loginAttempt($username,$password);
        $_SESSION["username"] = $found_acc["username"];
        $_SESSION["password"] = $found_acc["password"];
        $_SESSION["position"] = $found_acc["position"];
     
        if($found_acc["position"]=='student')
        {
            
            //redirect to create event page
            redirect_to("student.php");
        }
        elseif($found_acc["position"]=='Teacher')
        {
            redirect_to("teacher.php");
          
        }
        else{
            $_SESSION["errMsg"] = "Invalid user credintail";
            redirect_to("login.php");
        }
       
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-GURUMADULA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
<style type="text/css">
    .upper  {
    background-image: url("images/bg_5.jpg"); 
    filter: blur(0.1);
  position: absolute;
  width: 100%;
  height: 100%;
    }
	.login-form {
        position: absolute;
        left: 25cm;
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html"><img src="images/logo.jpg" width="100" height="40" style="top: -4px;position: relative;margin-right: 15px;">E-GURUMADULA</a>
        </div>
    </nav>
    <div class="upper">
    <div class="login-form">
    <div><?php echo success_msg();
                    echo warn_msg();
                    echo err_msg();
                    echo exception_msg(); ?>
        <form action="login.php"  method="post" enctype="multipart/form-data">
            <h2 class="text-center">Log in</h2>       
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" onblur="validate(this)" required="required">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" id="btn-login" name="btn-login" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                <a href="#" class="pull-right">Forgot Password?</a>
                <p class="text-center"><a href="register.html">Create an Account</a></p>
            </div>        
        </form>
    </div>
    </div>
</div>
    
</body>
</html>                                		                            
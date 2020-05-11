<?php
session_start();
include('connection.php');
$check="";
if(isset($_POST['submit']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $query = "select * from users where Email='$user' && Password='$pass'";
        $data = mysqli_query($con, $query);
        $total = mysqli_num_rows($data);
        
        if($total == 1)
        {
            $result = mysqli_fetch_assoc($data);
            $userprofile = $result['Name'];
            $_SESSION['user'] = $userprofile;
            header('location:home.php');
        }
        else
        {
            $check = "Your Username or Passowrd is wrong. Please try again !    ";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLCMS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/CSS/bootstrap.min.css" type="text/css">
</head>
<body>
    <div class="container-fluid">
        <header>
           <div class="row" style="padding: 0 20px 0 20px;">
            <div class="alert alert-success" style="height:120px;">
                <div class="col-xs-1">
                    <img src="dist/img/logo.png" width="100" height="90">
                </div>    <!--1st Column Ends Here-->

                <div class="col-xs-11 text-center">
                    <h1 class="text-center" style="display:fixed;"><b>COMPUTERIZED LOCAL MANAGEMENT SYSTEM (CLCMS) </b></h1>
                </div>
            </div>    <!--Alert Class Ends Here-->
            </div>    <!--Row Ends Here-->
        </header>     <!--Header Ends Here-->
        <p class="alert-danger" style="font-size: 16px; "><?php echo $check; ?></p>
        <div class="row" style="padding:0 50px 0 50px; margin-top:2rem;">
            <div class="col-md-4 col-md-offset-4" style="border:0px solid #000;">
                <div class="row">
                    <img src="dist/img/login-img.png" width="300" height="80" style="margin-left:auto; margin-right:auto; display:block;">
                </div>     <!--Inner First Row Ends Here-->
                
                    <form action="" method="post">
                        <div class="row">
                        <div class="form-group">
                            <label for="email"><b>Name:</b></label>
                            <input type="email" name="username" class="form-control col-xs-12" placeholder="Email Address" required>
                        </div>    <!--First Form Group Ends Here-->

                        <div class="form-group" style="margin-top:50px;">
                            <label for="Passowrd"><b>Password:</b></label>
                            <input type="password" name="password" class="form-control col-xs-12" placeholder="Password" required>
                        </div>    <!--Second Form Group Ends Here-->

                        <div class="form-group" style="margin-top:50px;">
                            <a href="" style="float:right;">Forgot Password?</a>
                        </div>    <!--Third Form Group Ends Here-->

                        <div class="form=group" style="margin-top:80px;">
                            <input type="submit" name="submit" value="Login" class="btn btn-lg btn-success btn-block" style="font-weight:bold;">
                        </div>
                        
                    </div>    <!--Inner Second Row Ends Here-->
                    </form>    <!--Form Ends Here-->
                
            </div>    <!--First Column Ends Here-->
            
        </div>    <!--First Row Ends Here-->
            
        
         <footer>
               
                <div class="row" style="width: 100%; position: absolute; bottom:0; padding: 0 20px 0 20px;">
                    <div class="well text-center">
                        <h4>All Rights Reserved to Office of Deputy Commissioner Jaffarabad &copy; 2020</h4>
                        <p>Phone: 0838-510700 , Fax: 0838-510703</p>
                        <p>Email: <a>info.dc.jaffarabad@gmail.com</a> and  <a>complaints.dc.jaffarabad@gmail.com</a></p>
                    </div>
                </div>
            </footer>    <!--Footer Ends Here-->
    </div>     <!--Container Ends Here-->    
    <script src="Js/jquery.js" type="application/javascript"></script>
    <script src="Js/popper.js" type="application/javascript"></script>
    <script src="Js/bootstrap.min.js" type="application/javascript"></script>
</body>

</html>
<?php
    
?>
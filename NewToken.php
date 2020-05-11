<?php 
session_start();
include 'connection.php';
$message = "";
if(isset($_POST['GenerateToken'])){
    
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $fee = $_POST['fee'];
    $Applicationtype = $_POST['type'];
    $challan_no = $_POST['challan_no'];
    $challan_date = $_POST['date'];
    $challan_amount = $_POST['challan_amount'];
    $query = "INSERT INTO token(Name,CNIC,Fee,ApplicationType,Bank_Challan_No,Challan_Date,Challan_Amount) VALUES ('$name','$cnic','$fee','$Applicationtype','$challan_no','$challan_date','$challan_amount')";
    $data = mysqli_query($con, $query);
    if($data == 1){
       $_SESSION['cnic']=$cnic;
        header('location: print_token.php');
    }
    else{
        $message = "Sorry Token Could Not be Generated. please Try again later.";
    }      
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'topmenu.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="container">
        <div class="row">
           <p class="alert-danger" style="font-size: 16px; "><?php echo $message; ?></p>
            <div class="col-md-12" style="border:0px solid #808080; padding:20px;">
               <form action="" method="post">
                    <div class="form-group">
                        <div class="row">
                            <label for="Name"><b>Name:</b></label>
                            <input type="text" class="form-control" name="name" required placeholder="Name">
                        </div>
                    </div>
                      
                       <div class="form-group">
                          <div class="row">
                              <label for="CNIC"><b>CNIC:</b></label>
                              <input type="text" class="form-control" name="cnic" required placeholder="Computerized National Identity Card Number">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="row">
                              <label>Type:</label>
                                <select class="form-control" name="type">
                                  <option value="New">New</option>
                                  <option value="Modification">Modification</option>
                                  <option value="Reprint">Reprint</option>
                                </select>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="row">
                              <label for="FEES"><b>Fee:</b></label>
                              <input type="text" class="form-control" value="250" name="fee" required placeholder="FEE">
                          </div>
                      </div>
                      <span class="brand-text"><b>BANK CHALLAN DETAILS</b></span>
                      <div class="form-group">
                          <div class="row">
                              <label for="challanno"><b>Challan No:</b></label>
                              <input type="text" class="form-control" name="challan_no" required placeholder="Name">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="row">
                              <label for="challandate"><b>Challan Submission Date:</b></label>
                              <input type="date" class="form-control" name="date">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <label for="amount"><b>Challan Amount:</b></label>
                              <input type="text" class="form-control" value="400" name="challan_amount" required placeholder="Challan Amount in Rs.">
                          </div>
                      </div>
                       <div class="form-group">
                          <div class="row">
                             <input type="submit" name="GenerateToken" value="Generate Token" class="btn btn-success input-lg">
                          </div>
                      </div>
                
            </form>
            </div>
        </div>    <!--Row Inside Container Div Ends Here-->
    </div>     <!--Container Div Ends Here-->
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    
    <strong>Copyright &copy; 2020 <a href="">Deputy Commissioner Jaffarabad</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

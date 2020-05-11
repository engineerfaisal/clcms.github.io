<?php
    include 'connection.php';
    session_start();
$message = "";
$sql = "select SUM(Fee) As 'totalAmount' from token";
    $sql_result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($sql_result);
    $total_amount = $data['totalAmount'];
    $query = "select * from token";
    $result = mysqli_query($con, $query);
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
            <p class="alert-danger" style="font-size: 16px; "><?php echo $message; ?></p>
              <div class="lockscreen-wrapper" style="margin-top:-20px;">
        <!--<div class="row"><img src="dist/img/logo.png" width="50" height="40" alt="" style="margin: 0 auto;"></div>-->
             <div class="lockscreen-logo">
            <a href="index2.html"><b>Data Entry</b></a>
          </div>
          <!-- User name -->


          <!-- START LOCK SCREEN ITEM -->
          <div class="lockscreen-item">
            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" method="post">
              <div class="input-group">
                <input type="text" class="form-control" name="cnic" placeholder="CNIC Number.">

                <div class="input-group-append">
                  <button type="submit" name="dptoken" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                </div>
              </div>
            </form>
            <!-- /.lockscreen credentials -->

          </div>
          <!-- /.lockscreen-item -->
          <div class="help-block text-center">
            Enter CNIC No. and press Enter to start data entry.
          </div>            

        </div>

    </section>
    <!-- /.content 1 -->
    
    <!-- Main content -->
    <section class="content">
            <table class="table table-stripped table-hover table-bordered">
         <thead class="alert-info">
            <tr>
              <th width="50">S.No</th>
              <th width="400">Name</th>
              <th>CNIC</th>
              <th>FEE</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              <?php
                $i = 0;
                while($rows = mysqli_fetch_assoc($result)){
                $i++;
                ?>
                    <tr>
                        <td><?php  echo $i; ?></td>
                        <td><?php echo $rows['Name'];?></td>
                        <td><?php echo $rows['CNIC'];?></td>
                        <td><?php echo $rows['Fee'];?></td>
                         <td><button class="btn btn-success btn-block">Edit</button></td>
                          <td><button class="btn alert-danger btn-block">Delete</button></td>
                    </tr>
                <?php   
                }
              ?>
                  <tr>
                      <td colspan="3" class="text-center"><b>Total Amount</b></td>
                      <td><b><?php echo $total_amount; ?></b></td>
                  </tr>
          </tbody>
     </table>

    </section>
    <!-- /.content 2 -->
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

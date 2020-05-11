<?php 
    include 'connection.php';
    session_start();
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
  <script>
      function myFunction() {
        window.location.href = "home.php";
      }
</script>
</head>
<body class="hold-transition sidebar-mini">

<h3 class="text-center">Daily Statement of Token Issued.</h3>
     <table class="table table-stripped table-hover table-bordered">
         <thead class="alert-info">
            <tr>
              <th width="50">S.No</th>
              <th width="400">Name</th>
              <th>CNIC</th>
              <th>FEE</th>
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
         <footer class="main-footer float float-left">
            <strong>Copyright &copy; 2020 <a href="Home.php">Deputy Commissioner Jaffarabad</a>.</strong> All rights
            reserved.
          </footer>


<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>

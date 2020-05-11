<?php 
session_start();
include 'connection.php';
$cnic=$_SESSION['cnic'];
$query = "select * from token where cnic = '$cnic' ";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);
        
if($total == 1)
{
    $result = mysqli_fetch_assoc($data);
    $token_no = $result['Token_id'];
    $name = $result['Name'];
    $nic_num = $result['CNIC'];
    $fee = $result['Fee'];
    $Applicationtype= $result['ApplicationType'];
    $bank_challan_num = $result['Bank_Challan_No'];
    $challan_date = $result['Challan_Date'];
    $amount = $result['Challan_Amount'];
}
else
{
    header('newToken.php');
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
<div class="col-xs-12">
   <div class="row">
        <header>
           <div class="row" style="padding: 10px; 20px 0 20px;">
                <div class="col-xs-1" style="float:left;">
                    <img src="dist/img/logo.png" width="60" height="50">
                </div>    <!--1st Column Ends Here-->

                <div class="col-xs-10" >
                    <p style="padding-top:15px; padding-left:32px;"><b>GOVERNEMNT OF BALOCHISTAN</b></p>
                </div>
            </div>    <!--Row Ends Here-->
            <div class="row">
                <div class="col-xs-12">
                    <p  class="text-center"style="font-size:13.5px;"><b>COMPUTERIZED LOCAL MANAGEMENT SYSTEM</b></p>
                </div>
            </div>
            </header>     <!--Header Ends Here-->
   </div>
    <div class="row">
        <section>
                <div class="row" style="margin-left:10px;">
                    <div class="col-xs-11" style="border:1px solid #000;">
                        <p class="text-center" style="Font-size:26px; font-weight:bold;"><b>Token No. <?php echo $token_no; ?> </b></p>
                    </div>
                </div>
                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>Date:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo  date("d-m-Y"); ?></p>
                     </div>   
                </div>    <!--Date Row Ends Here-->

                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>Name:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo $name; ?></p>
                     </div>   
                </div>        <!--Name row Ends Here-->

                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>CNIC:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo $nic_num; ?></p>
                     </div>   
                </div>

                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>Type:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo $Applicationtype; ?></p>
                     </div>   
                </div>

                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>Fee:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo $fee; ?></p>
                     </div>   
                </div>
                <hr>
                <div class="row" style="margin-left:20px;">
                    <h5><b>BANK CHALLAN DETAILS</b></h5>
                </div>
                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>Bank Challan No:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo $bank_challan_num; ?></p>
                     </div>   
                </div>

                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>Challan Date:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo $challan_date; ?></p>
                     </div>   
                </div>

                <div class="row" style="margin-left:10px;">
                     <div class="col-xs-5" style="float:left;">
                         <p>Challan Amount:</p>
                     </div>
                     <div class="col-xs-5">
                         <p><?php echo $amount; ?></p>
                     </div>   
                </div>      
            </section> 
    </div>
    <hr>
    <footer class="main-footer">
    
    <strong>Copyright &copy; 2020 <a href="Home.php">Deputy Commissioner Jaffarabad</a>.</strong> All rights
    reserved.
  </footer>

    
</div>    <!--container Ends Here-->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
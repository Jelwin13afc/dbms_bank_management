<?php
session_start();
$account_no = $_SESSION['account_no'];
$con = mysqli_connect("localhost","root","Jelwin,2000","db_bank");
$result = mysqli_query($con, "SELECT * FROM loan_info WHERE account_no = '$account_no'");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$ac1=$row['account_no'];

if($ac1!=$account_no){
$c= mysqli_query($con,"insert into loan_info(account_no) values ('$account_no')");}
$loan_type = $row['loan_type'];
$amount = $row['amount'];
$interest = $row['interest'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>BANKIS BANK</title>
  <link rel="icon" href="../img/profile.jpg" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/response.css">
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<style type="text/css">
  table { border: 1px solid black; border-collapse: collapse; }
  table td {border: 1px solid black; border-right: 1px solid white; border-left: 1px solid white}
</style>
</head>
<body style="background-color:#474B4F;">

<div class="topnav" id="myTopnav">
  <img style="float:right; right:1" src="../img/profile.jpg" height="50" width="150">
  <a href="dashboard.php"><i class="fa fa-fw fa-calculator "></i>Dashboard</a>
  <a href="profile.php"><i class="fa fa-fw fa-id-card-o "></i>Profile</a>
  <a href="transfer.php"><i class="fa fa-fw fa-cogs "></i>Transfer Money</a>
  <a href="transactions.php"><i class="fa fa-fw fa-file-text "></i>Transactions</a>
  <a href="Loan.php" class="active"><i class="fa fa-fw fa-sliders "></i>Loan</a>
  <a href="logout.php" style="float: right"><i class="fa fa-fw fa-sign-out "></i>Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>
<center>
  <div style="background-color: #4EB1BA; height: 45px; width: 100%; color: white; "><h1>My Loan</h1></div>
  <table cellpadding="10">
    <col width="400">
    <col width="600">
    <tr style="background-color:#86C232">
      <td><b>Loan Type : </b></td>
      <td><?php echo $loan_type ?></td>
    </tr>
    <tr style="background-color:#86C232">
      <td><b>Amount : </b></td>
      <td><?php echo $amount ?></td>
    </tr>
	<tr style="background-color:#86C232">
      <td><b>Interest : </b></td>
      <td><?php echo $interest ?></td>
    </tr>

	<tr>
      <td colspan="2" align="right" style="border-top: 1px #474B4F;"><input type="button" name="Take Loan" value="Take Loan" onclick="window.location.href='take loan.php'" style="height: 40px; width: 180px; color: white; background-color: #4CAF50"></td>
    </tr>
  </table>
</center>
</body>
</html>

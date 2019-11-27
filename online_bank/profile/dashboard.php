<?php
session_start();
$account_no = $_SESSION['account_no'];
$con = mysqli_connect("localhost","root","Jelwin,2000","db_bank");
$resultr = mysqli_query($con, "SELECT * FROM register WHERE account_no = '$account_no'");
$rowr = mysqli_fetch_array($resultr,MYSQLI_ASSOC);
$balance = $rowr['balance'];
$card_no=$rowr['card_no'];
$firstname = $rowr['firstname'];
$lastname = $rowr['lastname'];
$acc_type=$rowr['acc_type'];
if($acc_type=='Saving')
	$cardlimit=5000;
else if($acc_type=='Current')
	$cardlimit=10000;
else {
	$cardlimit=100000;
}

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
</head>
<body style="background-image: url('../img/bgr.jpg'); background-attachment: fixed;
  background-size: cover;">

<div class="topnav" id="myTopnav">
  <img style="float:right; right:1" src="../img/profile.jpg" height="50" width="150">
  <a href="dashboard.php" class="active"><i class="fa fa-fw fa-calculator "></i>Dashboard</a>
  <a href="profile.php"><i class="fa fa-fw fa-id-card-o "></i>Profile</a>
  <a href="transfer.php"><i class="fa fa-fw fa-cogs "></i>Transfer Money</a>
  <a href="transactions.php"><i class="fa fa-fw fa-file-text "></i>Transactions</a>
  <a href="Loan.php"><i class="fa fa-fw fa-sliders "></i>Loan</a>
  <a href="logout.php" style="float: right"><i class="fa fa-fw fa-sign-out "></i>Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>
<h2 align="right" style="color: black; width: 95%">Welcome "<u><?php echo $firstname . " " . $lastname ?></u>"</h2>
<center><table bgcolor="#ffffff">
  <col width="869">
  <tr>
    <td>
      <h2 align="center">Bank Account</h2>
    </td>
  </tr>
</table>
<table bgcolor="#ffffff" opacity="0.7" cellspacing="80">
  <tr>
    <td>
      <table style="border-collapse: collapse; border: 1px solid black">
        <col width="80">
        <col width="200">
        <tr>
          <td><img src="../img/d1.jpg" height="110px"; width="110px"></td>
          <td ><center><h4>My Balance</h4><p id="balance">Rs. <?php echo $balance ?></p></center></td>
        </tr>
      </table>
    </td>
    <td>
      <table style="border-collapse: collapse; border: 1px solid black">
        <col width="80">
        <col width="200">
        <tr>
          <td><img src="../img/d1.jpg" height="110px"; width="110px"></td>
          <td ><center><h4>ACCOUNT NUMBER</h4><p id="tlimit"><?php echo $account_no ?></p></center></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <table style="border-collapse: collapse; border: 1px solid black">
        <col width="80">
        <col width="200">
        <tr>
          <td><img src="../img/d4.jpg" height="110px"; width="110px"></td>
          <td ><center><h4>CARD NUMBER</h4><p id="olimit"><?php echo $card_no ?></p></center></td>
        </tr>
      </table>
    </td>
    <td>
      <table style="border-collapse: collapse; border: 1px solid black">
        <col width="80">
        <col width="200">
        <tr>
          <td><img src="../img/d4.jpg" height="110px"; width="110px"></td>
          <td ><center><h4>Card Limit</h4><p id="climit">Rs. <?php echo $cardlimit?></p></center></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</center>
</body>
</html>

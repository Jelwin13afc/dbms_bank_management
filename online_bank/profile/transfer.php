<?php
session_start();
$account_nom = $_SESSION['account_no'];
$con = mysqli_connect("localhost","root","Jelwin,2000","db_bank");
$connection = mysqli_connect("localhost","root","Jelwin,2000","db_transactions");
$resultm = mysqli_query($con, "SELECT * FROM register WHERE account_no = '$account_nom'");
$rowm = mysqli_fetch_array($resultm,MYSQLI_ASSOC);
$my_balance = $rowm['balance'];
//$online_limit = $rowm['online_limit'];
//$online_no = $rowm['online_no'];
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $account_noo = $_POST['account_noo'];
  $amount = $_POST['amount'];
  $resulto = mysqli_query($con, "SELECT * FROM register WHERE account_no = '$account_noo'");
  $count = mysqli_num_rows($resulto);
  if($count==1)
  {
	if($account_nom==$account_noo)
		echo "invalid";
	else{
    $rowo = mysqli_fetch_array($resulto,MYSQLI_ASSOC);
    $other_balance = $rowo['balance'];
    $my_balance = $my_balance - $amount;
    $other_balance = $other_balance + $amount;
    //$online_limit = $online_limit - $amount;
    //$online_no = $online_no - 1;
    $date = date("Y-m-d");
    $remarkm = "transfer to ".$account_noo;
    $remarko = "from ".$account_nom;
    $c = mysqli_multi_query($con, "update register set balance = '$my_balance' where account_no = '$account_nom'; update register set balance = $other_balance where account_no = '$account_noo';");
    $s = mysqli_multi_query($connection, "INSERT INTO `$account_nom`(date, remark, debit, credit, balance) VALUES('$date', '$remarkm', '$amount', '0', '$my_balance'); INSERT INTO `$account_noo` (date, remark, debit, credit, balance) VALUES('$date', '$remarko', '0', '$amount', '$other_balance');");
    if($c && $s) {header("refresh:0;url=success.html"); } else {echo "no";}
    }
	}
  else {
    header("refresh:0;url=transferW.php");
	}
 
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
<link rel="stylesheet" href="../css/style.css">
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
function validate() {
      var v = document.getElementById("amount").value;
      if(isNaN(v)) {
        document.getElementById("msg").innerHTML = "Should be a Number";
      }
      else {
        document.getElementById("msg").innerHTML = "";
      }
    }
</script>
</head>
<body style="background-color:#474B4F;">

<div class="topnav" id="myTopnav">
  <img style="float:right; right:1" src="../img/profile.jpg" height="50" width="150">
  <a href="dashboard.php"><i class="fa fa-fw fa-calculator "></i>Dashboard</a>
  <a href="profile.php"><i class="fa fa-fw fa-id-card-o "></i>Profile</a>
  <a href="transfer.php" class="active"><i class="fa fa-fw fa-cogs "></i>Transfer Money</a>
  <a href="transactions.php"><i class="fa fa-fw fa-file-text "></i>Transactions</a>
  <a href="Loan.php"><i class="fa fa-fw fa-sliders "></i>Loan</a>
  <a href="logout.php" style="float: right"><i class="fa fa-fw fa-sign-out "></i>Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>
<center>
  <div style="background-color: #4EB1BA; height: 45px; width: 100%; color: white; "><h1>Transfer Money</h1></div>
  <br><br>
  <form action="" method="POST">
    <table width="40%">
      <tr>
        <td>
          <input type="text" name="account_noo" class="question" id="account_noo" required autocomplete="off" />
          <label for="account_noo"><span>Account Number</span></label>
        </td>
      </tr>
    </table>
    <table width="40%">
      <tr>
        <td>
          <input type="text" name="amount" class="question" id="amount" required autocomplete="off" oninput="validate()" />
          <label for="amount"><span>Amount(in Rs.)</span></label>
          <div style="color: red;" id="msg"></div>
        </td>
      </tr>
    </table>
    <br>
    <table width="80%">
      <tr>
        <td align="right"><input type="submit" name="submit" value="PAY NOW" style="height: 40px; width: 150px; font-size: 20px; color: white; background-color: #4CAF50"></td>
      </tr>
    </table>
  </form>
</center>
</body>
</html>

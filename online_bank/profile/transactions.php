<?php
session_start();
$account_no = $_SESSION['account_no'];
$con = mysqli_connect("localhost","root","Jelwin,2000","db_transactions");
$result = mysqli_query($con, "SELECT * FROM `$account_no`");
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
</script>
<style type="text/css">
  table { border: 1px solid black; border-collapse: collapse; }
  table td{border: 1px solid black;}
  table th{border: 1px solid black;}
</style>
</head>
<body style="background-color:#f2f2f2;">

<div class="topnav" id="myTopnav">
  <img style="float:right; right:1" src="../img/profile.jpg" height="50" width="150">
  <a href="dashboard.php"><i class="fa fa-fw fa-calculator "></i>Dashboard</a>
  <a href="profile.php"><i class="fa fa-fw fa-id-card-o "></i>Profile</a>
  <a href="transfer.php"><i class="fa fa-fw fa-cogs "></i>Transfer Money</a>
  <a href="transactions.php" class="active"><i class="fa fa-fw fa-file-text "></i>Transactions</a>
  <a href="Loan.php"><i class="fa fa-fw fa-sliders "></i>Loan</a>
  <a href="logout.php" style="float: right"><i class="fa fa-fw fa-sign-out "></i>Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>
<center>
  <div style="background-color: #4EB1BA; height: 45px; width: 100%; color: white; "><h1>My Transaction</h1></div>
  <br><br>
  <table cellpadding="5" width="80%">
    <tr style="background-color:#86C232">
      <th align="center">Transaction Date</th>
      <th align="center">Transaction Remarks</th>
      <th align="center">Debit</th>
      <th align="center">Credit</th>
      <th align="center">Account Balance</th>
    </tr>
    <?php
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      while ($row) {
        if($row['debit']) {
          echo "<tr  ><td align=\"center\">".$row['date']."</td><td align=\"center\">".$row['remark']."</td><td align=\"center\">".$row['debit']."</td><td></td><td align=\"center\">".$row['balance']."</td></tr>";
        }
        else {
          echo "<tr><td align=\"center\">".$row['date']."</td><td align=\"center\">".$row['remark']."</td><td></td><td align=\"center\">".$row['credit']."</td><td align=\"center\">".$row['balance']."</td></tr>";
        }
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      }
    ?>
  </table>
</center>
</body>
</html>

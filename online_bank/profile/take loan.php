<?php
session_start();
$account_no = $_SESSION['account_no'];
$con = mysqli_connect("localhost","root","Jelwin,2000","db_bank");
$result = mysqli_query($con, "SELECT * FROM loan_info WHERE account_no = '$account_no'");
$result1 = mysqli_query($con, "SELECT * FROM register WHERE account_no = '$account_no'");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
$ac1=$row['account_no'];

if($ac1!=$account_no)
{$c= mysqli_query($con,"insert into loan_info(account_no) values ('$account_no')");}
$loan_type1 = $row['loan_type'];
$amount1 = $row['amount'];
$interest1 = $row['interest'];
$balance =$row1['balance'];
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $loan_type = $_POST['loan_type'];
  $amount = $_POST['amount'];
  $balance=$balance+$amount;
  $result_interest=mysqli_query($con,"select * from loan_interest where loan_type='$loan_type'");
  $row2 = mysqli_fetch_array($result_interest,MYSQLI_ASSOC);
  $interest=$row2['interest'];
  $interest=$interest*$amount;
  $interest1=$interest1+($interest/100);
  $amount=$amount+$amount1;
  $z=mysqli_query($con,"update loan_info set loan_type='$loan_type',amount='$amount',interest='$interest1' where account_no='$account_no';");
  $z=mysqli_query($con,"update register set balance='$balance' where account_no='$account_no';");
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
  <div style="background-color: #4EB1BA; height: 45px; width: 100%; color: white; "><h1>Take Loan</h1></div>
  <br><br>
  <form action="" method="post">
    <table width="40%">
      <tr style="background-color:#86C232">
          <td><b><label for="loan_type"><span>loan_type</span></label></b></td>
          <td><select name="loan_type">
		  <option value="student loan">student loan</option>
		  <option value="home loan">home loan</option>
		  <option value="car loan">car loan</option>
		  <option value="education loan">education loan</option>
		  </select>
		  </td>
      </tr>
    </table>
	<br>
    <table width="40%">
      <tr style="background-color:#86C232">
        
          <td><b><label for="amount"><span>Amount(in Rs.)</span></label></b></td>
           <td>
          <input type="text" name="amount" class="question" id="amount" required autocomplete="off" oninput="validate()" />
          <div style="color: red;" id="msg"></div>
        </td>
        
      </tr>
    </table>
    <br>
		<div style = "position:relative; left:200px; top:100px">
          <align="right"><input type="submit" name="submit" value="TAKE LOAN" style="height: 40px; width: 150px; font-size: 20px; color: white; background-color: #4CAF50">
      </div>
       
  </form>
</center>
</body>
</html>

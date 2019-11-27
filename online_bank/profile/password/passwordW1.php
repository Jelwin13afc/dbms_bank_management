  <?php
session_start();
$account_no = $_SESSION['account_no'];
$con = mysqli_connect("localhost","root","Jelwin,2000","db_bank");
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $confirm_password =$_POST['new_password_confirmation'];
  $result = mysqli_query($con, "SELECT * FROM login WHERE account_no = '$account_no'");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $password = $row['pwd'];
 if($password == $old_password) {
  if( $new_password==$confirm_password){
    $c = mysqli_query($con, "update login set pwd = '$new_password' where account_no = '$account_no';");
    header("refresh:0;url=../pass_success.html");
	}
	else {
	 header("refresh:0;url=passwordW1.php");
	}
  }
  else {
    header("refresh:0;url=passwordW.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>BANKIS BANK</title>
  <link rel="icon" href="../../img/profile.jpg" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../css/response.css">
<link rel="stylesheet" href="../../css/style.css">
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
      var v1 = document.getElementById("new_password").value;
      var v2 = document.getElementById("new_password_confirmation").value;
      if(v1 != v2) {
        document.getElementById("msg").innerHTML = "Password do not match";
      }
      else {
        document.getElementById("msg").innerHTML = "";
      }
    }
</script>
</head>
<body style="background-color:#474B4F;">

<div class="topnav" id="myTopnav">
  <img style="float:right; right:1" src="../../img/profile.jpg" height="50" width="150">
  <a href="../dashboard.php"><i class="fa fa-fw fa-calculator "></i>Dashboard</a>
  <a href="../profile.php" class="active"><i class="fa fa-fw fa-id-card-o "></i>Profile</a>
  <a href="../transfer.php"><i class="fa fa-fw fa-cogs "></i>Transfer Money</a>
  <a href="../transactions.php"><i class="fa fa-fw fa-file-text "></i>Transactions</a>
  <a href="../Loan.php"><i class="fa fa-fw fa-sliders "></i>Loan</a>
  <a href="../logout.php" style="float: right"><i class="fa fa-fw fa-sign-out "></i>Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>
<center>
  <div style="background-color: #4EB1BA; height: 45px; width: 100%; color: white; "><h1>Change Password</h1></div>
  <br><br>
  <br>
  <div><p style="color: red">Confirm Password does not match with new password</p></div>
  <form action="" method="POST">
    <table width="40%">
      <tr>
        <td>
          <input type="password" name="old_password" class="question" id="old_password" required autocomplete="off" />
          <label for="old_password"><span>Old Password</span></label>
        </td>
      </tr>
    </table>
    <table width="40%">
      <tr>
        <td>
          <input type="password" name="new_password" class="question" id="new_password" required autocomplete="off" />
          <label for="new_password"><span>New Password</span></label>
        </td>
      </tr>
    </table>
    <table width="40%">
      <tr>
        <td>
          <input type="password" name="new_password_confirmation" class="question" oninput="validate()" id="new_password_confirmation" required autocomplete="off" />
          <label for="new_password_confirmation"><span>Confirm Password</span></label>
          <div style="color: red;" id="msg"></div>
        </td>
      </tr>
    </table>
    <br>
    <table width="80%">
      <tr>
        <td align="right"><input type="submit" name="submit" value="CHANGE PASSWORD" style="height: 40px; width: 250px; font-size: 20px; color: white; background-color: #4CAF50"></td>
      </tr>
    </table>
  </form>
</center>
</body>
</html>

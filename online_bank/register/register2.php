<?php
  session_start();
  $fname = $_SESSION['firstname'];
  $lname = $_SESSION['lastname'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
    $_SESSION['firstname'] = $fname;
    $_SESSION['lastname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
	
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
</head>
<body style="background-color:#474B4F;">

<div class="topnav" id="myTopnav">
  <img src="../img/profile.jpg" height="50" width="150">
  <a href="../index.html" class="active"><i class="fa fa-fw fa-home "></i>Home</a>
  <a href="../login/login.html" style="float: right"><i class="fa fa-fw fa-sign-in "></i>Login</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>
  <center>
    <div style="background-color: #4EB1BA; height: 80px; width: 100%; align-items: center; color: white "><h1>Registration : Step 2</h1>
  <p>* All Field are Mandatory</p></div>
  <br>
  <hr class="colorgraph">
  <form action="../db/register.php" method="post">
    <table width="80%" cellspacing="8">
      <col width="400">
      <col width="400">
      <tr>
        <td>
          <input type="text" name="phone" class="question" id="phone" required autocomplete="off" />
          <label for="phone"><span>Mobile Number*</span></label>
        </td>
        <td>
          <select class="question" id="acc_type" name="acc_type" required autocomplete="off">
            <option value="Saving">Saving Account</option>
            <option value="Current">Currrent Account</option>
			<option value="Investment">Investment Account</option>
          </select>
          <label for="acc_type"><span>Account Type*</span></label>
        </td>
      </tr>
    </table>	
    <table width="80%" cellspacing="8">
      <tr>
        <td>
          <input type="text" name="address1" class="question" id="address1" required autocomplete="off" />
          <label for="address1"><span>Address Line 1*</span></label>
        </td>
      </tr>
    </table>
    <table width="80%" cellspacing="8">
      <tr>
        <td>
          <input type="text" name="address2" class="question" id="address2" required autocomplete="off" />
          <label for="address2"><span>Address Line 2*</span></label>
        </td>
      </tr>
    </table>
    <table width="80%" cellspacing="8">
      <tr>
        <td>
          <input type="text" name="city" class="question" id="city" required autocomplete="off" />
          <label for="city"><span>City*</span></label>
        </td>
        <td>
          <input type="text" name="state" class="question" id="state" required autocomplete="off" />
          <label for="state"><span>State*</span></label>
        </td>
        <td>
          <input type="text" name="country" class="question" id="country" required autocomplete="off" />
          <label for="country"><span>Country*</span></label>
        </td>
      </tr>
    </table>
    <table width="80%" cellspacing="8">
      <tr>
        <td>
          <input type="text" name="father" class="question" id="father" required autocomplete="off" />
          <label for="father"><span>Father's Name*</span></label>
        </td>
        
        <td>
          <input type="text" name="nationality" class="question" id="nationality" required autocomplete="off" />
          <label for="nationality"><span>Nationality*</span></label>
        </td>

		<td>
          <select class="question" id="balance" name="balance" required autocomplete="off">
            <option value="1000">Rs.1000</option>
            <option value="500">Rs.500</option>
			<option value="250">Rs.250</option>
			<option value="100">Rs.100</option>
          </select>
          <label for="balance"><span>Balance*</span></label>
        </td>
      </tr>
    </table>
    <hr class="colorgraph">
    <table width="80%">
      <tr>
        <td align="center">
          <input type="submit" name="submit" value="REGISTER ME" style="height: 45px; width: 250px; font-size: 25px; color: white; background-color: #4CAF50">
        </td>
      </tr>
    </table>
  </form>
  </center>
</body>
</html>

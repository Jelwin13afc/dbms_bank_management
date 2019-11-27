<?php
$connection = mysqli_connect("localhost", "root", "Jelwin,2000", "db_bank");
$con = mysqli_connect("localhost","root","Jelwin,2000","db_transactions");
session_start();
if(isset($_POST['submit'])){
  $fname = $_SESSION['firstname'];
  $lname = $_SESSION['lastname'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
  $phone1 = $_POST['phone'];
  $acc_type = $_POST['acc_type'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $father = $_POST['father'];
  $balance = $_POST['balance'];
  $nationality = $_POST['nationality'];
  $account_no = rand(999999999,10000000000);
  $card_no=rand(99999999,10000000000);
  

  while (1) {
    $result = mysqli_query($connection, "SELECT account_no FROM login WHERE account_no='$account_no'");
    $count = mysqli_num_rows($result);
    if($count==0)
    {
      break;
    }
    $account_no = rand(999999999,10000000000);
  }
  $date = date("Y-m-d");
  $mobileregex = "/^[6-9][0-9]{9}$/";
	   if(preg_match($mobileregex, $phone1) == 1){
	$phone = $_POST['phone'];
    $s = mysqli_multi_query($connection, "insert into login(id, pwd, account_no) values ('$email',  '$password', '$account_no'); insert into register(account_no,card_no, firstname, lastname, email, phone, acc_type, address1, address2, city, state, country, father, nationality,balance) values ('$account_no','$card_no', '$fname',  '$lname',  '$email',  '$phone',  '$acc_type',  '$address1',  '$address2',  '$city',  '$state',  '$country',  '$father',   '$nationality','$balance');");
  $c = mysqli_multi_query($con, "create table `$account_no`(`date` VARCHAR(10) NOT NULL ,`remark` VARCHAR(200) NOT NULL ,`debit` INT(6) NOT NULL ,`credit` INT(6) NOT NULL ,`balance` INT(8) NOT NULL); INSERT INTO `$account_no` (date, remark, debit, credit, balance) VALUES('$date', 'New Account', '0', '1000', '1000');");
  if($s && $c) {
    $_SESSION['account_no'] = $account_no;
    header("refresh:0;url=../profile/dashboard.php");
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    }
  else {
  	print(c);

  }
   }
  else {
	header("refresh:0;url=../register/registerph.php");
}
}
?>
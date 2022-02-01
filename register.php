<?php

$conn=mysqli_connect('localhost','ragaranjini','phpmyadmin@raji13','ics-users');


$err = array('email' => '', 'uname' => '', 'pswd' => '', 'cpswd' => '','cb' => '', 'reg' => '');

if (isset($_POST['submitt'])) {
  $flag1=0 ;
  $flag2=0 ; 
  $flag3=0 ; 
  $flag4=0 ; 
  $flag5=0 ;
  if (empty($_POST['email'])) {
    $err['email'] = '* An e-mail is required *';
  } else {
    $email = $_POST['email'];
    $existing = mysqli_query($conn,"SELECT * FROM users WHERE email='".$_POST['email']."'");
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $err['email'] = '* Enter valid e-mail address *';
    }else if(mysqli_num_rows($existing)){
      $err['email'] = '* Already registered e-mail address *';
    }

    else{
      $flag1=1;
    }
  }
  if (empty($_POST['uname'])){
    $err['uname'] = '* username is required *';
  } else{
    $uname = $_POST['uname'];
    if(!preg_match('/^[a-z]{6,30}$/', $uname)){
      $err['uname'] = '* username must contain only lowercase alphabets(6-30 characters) *';
    }else{
      $flag2=1;
    }
  }
  if (empty($_POST['pswd'])) {
    $err['pswd'] = '* A password is required *';
  } else {
    $pswd = $_POST['pswd'];
    if (!preg_match('/^[1-9]{6,6}$/', $pswd)) {
      $err['pswd'] = '* Enter 6 digit password excluding 0 *';
    }else{
      $flag3=1;
    }
  }
  if (empty($_POST['pswd'])) {
    $err['cpswd'] =  '* Please confirm password *';
  } else {
    $cpswd = $_POST['cpswd'];
    if ($pswd != $cpswd) {
      $err['cpswd'] = '* Password do not match *';
    }else{
      $flag4=1;
    }
  }
  if (isset($_POST['checkbox'])=='') {
    $err['cb'] = '* checkbox is not checked *';
  }else{
    $flag5=1;
  }

  if($flag1==1&&$flag2==1&&$flag3==1&&$flag4==1&&$flag5==1){
    $email=$_REQUEST['email'];
    $username=$_REQUEST['uname'];
    $pswd=$_REQUEST['pswd'];
    $cpswd=$_REQUEST['cpswd'];
    $sql = "INSERT INTO users(email,username,pswd,cpswd) VALUES ('$email','$username','$pswd','$cpswd')";
    if(mysqli_query($conn,$sql)){
      $err['reg'] = 'Registered successfully !!! Please Login to view your Profile .';
    }else{
      $err['reg'] = '**error**';
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="authenticationcss.css">
  <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body>
  <div class="top">
    <img src="logo.png" alt="logo">
  </div>
  <div class="card justify-content-center p-5 bg-dark bg-opacity-10 shadow-lg" style="color: white;width: 400px;height: 550px;margin-left: 300px;margin-top: -50px;">
    <form class="inputs" action="register.php" method="POST">
      <h1>Create an Account</h1>
      <small>Enter valid informations to register</small><br />
      <input type="text" class="input-field-form-check1" style="height: 35px" placeholder="Email" name="email" />
      <p class="red-text" style="color: red"><?php echo $err['email']; ?></p>
      <input type="text" class="input-field-form-check1"style="height: 35px" placeholder="Username" name="uname" />
      <p class="red-text" style="color: red"><?php echo $err['uname']; ?></p>
      <input type="text" class="input-field-form-check1" style="height: 35px"placeholder="Password" name="pswd"/>
      <p class="red-text"style="color: red"><?php echo $err['pswd']; ?></p>
      <input type="text" class="input-field-form-check1" style="height: 35px"placeholder="Confirm Password" name="cpswd" />
      <div class="red-text"style="color: red"><?php echo $err['cpswd']; ?></div>

      <br />
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cb" name="checkbox"/>
        <label class="form-check-label" for="cb">You agree to our terms of service & privacy policy</label>
        <div class="red-text"style="color: red"><?php echo $err['cb']; ?></div>
      </div>
      <div class=center>
        <input type="submit" name="submitt" >
      </div>
      <div class="green-text"style="color:yellow;text-align: center;font-weight: 500"><?php echo $err['reg']; ?></div>
    </form>
  </div>

</body>
</html>


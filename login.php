<?php
session_start();
$conn=mysqli_connect('localhost','ragaranjini','phpmyadmin@raji13','ics-users');
$msg = array('log' => '','myemail' => '','mypswd' => '');
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if (empty($_POST['myemail'])) {
    $msg['myemail'] = '* An e-mail is required *';
  } 
  else if (empty($_POST['mypswd'])) {
    $msg['mypswd'] = '* Password is required *';
  } 
  else{
    $myemail= mysqli_real_escape_string($conn,$_POST['myemail']);
    $mypswd= mysqli_real_escape_string($conn,$_POST['mypswd']);
    $sql = "SELECT id FROM users WHERE email ='$myemail' and pswd = '$mypswd'";
    $query = "SELECT username FROM users WHERE email ='$myemail' and pswd = '$mypswd'";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $res = mysqli_query($conn,$query);
    $username=$res->fetch_array()['username']??'';
  //$active=$row['active'];
    $count=mysqli_num_rows($result);

    if($count==1){
      $_SESSION['myemail']=$myemail;
      $_SESSION['username']=$username;
      header("Location: myprofile.php");
    }else{
      $msg['log']="Invalid Login ! Please try again .";
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
  <div class="card justify-content-center p-5 bg-dark bg-opacity-10 shadow-lg" style="color: white; width: 400px;height: 500px; margin-left: 300px; margin-top: -50px;">
    <form class="inputs" action="login.php" method="POST">

      <h1>WELCOME BACK</h1>
      <small>Enter registered mail-id and password </small>
      <input type="text" class="input-field-form-check" placeholder="Email" name="myemail" style="height: 15%;" />
      <p class="red-text"style="color: red"><?php echo $msg['myemail']; ?></p>
      <input type="text" class="input-field-form-check" placeholder="Password" name="mypswd" style="height: 15%;" />
      <p class="red-text"style="color: red"><?php echo $msg['mypswd']; ?></p>
      <br />
      <br />
      <a href="#" target="_blank" style="color: white">Forgot Password</a>
      <br />
      <br />
      <div class=center>
        <input type="submit" name="submit" >
      </div>
      <div class="green-text"style="color: yellow;text-align: center;font-weight: 500"><?php echo $msg['log']; ?></div>
    </form>
  </div>

</body>
</html>

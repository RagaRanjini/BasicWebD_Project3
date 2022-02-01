<?php
session_start();
$conn=mysqli_connect('localhost','ragaranjini','phpmyadmin@raji13','ics-users');
$show = array('uname' => '', 'cname' => '');
$email = $_SESSION['myemail'];
$username = $_SESSION['username'];
if(isset($_POST['save'])){
	$newusername=$_POST['new_username'];
	$cusername=$_POST['c_username'];
	if(empty($_POST['new_username'])){
		$show['uname'] = '* Username is required *';
	}else if(!preg_match('/^[a-z]{6,30}$/', $newusername)){
      $show['uname'] = '* username must contain only lowercase alphabets(6-30 characters) *';
    }else{
    	if($cusername!=$newusername){
    		$show['cname'] = '* retyped username does not match *';
    	}else if(empty($_POST['c_username'])){
		$show['cname'] = '* confirm username *';
	}
    	else{
    		$sql=" UPDATE users SET username = '$newusername' WHERE email ='$email'";
    	    $result=mysqli_query($conn,$sql);
    	    $_SESSION['username']=$newusername;
    	    header('Location: myprofile.php');
    	}
    	
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="profilecss.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="top">
        <img src="logo.png" alt="logo">
    </div>
    <div class="card" style="border-radius: 10%;">
        <div class="card-content">
            <div class="card-body " style="height: 300px">
                <form class="inputs" action="profileupdate.php" method="POST" style="margin-top: 100px; margin-left: 20px">
                	<label><b>Username :</b></label>
                	<br>
                	<br>
                	<input type="text" name="new_username" placeholder="New username">
                	<div class="red-text"style="color: red"><?php echo $show['uname']; ?></div>
                	<br>
                	<br>
                	<label><b>Re-type username :</b></label>
                	<br>
                	<br>
                	<input type="text" name="c_username" placeholder="retype new username">
                	<div class="red-text"style="color: red"><?php echo $show['cname']; ?></div>
                	<br>
                	<input type="submit" name="save" class="btn btn-primary" style="">
                </form>
                <br>
                
            </div>
        </div>
    </div>

</body>
</html>
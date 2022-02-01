<?php
session_start();
$conn=mysqli_connect('localhost','ragaranjini','phpmyadmin@raji13','ics-users');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="profilecss.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="top">
        <img src="logo.png" alt="logo">
    </div>
    <div class="card" style="border-radius: 10%;">
        <div class="card-content">
            <div class="card-body p-0">
                <div class="profile"> <img src="profile.jpg"> </div>
                <div class="card-title"><h1><?php echo $_SESSION['username']; ?></h1> </div>
                <div class="card-subtitle">
                    <div class="uname"><?php echo $_SESSION['myemail']; ?></div>
                    <p> <small><br>Works at icrewsystems LLP since 2022 <br>Studies at Saveetha Engineering College<br>Born 13 November 2001 </small> </p>
                </div>
                <a href="profileupdate.php"><button class="btn btn-primary">Edit Profile</button></a>
            </div>
        </div>
    </div>
    
</body>
</html>
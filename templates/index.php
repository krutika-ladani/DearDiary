<?php
    session_start();
    if(isset($_SESSION['email']))
    {
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../static/css/main.css" rel="stylesheet">
    <link href="../static/css/index.css" rel="stylesheet">

    <title>DearDiary</title>
</head>
<body>
    
    <div id="header">
        <img src="logo.png" alt="logo" onclick="window.location.assign('aboutUs.html')">
    </div>

    <div id="info">
        <img src="first.jpg" alt="person writing journal">

        <p>
            Welcome to DearDiary, a personal online journal where you can express your thoughts, feelings, and experiences in a safe and private space. 
        </p>
    
        <br>
        <a href="loginPage.php">login</a>
        <a href="signUpPage.php" style="margin-right:0px">sign up</a>
    </div>
    
</body>
</html>
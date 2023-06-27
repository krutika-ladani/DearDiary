<!DOCTYPE.php>
.php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DearDiary</title>
    <script src="../static/js/verticalMenu.js"></script>
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css/verticalMenu.css">
    <link rel="stylesheet" href="../static/css/viewEntry.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-symbols-outlined 
        {
            font-size: 40px;
        }

    </style>
</head>
<body>


    <div id="header">
        <img src="logo.png" alt="logo" onclick="window.location.assign('aboutUs.php')">
        <div class="hMenu vMenu">
            <ul class="menu">
                <li class="menu-item" >
                    <a href="home.php">Home</a>
                </li>
                <li class="menu-item current">    
                    <a href="myProfile.php">My Profile</a>
                </li>
                <li class="menu-item">
                    <a href="aboutUs.php">About Us</a>
                </li>
                <li class="menu-item">
                    <a href="aboutUs.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <button class="but" onclick="toggleMenu()">
            <span class="material-symbols-outlined">
                menu
            </span>
        </button>
    </div>

    <div class="outer">
    
    </div>
    

    
</body>
<.php>
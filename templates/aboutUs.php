<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DearDiary</title>
    <script src="../static/js/verticalMenu.js"></script>
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css/verticalMenu.css">
    <link rel="stylesheet" href="../static/css/aboutUs.css">
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
                <li class="menu-item">    
                    <a href="myProfile.php">My Profile</a>
                </li>
                <li class="menu-item current">
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
    <div class="abt">
        <h2>About Us</h2>
    
        <p> 
            Our website is dedicated to helping individuals document their personal journeys and experiences, and to create a lasting record of their thoughts and reflections.
            At DearDiary, we understand that life is a journey, and that each person's journey is unique. Whether you're navigating a difficult time in your life, working towards a personal goal, or simply looking to document your everyday experiences, our journal is the perfect tool to help you do so. Our mission is to create a safe and private space where you can be yourself, and where your thoughts and feelings are respected and valued. We believe that journaling can be a powerful tool for self-discovery and personal growth, and we aim to support you on your journey every step of the way.
            Thank you for choosing DearDiary as your personal journaling platform. We hope that our website provides you with a space to explore your thoughts and feelings, and to create a lasting record of your personal journey.
        </p>
    </div> 
</body>
</php>
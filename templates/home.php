<?php
        session_start();
?>
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
    <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-symbols-outlined 
        {
            font-size: 40px;
        }

    </style>
</head>
<body>

    <?php
        require "navbar.php"
    ?>
    <script>
        document.getElementById("home").className="menu-item current";
    </script>

    <div class="outer">
        <p>Heyy buddy! How was your day today?</p>
        <img src="journal.png" alt="person writing journal" align="center">
        <br>
        <a href="newEntry.php">New Entry</a>
        <a href="viewEntry.php" style="margin-right:0px">View Entry</a>
    </div>
        
</body>
</php>

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
    <script src="../static/js/viewEntry.js"></script>
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
                <li class="menu-item current" >
                    <a href="home.php">Home</a>
                </li>
                <li class="menu-item">    
                    <a href="myProfile.php">My Profile</a>
                </li>
                <li class="menu-item">
                    <a href="aboutUs.php">About Us</a>
                </li>
                <li class="menu-item">
                    <a href="contactUs.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <button class="but" onclick="toggleMenu()">
            <span class="material-symbols-outlined">
                menu
            </span>
        </button>
    </div>
    <h1>Previous Entries</h1>
    <div class="warning"></div>

    <div class="outer">
    
    <table>
        <tr>
            <th>Date <br> <span class="date_format">(YYYY-MM-DD)</span></th>
            <th>Title</th>
            <th id="content_head">Contents</th>
        </tr>

    <?php
        $email = $_SESSION["email"];
        try
        {    
            $conn = mysqli_connect("127.0.0.1:4306", "root", "", "deardiary");
            if(!$conn)
            {
                die("<script> 
                        var war=document.getElementsByClassName('warning')[0];
                        war.innerHTML='There is some problem from our side. Please try again after some time.';
                    </script>");
            }
            else
            {
                $sql = "select * from entries where email='$email'";
                $result = mysqli_query($conn, $sql);
                if($row = mysqli_fetch_assoc($result))
                {
                    $count = 1;
                    echo "<tr class='rows' id='r"."$count"."' onclick='expand(this.id)'>
                            <td class='date'> ".$row['e_date']."</td>
                            <td class='title'>". $row['title']."</td>
                            <td class='contents'>".substr($row['content'],0,180)."........."."</td></tr>";

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $count = $count + 1;
                        echo "<tr class='rows' id='r"."$count"."' onclick='expand(this.id)'>
                                <td class='date'> ".$row['e_date']."</td>
                                <td class='title'>". $row['title']."</td>
                                <td class='contents'>".substr($row['content'],0,180)."........."."</td></tr>";
                    }
                } 
                else
                {
                    echo "<script> 
                            var war=document.getElementsByClassName('warning')[0];
                            war.innerHTML='No entries to view!';
                        </script>";
                }                  
            }
        } 
        catch (mysqli_sql_exception $e) 
        {
            throw $e;   
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
        }
       
    ?>
    </table>
    </div>
    
</body>
</php>
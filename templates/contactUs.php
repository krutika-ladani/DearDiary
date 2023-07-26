<?php
    session_start()
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
    <link rel="stylesheet" href="../static/css/contactUs.css">
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
        document.getElementById("contact").className="menu-item current";
    </script>

    <div class="outer">
        <p class="warning"><br></p>
        <div class="inner">
            <form action="contactUs.php" method="post">
                <h1>Send us a message</h1>
                <input class="field" type="text" name="fname" placeholder="First Name" required>
                <input class="field" type="text" name="lname" placeholder="Last Name" required>
                <input class="field" type="email" name="email" value=<?php echo "'".$_SESSION['email']."'";?> required>
                <input class="field" type="text" name="subject" placeholder="Subject" required>
                <p class="ins">Tell us how can we help you:</p>
                <textarea class="field" name="content" id="content" required></textarea>
                <input type="submit" id="sub" value="Send">
            </form>
        </div>
    </div> 
    <?php
        if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["content"]))
        {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $content = $_POST["content"];

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
                    $sql = "INSERT INTO messages(fname, lname, email, subject, message) VALUES ('$fname', '$fname', '$email', '$subject', '$content')";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        echo "<script> 
                           alert('Message sent successfully! Your message will be processed within 7 days.');
                        </script>";
                    }
                    else
                    {
                        echo "<script> 
                            var war=document.getElementsByClassName('warning')[0];
                            war.innerHTML='There is some problem from our side. Please try again after some time.';
                        </script>";
                    }
                    
                }
            } 
            catch(Exception $e) 
            {
                echo 'Message: ' .$e->getMessage();
            }
           
        }
        
    ?>
</body>
</php>
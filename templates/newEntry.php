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
    <link rel="stylesheet" href="../static/css/newEntry.css">
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
        require "navbar.php";
    ?>
    <script>
        document.getElementById("home").className="menu-item current";
    </script>

    <div class="warning"><br></div>

    <div class="outer">
        <form action="newEntry.php" method="post">
            <div class="details">
                <input type="text" name="title" id="title" placeholder="Entry Title" required>
            </div>
            <div class="details">
            <div class="details">
            <input type="date" name="date" id="date" required><input type="submit" class="sub" value="save">
            </div>
            <div class="entry">
                <textarea name="text" id="text" placeholder="Write your entry here"></textarea>
            </div>
        </form>
    </div>
    
    <?php
        
        if(isset($_POST["title"]))
        {
            $title = $_POST["title"];
            $title = str_replace('"', '\"', $title);
            $title = str_replace("'", "\'", $title);
            $date = $_POST["date"];
            $email = $_SESSION["email"];
            $content = $_POST["text"];
            $content = str_replace('"', '\"', $content);
            $content = str_replace("'", "\'", $content);

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
                    $sql = "INSERT INTO entries(email, e_date, title, content) VALUES('$email', '$date', '$title', '$content')";
                    
                    if(mysqli_query($conn, $sql))
                    {
                        echo "
                            <script>
                                alert('Entry saved successfully!');
                                window.location = 'http://localhost/deardiary/templates/viewEntry.php';
                            </script>
                        ";
                    }
                    else
                    {
                        echo "<script>
                            var war=document.getElementsByClassName('warning')[0];
                            war.innerHTML='Entry could not be saved, please try again after some time!';
                        </script>";
                    }
                    
                }
            } 
            catch (mysqli_sql_exception $e) 
            {
                if (mysqli_errno($conn) == 1062) 
                {
                        echo "<script> 
                            alert('Entry already exists!');
                        </script>";
                }
                else
                {
                    throw $e;   
                }
            }
            catch (mysqli_sql_exception $e) 
            { 
                var_dump($e);
            } 
            catch(Exception $e) 
            {
                echo 'Message: ' .$e->getMessage();
            }
           
        }
        
    ?>
    
</body>
</php>
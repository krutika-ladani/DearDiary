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
    <script src="../static/js/editEntry.js"></script>
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css/verticalMenu.css">
    <link rel="stylesheet" href="../static/css/newEntry.css">
    <link rel="stylesheet" href="../static/css/editEntry.css">
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
        <form action="editEntry.php" method="post" id="form">
            <div class="details">
                <input type="text" name="title" id="title" placeholder="Entry Title" value=<?php if(isset($_GET["title"])){echo "'".$_GET['title']."'";} ?> required readonly>
            </div>
            <div class="details">
            <div class="details">
            <input type="date" name="date" id="date" value=<?php if(isset($_GET["title"])){ echo "'".$_GET['date']."'";} ?> required readonly>
            <input type="button" class="sub" id="edit" value="edit" onclick="edit_entry()">
            <input type="button" class="sub" id="delete" value="delete" onclick="delete_entry()">
            </div>
            <div class="entry">
                <textarea name="text" id="text" placeholder="Write your entry here" readonly></textarea>
            </div>
            <input type="hidden" id="old_date" name="old_date" value=<?php if(isset($_GET["title"])){ echo "'".$_GET['date']."'";} ?> >
            <input type="hidden" id="old_title" name="old_title" value=<?php if(isset($_GET["title"])){echo "'".$_GET['title']."'";} ?> >
        </form>
    </div>
    
    <?php

        
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
                    if(isset($_GET["date"]) && isset($_GET["title"]))
                    {
                        $email = $_SESSION["email"];
                        $date = $_GET["date"];
                        $title = $_GET["title"];
                        $sql = " SELECT content FROM entries where email='$email' AND e_date='$date' AND title='$title'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $content = $row["content"];
                        $content = str_replace('"', '\"', $content);
                        $content = str_replace("'", "\'", $content);
                        $content = str_replace("\r\n", "\\r\\n", $content);
                    
                    echo "<script>
                        var con = '$content';
                        document.getElementById('text').value = con;
                        </script>";
                    }
                    if(isset($_POST["date"]) && isset($_POST["title"]) && isset($_POST["text"]))
                    {

                        $title = $_POST["title"];
                        $title = str_replace('"', '\"', $title);
                        $title = str_replace("'", "\'", $title);
                        
                        $date = $_POST["date"];
                        
                        $email = $_SESSION["email"];
                        
                        $content = $_POST["text"];
                        $content = str_replace('"', '\"', $content);
                        $content = str_replace("'", "\'", $content);

                        $old_title = $_POST["old_title"];
                        $old_title = str_replace('"', '\"', $old_title);
                        $old_title = str_replace("'", "\'", $old_title);
                        
                        $old_date = $_POST["old_date"];

                        $sql = " UPDATE entries SET e_date='$date', title='$title', content='$content' WHERE e_date='$old_date' AND title='$old_title'";
                        
                        if(mysqli_query($conn, $sql))
                        {
                            echo "
                                <script>
                                    alert('Entry updated successfully!');
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
           
        
    ?>
    
</body>
</php>
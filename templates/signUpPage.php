<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DearDiary</title>
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css/login_signup.css">
    <script src="../static/js/signUpPage.js"></script>
    <style>

    </style>
</head>
<body>
    <div id="header">
        <img src="logo.png" alt="logo" onclick="window.location.assign('aboutUs.php')">
    </div>
    <h2>To join our community enter the below given details:</h2>
    <p>Already registered? <a href="loginPage.php">login</a></p>
    <p class="warning"></p>
    
    <div id="frm">
        <form action="signUpPage.php" method="post" id="signupform">
            <div class="inp">
                <label for="name">name:</label><br>
                <input type="text" name="name" id="name" autcomplete="name">
            </div>
            <div class="inp">
                <label for="email"> Email:</label><br>
                <input type="email" name="email" id="email" autocomplete="email">
            </div>
            <div class="inp">
                <label for="pswd"> password:</label><br>
                <input type="password" name="pswd" id="pswd">
            </div>
            <div class="inp">
                <label for="cpswd">confirm password:</label><br>
                <input type="password" name="cpswd" id="cpswd">
            </div>
            <div class="inp" align="center">
                <button type="button" class="sub" id="sub" onclick="validate()">sign up</button>
            </div>

        </form>
    </div>
    
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"])&& isset($_POST["pswd"])&& isset($_POST["cpswd"]))
        {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pswd = $_POST["pswd"];
            $cpswd = $_POST["cpswd"];

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
                    $sql = "INSERT INTO login_credentials(uname,email,pswd) VALUES ('$name', '$email', '$pswd')";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        session_start();
                        $_SESSION["email"] = $email;
                        mysqli_close($conn);
                        header("Location: http://localhost/deardiary/templates/home.php");
                        die();
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
            catch (mysqli_sql_exception $e) 
            {
                if (mysqli_errno($conn) == 1062) 
                {
                    echo "<script> 
                            var war=document.getElementsByClassName('warning')[0];
                            war.innerHTML='Email already registered!';
                        </script>";
                }
                else
                {
                    throw $e;   
                }
            }
            catch (Exception $e) 
            {
                // not a MySQL exception
                echo "$e->getMessage()";
            }
           
        }
    ?>
    
</body>
</html>
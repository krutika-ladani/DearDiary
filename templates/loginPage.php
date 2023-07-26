<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DearDiary</title>
    <script src="../static/js/loginPage.js"></script>
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css/login_signup.css">

</head>
<body>
    <div id="header">
        <img src="logo.png" alt="logo" onclick="window.location.assign('aboutUs.html')">
    </div>

    <div class="outer">
        <p class="warning"><br><br></p>
        <div id="frm" class="loginmain">
            <a href="#frm" class="logsign" id="log">login</a>
            <a href="signUpPage.php" class="logsign other" id="sign">signup</a>
            <form action="loginPage.php" method="post" id="loginform">
                <div class="inp">
                    <label for="email"> Email:</label><br>
                    <input type="email" name="email" id="email" autocomplete="email">
                </div>
                <div class="inp">
                    <label for="pswd"> password:</label><br>
                    <input type="password" name="pswd" id="pswd">
                </div>
                <div class="forgotpswd">
                    <a href="forgotPswd.php" class="fp">forgot password?</a>
                </div>
                <div class="inp" align="center">
                    <button type="button" class="sub" id="sub" onclick="validate()">login</button>
                </div>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST["email"])&& isset($_POST["pswd"]))
        {
            $email = $_POST["email"];
            $pswd = $_POST["pswd"];
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
                    $sql = "select email,pswd from login_credentials where email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if($row = mysqli_fetch_assoc($result))
                    {
                        if($row['pswd']==$pswd)
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
                                    war.innerHTML='Password is incorrect!';
                                </script>";

                        }
                    } 
                    else
                    {
                        echo "<script> 
                                var war=document.getElementsByClassName('warning')[0];
                                war.innerHTML='No such user exists!';
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
           
        }
    ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DearDiary</title>
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css/login_signup.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="../static/js/forgotPswd.js"></script>

</head>
<body>
    <div id="header">
        <img src="logo.png" alt="logo" onclick="window.location.assign('aboutUs.html')">
    </div>
    <h2>Forgot password?</h2>
    <p>Enter your registered Email ID and we will send you the password via mail</p>
    <p class="warning"></p>
    <div id="frm">
        <form action="forgotPswd.php" method="post">
            <div class="inp">
                <label for="email"> Email:</label><br>
                <input type="email" id="email" name="email">
            </div>
            <div class="inp" align="center">
                <input type="submit" class="sub" value="Send">
            </div>
        </form>
    </div>

    <?php
        if(isset($_POST["email"]))
        {
            $email = $_POST["email"];
            
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
                    $sql = "select pswd from login_credentials where email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if($row = mysqli_fetch_assoc($result))
                    {
                        echo "<script>
                                send_mail();
                            </script>";
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
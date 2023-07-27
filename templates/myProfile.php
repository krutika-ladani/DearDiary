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
    <link rel="stylesheet" href="../static/css/myProfile.css">
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
        document.getElementById("profile").className="menu-item current";
    </script>

    <div class="outer">
        <p class="warning"><br></p>
        <div class="inner">
            <form action="myProfile.php" method="post">

                <img src="user.png" class="user">
                
                <label for="fname">First Name:</label><br>
                <input class="field" type="text" name="fname" id="fname">
                
                <label for="lname">Last Name:</label><br>
                <input class="field" type="text" name="lname" id="lname">
                
                <label for="email"> Email:</label><br>
                <input class="field" type="email" name="email" id="email" value=<?php echo "'".$_SESSION['email']."'";?> readonly>
                
                <label for="age">Age:</label><br>
                <input class="field" type="number" name="age" id="age">
                
                <label>Gender:</label><br>
                <div class="age"><input class="radio" type="radio" name="male" id="gender" value="male">Male
                <input class="radio" type="radio" name="gender" id="female" value="female">Female <br></div>

                <input type="submit" id="sub" value="Update">
            </form>
        </div>
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
                $email = $_SESSION["email"];
                $sql = " select * from profile where email='$email'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $fname = $row['fname'];
                $lname = $row['lname'];
                $age = $row['age'];
                $gender = $row['gender'];

                echo "<script>
                        document.getElementById('fname').setAttribute('value', '$fname');
                        document.getElementById('lname').setAttribute('value', '$lname');
                        if($age != 0)
                        {
                            document.getElementById('age').setAttribute('value', '$age');
                        }
                        if('$gender' === 'female')
                        {
                            document.getElementById('female').setAttribute('checked', 'true');
                        }
                        if('$gender' === 'male')
                        {
                            document.getElementById('male').setAttribute('checked', 'true');
                        }
                    </script>";



                if(isset($_POST["fname"]) || isset($_POST["lname"]) || isset($_POST["age"]) || isset($_POST["gender"]))
                {
                    
                    if(isset($_POST["fname"]))
                    {
                        $fname = $_POST["fname"];
                    }
                    if(isset($_POST["lname"]))
                    {
                        $lname = $_POST["lname"];
                    }
                    if(isset($_POST["gender"]))
                    {
                        $gender = $_POST["gender"];
                    }
                    if(isset($_POST["age"]) && $_POST["age"]>0)
                    {
                        $age = intval($_POST["age"]);
                    }

                    $sql = "UPDATE profile SET fname='$fname', lname='$lname', age='$age', gender='$gender' WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        echo "<script> 
                            alert('Profile updated successfully!');
                        </script>";

                        header("Refresh:0");
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
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
        }
        
    ?>
    

    
</body>
</php>
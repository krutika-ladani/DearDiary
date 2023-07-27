<?php
    session_start();

    try
    { 
        if(isset($_GET["date"]) && isset($_GET["title"])) 
        {    
            $date = $_GET["date"];
            $title = $_GET["title"];
            $email = $_SESSION["email"]; 

            $conn = mysqli_connect("127.0.0.1:4306", "root", "", "deardiary");
            if(!$conn)
            {

                die("<script> 
                        alert('There is some problem from our side. Please try again after some time.');
                    </script>");
            }
            else
            {
                $sql = "DELETE FROM entries WHERE email='$email' AND e_date='$date' AND title='$title'";
                if(!mysqli_query($conn, $sql))
                {
                    echo "<script> 
                        alert('There is some problem from our side. Please try again after some time.');
                    </script>";  
                }
                else
                {
                    echo "<script> 
                        window.location = 'http://localhost/deardiary/templates/viewEntry.php';
                    </script>";
                }
            }
        }
    } 
    catch (mysqli_sql_exception $e) 
    {
        echo "hiii";
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
    catch(Exception $e) 
    {
        echo 'Message: ' .$e->getMessage();
    }
           
    
?>
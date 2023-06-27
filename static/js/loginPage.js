function validate()
{
    var war=document.getElementsByClassName("warning")[0];

    var email=document.getElementsByName("email")[0].value;
    var pswd=document.getElementsByName("pswd")[0].value;

    if(email.length==0 | pswd.length==0)
    {
        war.innerHTML="Enter all the credentials!";
    }
    else
    {
       
        if(pswd.length<6 | pswd.length>8)
        {
            war.innerHTML="Password length must be betwwen 6 to 8 characters.";
        }
        else
        {
            document.getElementById("loginform").submit();
        }
        
    }
}
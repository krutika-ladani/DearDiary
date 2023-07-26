function validate()
{
    
    var war=document.getElementsByClassName("warning")[0];
    war.className="warning";

    var email=document.getElementsByName("email")[0].value;
    var pswd=document.getElementsByName("pswd")[0].value;
    var cpswd=document.getElementsByName("cpswd")[0].value;

    if(email.length==0 | pswd.length==0 | cpswd.length==0)
    {
        war.innerHTML="Fields cannot be empty! Enter all the credentials.";
    }
    else
    {        
        if(pswd.length<6 | pswd.length>8)
        {
            war.innerHTML="Password length must be betwwen 6 to 8 characters.";
        }
        else
        {    
            if(pswd!=cpswd)
            {
                war.innerHTML="Passwords must match!";
            }
            else
            {
                document.getElementById("signupform").submit();
            }
        }

    }
}
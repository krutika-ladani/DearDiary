function validate()
{
    
    var war=document.getElementsByClassName("warning")[0];
    war.className="warning";

    var uname=document.getElementsByName("name")[0].value;
    var email=document.getElementsByName("email")[0].value;
    var pswd=document.getElementsByName("pswd")[0].value;
    var cpswd=document.getElementsByName("cpswd")[0].value;

    if(uname.length==0 | email.length==0 | pswd.length==0 | cpswd.length==0)
    {
        war.innerHTML="Fields cannot be empty! Enter all the credentials.";
    }
    else
    {
        var p= /^[a-zA-Z ]{2,30}$/;
        if(!p.test(uname))
        {
            war.innerHTML="Name can only contain lowercase letters, uppercase letters and space.";
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
}
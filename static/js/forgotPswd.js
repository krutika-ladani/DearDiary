send_mail = function(addr,pswd)
{
    Email.send({
        Host: "smtp.gmail.com",
        Username: "deardiarywebapp@gmail.com",
        Password: "12345xyz",
        To: addr,
        From: "deardiarywebapp@gmail.com",
        Subject: "Password retrieval",
        Body: "Your Password is: "+pswd,
      })
        .then(function () {
          alert("Check your Email")
        });
}

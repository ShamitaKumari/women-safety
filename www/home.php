<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Hashing Tutorial</title>
    <link rel="stylesheet" href="style.css">
     <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function do_login()
{
 var email=$("#emailid").val();
 var pass=$("#password").val();
 if(email!="" && pass!="")
 {
  $.ajax
  ({
  type:'post',
  url:'login.php',
  data:{
   login:"login",
   email:email,
   password:pass
  },
  success:function(response) {
  if(response=="success")
  {
    window.location.href="add_contact.html";
  }
  else
  {
    alert("Wrong Details");
  }
  }
  });
 }

 else
 {
  alert("Please Fill All The Details");
 }

 return false;
}
</script>
</head>
<body>
<div class="loginform">
    <img src="img/icon.png" class="icon">
    <h1>Register Here</h1>
    <div class="notification">
   <form method="post" action="add_contact.html">
        <p>User Name</p>
        <input type="text" id="name" placeholder="e.g. Joseph Bloggs" name="name" minlength="3">
        <p>Email</p>
        <input type="text" id="email" placeholder="e.g. joe.bloggs@gmail.com" name="email" minlength="5">
        <p>Password</p>
        <input type="password" id="password" placeholder="Must be at least 8 characters long" name="password" minlength="8">
        <p>Conform Password</p>
        <input type="password" id="cpassword" placeholder="Must be same as Password above" name="cPassword" minlength="8"><br>
        <input class="submit-button" type="submit" name="register" value="Sign-Up" id="signup_button">
    
    </div>
    </form>
</div>


    </body>
</html>

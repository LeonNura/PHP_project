
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>
<link rel="stylesheet" type="text/css" href="../login/css/style.css">
  
</head>

<body>

<form action="login.php" method="POST">
  <div class="materialContainer">


   <div class="box">

      <div class="title">LOGIN</div>

      <div class="input">
         <label for="name">Username</label>
         <input type="text" name="username" id="name">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="pass">Password</label>
         <input type="password" name="password" id="pass">
         <span class="spin"></span>
      </div>

      <div class="button login">
         <button type="submit" name="login"><span>Login</span> <i class="fa fa-check"></i></button>
      </div>

      <a href="" class="pass-forgot" id="abc"></a>
   </div>
</form>
<form action="signup.php" method="POST">
   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>

      <div class="title">REGISTER</div>

      <div class="input">
         <label for="regname">Username</label>
         <input type="text" name="username" id="regname">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="reregpass">Email</label>
         <input type="text" name="email" id="reregpass">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="regpass">Password</label>
         <input type="password" name="password" id="regpass">
         <span class="spin"></span>
      </div>

      <div class="button">
         <button type="submit" name="register"><span>Sign up</span></button>
      </div>
   </div>
</div>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="../login/js1/index.js"></script>
</body>
</html>

<html>
<head>
<title>User Logon</title>
</head>
<body>

<?php

$user = 'demo';
$pass = 'demo';

$user2 = 'demo2';
$pass2 = 'demo2';

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    if (($_POST['username'] == $user) && ($_POST['password'] == $pass) 
    	|| ($_POST['username'] == $user2) && ($_POST['password'] == $pass2)) {    
        
        if (isset($_POST['rememberme'])) {
            /* Set cookie to last 1 year */
            setcookie('username', $_POST['username'], time()+60*60*24*365);
            setcookie('password', md5($_POST['password']), time()+60*60*24*365);
        } else {
            /* Cookie expires when browser closes */
            setcookie('username', $_POST['username'], false);
            setcookie('password', md5($_POST['password']), false);
        }
        header('Location: account.php');
        
    } 
}
?>

  <h2>User Login </h2>
  <form name="login" method="post" action="login.php">
   Username: <input type="text" name="username"><br>
   Password: <input type="password" name="password"><br>
   Remember Me: <input type="checkbox" name="rememberme" value="1"><br>
   <input type="submit" name="submit" value="Login!">
  </form>
</body>
</html>
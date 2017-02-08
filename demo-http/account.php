<?php 
$user = 'demo';
$pass = 'demo';

$user2 = 'demo2';
$pass2 = 'demo2';

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
	
	if ((($_COOKIE['username'] == $user) && ($_COOKIE['password'] == md5($pass)))
		|| ($_COOKIE['username'] == $user2) && ($_COOKIE['password'] == md5($pass2))) {    
        echo 'Hello ' . $_COOKIE['username'];
    } else {
    	
        header('Location: login.php');
    }
?>    

<p><a href="logout.php">Logout</a></p>
<?php    
} else {
	
    header('Location: login.php');
}
?>
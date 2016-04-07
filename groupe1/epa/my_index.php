<?php
/* Login form */
session_start();
if(!isset($_SESSION['auth']) or !isset($_SESSION['ID'])){
?>

<form action="my_auth.php" method="post">
Username: <input type="text" name="login" />
Password: <input type="password" name="password" />
<input type="submit" />
</form>

<?php
}
else echo 'You are logged in!';
?>

<hr>
<a href="my_index.php">Index</a> | <a href="my_members.php">Members only</a> 
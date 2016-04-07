<?php
/* Comparison script */

$loc='my_index.php';

if(isset($_POST['login']) and isset($_POST['password'])){

mysql_connect('localhost', 'root', '') or die ('<b>Database/configuration error.</b>');
mysql_select_db('minibb') or die ('<b>Database/configuration error (DB is missing).</b>');

if(isset($_POST['login'])) $name=htmlspecialchars(trim($_POST['login']),ENT_QUOTES); else $name='';
if(isset($_POST['password'])) $pass=htmlspecialchars(trim($_POST['password']),ENT_QUOTES); else $user_pwd='';

if($res=mysql_query("select ID, name, pass from my_users where name='{$name}' and pass='{$pass}'") and mysql_num_rows($res)>0 and $row=mysql_fetch_row($res)){

session_start();
$_SESSION['auth']=$row[1];
$_SESSION['ID']=$row[0];
$loc='my_members.php';

}

}
elseif(isset($_GET['logout'])){
session_start();
unset($_SESSION['auth']);
unset($_SESSION['ID']);
}

header("Location: $loc}");

?> 
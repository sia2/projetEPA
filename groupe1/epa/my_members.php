<?php
/* Members-only area */
session_start();

if(!isset($_SESSION['auth'])) echo 'Not allowed to enter, please login first!';
else echo 'You are logged in as '.$_SESSION['auth'].' (ID: '.$_SESSION['ID'].') <a href="my_auth.php?logout=1">Logout</a>';

?> 
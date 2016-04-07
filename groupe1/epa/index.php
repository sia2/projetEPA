<!DOCTYPE html>
<!-- saved from url=(0067)http://www.minibb.com/synchronizing_minibb.html#existing_membership -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>miniBB Forum Integration into 3rd party membership / login authorization system</title>

<meta name="Description" content="Step-by-step solution of how to unite miniBB users authorization with 3rd party applications, so your users are not registering twice.">
<link href="./index_files/bb_default_style.css" type="text/css" rel="STYLESHEET">
<link href="./index_files/style.css" type="text/css" rel="STYLESHEET">
<link rel="alternate" type="application/rss+xml" title="miniBB News" href="http://www.minibb.com/forums/rss.php">
</head>
<body class="gbody">

<table style="width:100%;padding:0px;margin:0px;border-collapse:collapse;">
<tbody><tr class="noBg"><td style="background-color:#79980E;border:0px;">

<table class="forums">
<tbody><tr>
<td style="width:16px;"><a href="http://www.minibb.com/" style="text-decoration:none"><img src="./index_files/mini_bb.gif" style="width:16px;height:16px;vertical-align:middle" alt="miniBB ®" title="miniBB ®"></a></td>
<td style="width:5px;"><img src="./index_files/p.gif" style="width:6px;height:37px" alt=""></td>
<td style="width:100%;padding-top:1px;color:#E3EA7A;font-family:arial,verdana,tahoma,verdana,&#39;lucida grande&#39;;"><span style="font-size:16px;font-weight:bold"><a href="http://www.minibb.com/" style="text-decoration:none;color:#E3EA7A;">miniBB</a></span><sup style="font-size:11px;padding-left:2px;">®</sup></td>
</tr>
</tbody></table>
<table class="forums">
<tbody><tr><td class="noWrap" colspan="3" style="width:100%"><div style="color:#F1F6CC;font-family:arial,&#39;lucida grande&#39;, tahoma;font-size:8pt;margin-bottom:5px;padding-left:2px;padding-right:0px;text-decoration:none;letter-spacing:1pt;">Evolution of bulletin boards
</div></td></tr>
</tbody></table>

</td></tr></tbody></table>

<table class="forumsmb">
<tbody><tr>
<td class="capMenu" style="border-right:0px">

<img src="./index_files/icon_menu_home.gif" style="width:10px;height:9px;padding-left:10px;" alt="miniBB Home" title="miniBB Home">&nbsp;<a href="http://www.minibb.com/">Home</a> <img src="./index_files/icon_menu_features.gif" style="width:10px;height:9px;padding-left:10px;" alt="miniBB Forum Software Features" title="miniBB Forum Software Features">&nbsp;<a href="http://www.minibb.com/features.html" title="miniBB Forum Software Features">Features</a><img src="./index_files/icon_menu_require.gif" style="width:11px;height:9px;padding-left:10px;" alt="miniBB Forum Script Requirements" title="miniBB Forum Script Requirements">&nbsp;<a href="http://www.minibb.com/require.html" title="miniBB Forum Script Requirements">Requirements</a><img src="./index_files/icon_menu_demo.gif" style="width:10px;height:9px;padding-left:10px;" alt="miniBB Forums Demo - Full Mode with Add-ons" title="miniBB Forums Demo - Full Mode with Add-ons">&nbsp;<a href="http://minibb.org/" target="_blank" title="miniBB Forums Demo - Full Mode with Add-ons" class="specialMenu">Demo</a><img src="./index_files/icon_menu_diskette.gif" style="width:9px;height:9px;padding-left:10px;" alt="Forum Program and Plug-ins - Download for Free!" title="Forum Program and Plug-ins - Download for Free!">&nbsp;<a href="http://www.minibb.com/download.html" title="Forum Program and Plug-ins - Download for Free!">Downloads</a><img src="./index_files/icon_menu_compiler.gif" style="width:13px;height:9px;padding-left:10px;" alt="Auto-Compiler" title="Auto-Compiler">&nbsp;<a href="http://www.minibb.com/com.html" title="miniBB Compiler" class="specialMenu">Compiler</a><img src="./index_files/icon_menu_manual.gif" style="width:8px;height:9px;padding-left:10px;" alt="Installation and Maintenance manual for your miniBB Forum" title="Installation and Maintenance manual for your miniBB Forum">&nbsp;<a href="http://www.minibb.com/forums/manual.html" title="Installation and Maintenance manual for your miniBB Forum">Manual</a><img src="./index_files/icon_menu_forum.gif" style="width:12px;height:9px;padding-left:10px;" alt="miniBB Community Forum and Bulletin Board" title="miniBB Community Forum and Bulletin Board">&nbsp;<a href="http://www.minibb.com/forums/" title="miniBB Community Forum and Bulletin Board" class="specialMenu">Forums</a>
<br>
<img src="./index_files/icon_menu_showcase.gif" style="width:17px;height:9px;padding-left:10px;" alt="miniBB Forums Worldwide Showcase" title="miniBB Forums Worldwide Showcase">&nbsp;<a href="http://www.minibb.com/sites.html" title="miniBB Forums Worldwide Showcase">Showcase</a><img src="./index_files/icon_menu_gallery.gif" style="width:12px;height:9px;padding-left:10px;" alt="The Gallery of miniBB Arts and Design Layouts" title="The Gallery of miniBB Arts and Design Layouts">&nbsp;<a href="http://www.minibb.com/gallery.html" title="The Gallery of miniBB Arts and Design Layouts">Gallery of Arts</a><img src="./index_files/icon_menu_addons.gif" style="width:10px;height:9px;padding-left:10px;" alt="Paid Extensions and Add-ons for your miniBB Forum" title="Paid Extensions and Add-ons for your miniBB Forum">&nbsp;<a href="http://www.minibb.com/paid_addons.html" title="Paid Extensions and Add-ons for your miniBB Forum" class="specialMenu">Paid Extensions</a><img src="./index_files/icon_menu_wrench.gif" style="width:14px;height:9px;padding-left:10px;" alt="Paid Support for Customers" title="Paid Support for Customers">&nbsp;<a href="http://www.minibb.com/paid_support.html" title="Paid Support for Customers">Paid Support</a><img src="./index_files/icon_menu_license.gif" style="width:12px;height:9px;padding-left:10px;" alt="miniBB Commercial License and Attribution Link Removal" title="miniBB Commercial License and Attribution Link Removal">&nbsp;<a href="http://www.minibb.com/commercial_license.html" title="miniBB Commercial License and Attribution Link Removal">License</a>

</td>
<td class="capMenu txtC" style="color:#777B40;border-left:0px">Current miniBB&nbsp;version:<br><strong>3.2.1</strong></td>
</tr>
</tbody></table>


<table class="forumsmb">

<tbody><tr>



<td style="width:85%;vertical-align:top;background-color:#F4F4F4;padding:4pt">

<h1>miniBB synchronizing with the existing membership</h1>

<div style="text-align:right"><small>By <b><a href="http://www.minibb.com/authors.html">Paul Puzyrev</a></b>, author of miniBB</small></div>

<p><em>Notice: description below is prepared only for the coders familiar with PHP. If you are not familiar with PHP and do not know much about web programming and coding, this article IS NOT FOR YOU. If you have read this solution, and tried it, and still something is not working on your side - we can't investigate it for free, because each system has its own specifics which we may not even know about, and this requires a lot of time to work on. miniBB authors are providing only <a href="http://www.minibb.com/paid_support.html">paid support</a> on synchronizing miniBB with a specific software. The same applies to project owners who have not enough time to go deeply into this solution, but need to synchronize your PHP software with miniBB as soon as possible. <a href="http://www.minibb.com/forums/index.php?action=tpl&amp;tplName=contact_us_form">Contact us</a> privately to get in touch.</em></p>

<h2>Synopsis</h2>

<p>This article describes the following:</p>

<ul>

<li><a href="http://www.minibb.com/synchronizing_minibb.html#online_auth">How the principle of the online authorization works</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#php_session">How PHP session works</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#minibb_auth">How miniBB's authorization works</a></li>

<li>
<ul>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#md5">Is storing passwords in MD5 format safe?</a></li>
</ul>
</li>

<li><a href="http://www.minibb.com/synchronizing_minibb.html#minibb_compatibility">miniBB compatibility with the 3rd party software</a></li>


<li><a href="http://www.minibb.com/synchronizing_minibb.html#existing_membership">Example of pre-existing membership</a></li>

<li>
<ul>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#custom_login_form">Login form</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#custom_auth">Authorization script</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#custom_members">Members area script</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#custom_forums_test">Forums testing authorization script</a></li>
</ul>
</li>

<li><a href="http://www.minibb.com/synchronizing_minibb.html#minibb_synchronize">Synchronizing miniBB with the pre-existing membership</a></li>

<li>
<ul>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#options">Modifying options file</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#custom_fields">Altering custom users table with miniBB fields</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#references">Creating references between custom users table and miniBB</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#auth_module">Rewriting miniBB's authorization file</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#public_profile">Adjusting user's public profile</a></li>
<li><a href="http://www.minibb.com/synchronizing_minibb.html#form_profile">Setting up forums profile form</a></li>
</ul>
</li>

<li><a href="http://www.minibb.com/synchronizing_minibb.html#package">Examples package all-in-one</a></li>

</ul>

<h2><a name="online_auth">How the principle of the online authorization works</a></h2>

<p>Not depending on the type of the software, the language its written on or other terms, the basic principle of the web authorization is similar in almost all cases:</p>

<ol>
<li>In a <strong>browser</strong>, you enter your username and password on the login form, they are passed to the validation script, which some way connects to the members database on the <strong>server</strong>, compares the entered data, and gives TRUE or FALSE on output, meaning authorization was successful or failed.</li>

<li>If TRUE is given, the program needs some way to keep member's data on the client side, which means a browser. Meaning this data was set, it may be later re-compared each time when user opens some section of the site, or just knowing it is set, the program will think you are "authorized" and keep you logged in. This data is stored in a <strong>cookie</strong>, a little file which is kept on your computer under browser's folder or registry.</li>

<li>Each cookie always consists of the following parameters:</li>

<li>
<ul>
<li><strong>Name</strong>: a unique cookie identifier which is recommended to consist only of the alphanumerical characters and possible underscore sign ("_"), and it should begin with a letter;</li>
<li><strong>Domain</strong>: the domain name which cookie should be recognized from; for example it may be <em>www.cookiedomain.com</em> (meaning it will work only for 'www' domain) or <em>.cookiedomain.com</em> (meaning it will work from any sub-domain as well). Note that for cookies, the domain without 'www' and with 'www' are different cases. If Cookie may be read only from the same domain it is set; if you type <em>http://cookiedomain.com</em>, the cookie will not be read from <em>http://www.cookiedomain.com</em>;</li>
<li><strong>Path</strong>: this defines from which folder of the domain cookie will be available to read; for example '/' (means it is available for all folders and sub-folders of the domain) or '/members/' (means it will be set and read only from the forums folder, at the same time it may be operated from the 'top' level as well, i.e. from the main folder - but if cookie was set for the root folder, it can't be operated from the sub-folder);</li>
<li><strong>Value</strong>: a comparision value which the authorization script may use when identifying you;</li>
<li><strong>Expiration time</strong>: defines when the cookie will expire; if 0 is passed, it means the cookie is expired at the end of browser's session, i.e. until the browser is closed;</li>
<li><strong>Secured connection flag</strong>: if authorization is executed via SSL (i.e. if you see 'https' not 'http' in URL bar), it needs to be specially noticed via this flag. This is a rare thing and you won't probably even need it to study.</li>
</ul>
</li>

</ol>

<p>Let's take a look at the following schema:</p>

<img src="./index_files/online_authorization.jpg" style="width:300px;height:200px" alt="Online authorization" title="Online authorization">

<p>As you see, we can call Cookie "part of the browser", "Comparison script" is part of the server, and since the Browser and a Server interact, that way we can save user's input and either enable or disable members-only functions for him.</p>

<p>Since the cookie is stored in the "clear" format on your computer and may be theoretically stolen, it is recommended to keep the Value of the Cookie in encoded format. This means even if you steal the cookie and know its Value, it doesn't mean you can log-in with this data, since it doesn't contain username and password in unencoded strings. That way the "good" authorization process works.</p>

<h2><a name="php_session">How PHP session works</a></h2>

<p>There were many questions on our <a href="http://www.minibb.com/forums/">forums</a> regarding how difficult is to use sessions instead of cookies and how this affects security. Basically, PHP session means a cookie itself. Named usually 'PHPSESSID', this cookie contains a randomly generated session ID which is kept on the Server. This ID is associated on the Server with the special array of session data which may contain almost anything, incl. username, password, member ID and other information. For keeping user's authorization, it is usually needed only to open a PHP session and put authorized data under it with the built-in PHP session functions. This session always expires when you close the browser, that is the main difference between it and a "classic" cookie which may be kept for the specified amount of time. It is impossible to steal user's information from a PHP session (it is stored on the Server), but still, it's possible to recognize a user by session ID which is stored both on the Server and in the Browser.</p>

<h2><a name="minibb_auth">How miniBB's authorization works</a></h2>

<p>If we take the above graph, "Comparison script" will stand for miniBB itself, specially, the files named <em>bb_cookie.php</em> and <em>bb_func_login.php</em>.</p>

<p><em>bb_func_login.php</em> works only with the initial user's input, i.e. when the username and password are entered on the login form and passed for validation. This file is <strong>core-destructive</strong>, it means modifying this file you destroy possibility of the easy miniBB upgrade in the future, because if this file will be included in updates list, you will need to re-apply your changes again. In miniBB project, we always follow the <strong>non-core-destructive</strong> solutions, that means applying a solution, you still keep the possibility of the easy core files upgrade, but keeping all of your custom changes, incl. custom authorization mechanism.</p>

<p>Here we have a <strong>non-core</strong> file named <em>bb_cookie.php</em>, which means you are allowed to edit it without limitations and difficult upgrades fear. It contains cookie-processing functions as one for setting the cookie (<em>setMyCookie</em>), for deleting the cookie (<em>deleteMyCookie</em>), for getting the Value of the cookie (<em>getMyCookie</em>), encoding the password for storing in database (<em>writeUserPwd</em>), and the main function which compares user's cookie/input with database information (<em>user_logged_in</em>).</p>

<p>Taking into attention written above, let's explore some details:</p>

<ol>
<li>you enter username and password on forums, they are passed through a login form containing variable called <em>$mode</em>. As soon it is set the script supposes the user is logging in, and calls <em>bb_func_login.php</em>;</li>
<li>there we crypt the password which you have entered with the function <em>writeUserPwd</em> (which by default is just a conversion to MD5 string), and then compare username and encoded password by the values which are stored in database (or as for admin account, they are compared by what is stored under <em>setup_options.php</em> file). miniBB crypts all passwords kept in database with the same <em>writeUserPwd</em> function, that's why we can safely store and compare only crypted values;</li>
<li>if the login is passed, a miniBB cookie is set, which Value consists of the string in the following format: USERNAME|MD5_PASSWORD|EXPIRATION_TIME;</li>
<li>in the future the script will read this cookie everytime when you open any forum page or section, using <em>getMyCookie</em> and <em>user_logged_in</em> functions, i.e. parsing the Cookie's Value and comparing it to what is stored in database.</li>
</ol>

<p>The most important thing to know here is that user is authorized in miniBB if his ID is not equal to 0. In the scripts user ID is always associated with the <em>$user_id</em> variable. It is set under <em>bb_func_login.php</em> (for example when you post and login simultaneously) or <em>user_logged_in</em> function.</p>

<p><strong><a name="md5">Is storing passwords in MD5 format safe?</a></strong></p>

<p>It is not even safe to drive by a car, what can we say about MD5? In theory, it can be hacked and broken, but only for really weak passwords, which consist of a sensful word or very simple phrase. As more your password is difficult-to-guess as less it's possible to decrypt it from MD5. In hacking practice, it is only possible using "brute force attack" which may take few lifes. Keeping miniBB forums for years, we still have our passwords safe, because they are strong. That's why the forums were still not broken. We still have read that somebody broke the forums, where the admin's password was... 'admin'. It's sad and funny at once. Of course there is no responsibility for such cases.</p>

<p>On another hand, forums are not the payment gateway and they do not contain any kind of serious private information. Even if somebody gets your password, he can't do anything except posting under your nickname or optionally delete few of your own messages. Even if somebody steals your admin password, it is always possible to restore forums from a backup. Another words, when working on miniBB authorization, we didn't invent anything difficult, like it is done recently for other similar software. This keeps the things transparent and still strong, if you know how to make them strong.</p>

<p>You can rewrite miniBB's <em>writeUserPwd</em> using another encoding algorithm here, let's say SH1 (thus changing password's length in database). That will keep the things more secured and still simple. This function is described below.</p>

<h2><a name="minibb_compatibility">miniBB compatibility with the 3rd party software</a></h2>

<p>Few programmers are going wrong way trying to store user's information in TWO database tables, one of them belongs to the website authorization, and the other belongs to forums. For example, when user registers on the main page, his data is duplicated to the forums table as well; however it's definitely a wrong approach, 'cause in that case it won't be possible to achieve the user is logged on forums automatically when he's logged on the site. Users will just enter the same data for the main website and forums, but it won't make their live easier at all.</p>

<p>Synchronizing miniBB means there will be only ONE membership records table, and this table will belong exclusively to the main software. I.e. users are allowed to register and modify the profile only from the main software; forums will just READ this information, but not to create or update it. It means you can log-in from the main site, and you will appear logged in on forums; moreso - in some cases it's even possible to achieve that if you are logged-in from forums, you will be logged in from the main website automatically. That's the main sense of the <em>best</em> synchronization.</p>

<p>When it comes to synchronizing miniBB and other software, the most important question is: how to let your own script think that user is logged in from miniBB, and how to let miniBB think that user was logged in from your main website? Take a look at the picture above again: important are just Cookie and Comparison script.</p>

<p>If you know what kind of format your cookie has, and how to "emulate" it with miniBB, you've got the half-work done. Further, you need to build a Comparison script, i.e. rewrite miniBB's <em>bb_cookie.php</em> functions, so they are connecting to the existing users table, not default miniBB's table, and comparing user's input based on this table.</p>

<p>As about the Cookie information, Mozilla Firefox browser provides some excellent tools. Go to "Tools" - "Options" - "Privacy" - "Show cookies". It will list all cookies available for the Browser. Locate your domain, and under it you may see a specific Cookie by name. Cookie explores with the all necessary information mentioned above: Name, Value (Content), Expiration date, Path and Host (Domain). Analyzing this information, you may understand how the 3rd party program sets the login Cookie, and repeat it similarly in miniBB, rewriting some functions.</p>

<p>But first of all, you should know in advance, <strong>is miniBB compatible</strong> with the software you are going to synchronize it with? miniBB will be compatible only if:</p>

<ul>
<li>forum tables and members table which belongs to your software, are in the SAME mySQL database (it is VERY critical - the solution is NOT possible if you run two different databases for forums and the main website - you need to achieve that both forums and website tables are under the same database);</li>
<li>in the existing membership table, each user has an ID, and this ID is a unique numerical auto incremental field;</li>
<li>if there is no user with ID=1, it should be possible to add this user manually without affecting the current database and scripts (it will identify miniBB's admin);</li>
<li>it should be possible to add new, miniBB-related fields to the end of your current users table without affecting the current database and scripts;</li>
<li>your custom script should not allow users to change their chosen login name, else it will lead to the total mess on forums; but if you are not afraid of it, this becomes not a mandatory condition.</li>
</ul>

<p>Besides of that, miniBB requires the following fields in users table:</p>

<ul>
<li><b>user_id</b>* - integer auto_increment type; stores unique user ID.</li>
<li><b>username</b>* - varchar type, stores user's login (sign in) name.</li>
<li><b>user_regdate</b> - datetime type, sign up date.</li>
<li><b>password</b>* - varchar type, stores encrypted user's password (in miniBB, it is encrypted via MD5() function).</li>
<li><b>user_email</b>* - varchar type, stores unique email of the user.</li>
<li><b>activity</b> - integer type (0 or 1) - identifies user's access to forums. If this values is set to 0, user's membership is disabled for some reason. 1 by default.</li>
<li><b>user_viewemail</b> - integer type (0 or 1) - if 1, user has allowed to show his email publically. 0 by default.</li>
<li><b>user_sorttopics</b> - integer type (0 or 1) - default sorting by latest replies or latest topics.</li>
<li><b>language</b> - char type, 3 letter index of forums interface language.</li>
<li><b>num_topics</b> - integer type; number of topics user created.</li>
<li><b>num_posts</b> - integer type; number of posts user created.</li>
</ul>

<p>Fields marked with asterisk above most probably will exist in almost every members table. Other fields must be added to the end of the table manually. Fields may have different names, which can be re-defined under miniBB's <em>setup_options.php</em> - <em>$dbUserShema</em> setting. I'll explain it more carefully below.</p>

<h2><a name="existing_membership">Example of pre-existing membership</a></h2>

<p>Below we will take a very simple example of user's authorization on the site which you can repeat on your own side and see how it works, creating files and pasting codes. I hope this example will be pretty straightforward to understand how to implement all this for your own script ;-)</p>

<p>Let's say we have an existing users table which can be created with the following SQL statement:</p>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">create table my_users(
ID int(10) auto_increment,
name varchar(100),
pass varchar(100),
email varchar(200),
primary key (ID)
);</textarea>

<p>And here, we will insert few test records to this table:</p>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">insert my_users (ID, name, pass, email) values (1, 'Admin', 'xyz123', 'test@nodomain.com');
insert my_users (ID, name, pass, email) values (2, 'Paul', 'xyz123', 'test2@nodomain.com');</textarea>

<p>Under main website, we have 3 scripts: first is an index file which contains a login form, second is the Comparison script which parses user login data and sets the Cookie (PHP session), and the third is kind of members-only area. Below are the codes for these scripts:</p>

<p><a name="custom_login_form"></a><strong>Login form</strong> (<em>my_index.php</em>):</p>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">&lt;?php
/* Login form */
session_start();
if(!isset($_SESSION['auth']) or !isset($_SESSION['ID'])){
?&gt;

&lt;form action="my_auth.php" method="post"&gt;
Username: &lt;input type="text" name="login" /&gt;
Password: &lt;input type="password" name="password" /&gt;
&lt;input type="submit" /&gt;
&lt;/form&gt;

&lt;?php
}
else echo 'You are logged in!';
?&gt;

&lt;hr&gt;
&lt;a href="my_index.php"&gt;Index&lt;/a&gt; | &lt;a href="my_members.php"&gt;Members only&lt;/a&gt; </textarea>

<p><a name="custom_auth"></a><strong>Comparison script</strong> (<em>my_auth.php</em>):</p>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">&lt;?php
/* Comparison script */

$loc='my_index.php';

if(isset($_POST['login']) and isset($_POST['password'])){

mysql_connect('localhost', 'root', 'root123') or die ('&lt;b&gt;Database/configuration error.&lt;/b&gt;');
mysql_select_db('minibb') or die ('&lt;b&gt;Database/configuration error (DB is missing).&lt;/b&gt;');

if(isset($_POST['login'])) $name=htmlspecialchars(trim($_POST['login']),ENT_QUOTES); else $name='';
if(isset($_POST['password'])) $pass=htmlspecialchars(trim($_POST['password']),ENT_QUOTES); else $user_pwd='';

if($res=mysql_query("select ID, name, pass from my_users where name='{$name}' and pass='{$pass}'") and mysql_num_rows($res)&gt;0 and $row=mysql_fetch_row($res)){

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

?&gt; </textarea>

<p><a name="custom_members"></a><strong>Members-only area</strong> (<em>my_members.php</em>):</p>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">&lt;?php
/* Members-only area */
session_start();

if(!isset($_SESSION['auth'])) echo 'Not allowed to enter, please login first!';
else echo 'You are logged in as '.$_SESSION['auth'].' (ID: '.$_SESSION['ID'].') &lt;a href="my_auth.php?logout=1"&gt;Logout&lt;/a&gt;';

?&gt; </textarea>

<p>Try to re-create all written above on your main website, then try to login as 'Paul' with the easy-to-guess password 'xyz123' (easy-to-guess is still good for testing purposes only). I hope you can analyze these scripts as well and conclude that the authorization script compares user's input by what is stored in database. If such username/password combination is not found, it just redirects to the login form; if it's found, it starts a session and stores $_SESSION's array variables like 'auth' and 'ID', meaning this uses is successfully logged in. Later this is also compared when you enter 'members-only' area.</p>

<p><a name="custom_forums_test"></a>Now besides our 'main' script, let's install miniBB, for example, under subfolder 'forums' comparing to the root folder. Check <a href="http://www.minibb.com/forums/manual.html#config1" target="blank">miniBB manual</a> for installation if you are not sure how to proceed. After installation, log-in to admin panel, create a test forum, and under this forum create some test topic to see everything works. Then under forums folder, put the script <em>my_session.php</em> with the following content:</p>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">&lt;?php
/* Test of the Session's values */

session_start();
print_r($_SESSION);

?&gt; </textarea>

<p>After you "were logged" from the main <em>my_index.php</em> page in the root folder, point your browser to <em>my_session.php</em>. You should see that a PHP session is available, and it displays the values of 'auth' and 'ID' meaning username of the logged user, and his ID. It means we can read Cookie from forums folder, and you must be sure on it in all other cases. Usually, PHP session is stored for the whole domain with the path '/', that's why we don't have problems referrencing to a session from the sub-folder. In your own script, you always must keep in mind that it must set the domain-wide Cookie.</p>

<p>Now we actually go to the <strong>synchronization process</strong> itself.</p>

<h2><a name="minibb_synchronize">Synchronizing miniBB with the pre-existing membership</a></h2>

<ul>

<li><a name="options"></a>Set <em>$Tu</em> setting of miniBB's <em>setup_options.php</em> to 'my_users' - letting miniBB know which members table to use;</li>

<li>Let miniBB do not accept new registrations - under the same file <em>setup_options.php</em> set <em>$enableNewRegistrations=FALSE;</em></li>

<li>Let miniBB do not allow to use its core for password reminding - just remove <em>bb_func_sendpwd.php</em> file from the forums folder;</li>

<li><a name="custom_fields"></a>add missing miniBB fields at the end of the existing members table; in our case the SQL statement will look like following:
<br>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">alter table my_users add user_regdate date not null default '0000-00-00 00:00:00';
alter table my_users add activity int(1) not null default '1';
alter table my_users add user_viewemail tinyint(1) NOT NULL default '0';
alter table my_users add user_sorttopics tinyint(1) NOT NULL default '0';
alter table my_users add language char(3) NOT NULL default '';
alter table my_users add num_topics INT(10) UNSIGNED DEFAULT '0' NOT NULL;
alter table my_users add num_posts INT(10) UNSIGNED DEFAULT '0' NOT NULL;
</textarea>

<br><br>Following miniBB architecture, you can add other related fields as well (for example, <em>'user_custom...'</em> for installing some of the add-ons like avatars etc.) Learn how to do it at advanced level from the article <a href="http://www.minibb.com/new_profile_field.html" target="_blank">Adding new profile field to miniBB</a>.

</li>

<li><a name="references"></a>Under the same file <em>setup_options.php</em> locate <em>$dbUserShema</em> setting. It contains all miniBB-related member fields in the array format: CONSTANT_NAME=&gt;array(NUMERICAL_INDEX, DATABASE_FIELD_NAME, FORM_FIELD_NAME). Leave FORM_FIELD_NAME by default for array's values like username and email; forum-related fields may be specified because it could be allowed to modify forums Profile (I will describe it later below). Numerical index is defined using <a href="http://www.minibb.com/download.php?file=determine_fields">"Determine fields" tool</a>. Download it, copy under forums folder and point your browser's URL to it. It should display something like this:<br><br>

<pre>Table fields in table <u>my_users</u>
ID - 0
name - 1
pass - 2
email - 3
user_regdate - 4
activity - 5
user_viewemail - 6
user_sorttopics - 7
language - 8
num_topics - 9
num_posts - 10
</pre>

<p>Building the logics on the above, set the following:</p>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">$dbUserSheme=array(
'username'=&gt;array(1,'name','login'),
'user_password'=&gt;array(2,'pass',''),
'user_email'=&gt;array(3,'email','email'),
'user_viewemail'=&gt;array(6,'user_viewemail','user_viewemail'),
'user_sorttopics'=&gt;array(7,'user_sorttopics','user_sorttopics'),
'language'=&gt;array(8,'language','language'),
'num_topics'=&gt;array(9,'num_topics',''),
'num_posts'=&gt;array(10,'num_posts','')
);
$dbUserId='ID';
$dbUserDate='user_regdate'; $dbUserDateKey=4;
$dbUserAct='activity';</textarea>

</li>

<li><a name="auth_module"></a>Let miniBB read the existing Cookie first. For this, open two tabs in your browser, one for the main website, one for forums. Log-in from your main page (<em>my_index.php</em> in our example), switch to forums tab and locate <em>my_session.php</em> being sure you can be recognized from the forums folder.

<br><br>

Now update <em>bb_cookie.php</em> letting it read your cookie's value, i.e. PHP session. First of all, at the very top of file we need to open a session the same way like our website does, putting this somewhere at the top of file:

<br><br>

<textarea class="textForm" style="width:500px;height:20px;" cols="1" rows="1">session_start();
</textarea>

<br><br>

Then it comes time to modify <em>getMyCookie</em> function. In default miniBB, this function returns an array of username, MD5-encoded password and expiration date. In our case we don't have the two last things stored in the session, so we will return an array of username and ID (later we will use them in <em>user_logged_in</em> comparison function):

<br><br>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">function getMyCookie(){
if(isset($_SESSION['auth']) and isset($_SESSION['ID'])) {
$cookievalue=array($_SESSION['auth'], $_SESSION['ID']);
}
else $cookievalue=array('','');
return $cookievalue;
}</textarea>

<br><br>

<em>getMyCookie</em> passes its values to <em>user_logged_in</em>. Analyzing it, you can see that this function may be used in two cases: when the cookie Value is passed from <em>getMyCookie</em> (it is a case when we check user's login status everytime when the forum page is opened), or if it's passed from <em>bb_func_login.php</em>, which builds a default miniBB cookie's Value in the <em>$cook</em> variable upon login process. We may use this variable for getting Username, and then put a simple mySQL request to get an ID. That way we will "fake" miniBB and keep the core at once. In the below code of that function, we may completely eliminate a special routine for admin, because Admin's account is kept in the custom users database anyway. We also can remove code parts which are related to the cookie expiration time and related operations, because in the case of PHP sessions cookie will be deleted as soon as you close the browser. In your custom case, you can eliminate this part as well, specially if your site doesn't "remember" login after you close the browser.  Modifying users request condition a bit, we get the most related forum profile fields, and then compare Username and user ID passed to that function. If they are similar, we perform some code to identify admin from a regular user, and finally declare all necessary login status variables:

<br><br>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">function user_logged_in() {

$c=array('', '');

if(isset($GLOBALS['cook']) and trim($GLOBALS['cook'])!='') {
$c=explode('|',$GLOBALS['cook']);
if($row=db_simpleSelect(0, $GLOBALS['Tu'], $GLOBALS['dbUserId'], $GLOBALS['dbUserSheme']['username'][1], '=', $c[0], 1)){
$c=array($c[0], $row[0]);
}
}
else $c=getMyCookie();

$username=$c[0];

if($username=='') { $returned=FALSE; return; }

$GLOBALS['user_usr']=$username;

if(isset($GLOBALS['loginsCase']) and $GLOBALS['loginsCase']) { $caseComp1=$GLOBALS['caseComp'].'('; $caseComp2=')'; $usernameSql=strtolower($username); } else { $caseComp1=''; $caseComp2=''; $usernameSql=$username; }

if($row=db_simpleSelect(0,$GLOBALS['Tu'],$GLOBALS['dbUserId'].','. $GLOBALS['dbUserSheme']['user_sorttopics'][1].','. $GLOBALS['dbUserSheme']['language'][1].','. $GLOBALS['dbUserAct'] .','. $GLOBALS['dbUserSheme']['user_password'][1] .', '.$GLOBALS['dbUserSheme']['username'][1].', '.$GLOBALS['dbUserSheme']['num_posts'][1],$caseComp1.$GLOBALS['dbUserSheme']['username'][1].$caseComp2,'=',$usernameSql,'',1)){

if($row[0]==$c[1]){
$returned=TRUE;
$GLOBALS['user_id']=$row[0];
$GLOBALS['user_sort']=$row[1];
if($row[0]==1) {
$GLOBALS['logged_admin']=1;
$GLOBALS['logged_user']=0;
}
else {
$GLOBALS['logged_admin']=0;
$GLOBALS['logged_user']=1;
}
$GLOBALS['langu']=$row[2];
$GLOBALS['user_activity']=$row[3];
$username=$row[5];
$GLOBALS['user_num_posts']=$row[6];

}
else{
/* Preventing hijack */
$username='';
$GLOBALS['user_usr']=$username;
$returned=FALSE;
}

}

else{
$returned=FALSE;
}

return $returned;
}</textarea>

</li>

<li>Now open your forums, and if you did everything correctly, you should see the user 'Paul' is logged in on forums, if he's logged in on the main website! Try to log-out on the main page, and log-in as admin, then refresh the forums page. You should see you are logged in as administrator, and the "Admin panel" link appears at the bottom the forums page. </li>

<li>If everything of the above mentioned proceeds successfully, it's time to implement cookie's setting process itself. For this we will need to modify <em>setMyCookie</em> function, which is related to <em>bb_func_login.php</em> routine. This function just gets a username, a password, an expiration time and then forms the cookie based on these values setting it in a browser, without returning any value. We need to re-write this function, so it gets user ID as well, and then puts user ID and username under PHP session array - similarly to what is done under <em>my_auth.php</em>:

<br><br>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">function setMyCookie($userName,$userPass,$userExpTime,$encodePass=TRUE){

if($row=db_simpleSelect(0, $GLOBALS['Tu'], $GLOBALS['dbUserId'], $GLOBALS['dbUserSheme']['username'][1], '=', $userName, 1)){
$_SESSION['auth']=$userName;
$_SESSION['ID']=$row[0];
}

}</textarea>

<br><br>

In opposite, the function <em>deleteMyCookie</em> should empty the session:

<br><br>

<textarea class="textForm" style="width:500px;height:70px;" cols="1" rows="1">function deleteMyCookie(){
unset($_SESSION['auth']);
unset($_SESSION['ID']);
}</textarea>

<br><br>

As for the <em>writeUserPwd</em> function, since our webpage script stores all passwords in clear format in database, we just need to return the same value as we get:

<br><br>
<textarea class="textForm" style="width:500px;height:60px;" cols="1" rows="1">function writeUserPwd($pwd){
return $pwd;
}</textarea>

</li>

<li>If you applied all modifications correctly, try to log-in/log-out on forums, it should completely work. Try to log-in/post message at once for the test topic as well. Try to log-in with the invalid password and see what happens. At this stage you must be sure the authorization fully proceeds on miniBB side.</li>

<li><a name="public_profile"></a>After you have posted a message, click on the "Member" title under the poster's name, it will open user's profile page. In many cases initially it will simply say "User doesn't exist!" which means miniBB tries to build an incorrect mySQL request. Debugging mySQL requests in miniBB is simple: open <em>setup_mysql.php</em> file, locate <em>db_simpleSelect</em> and under it you will find an 'echo' statement which you need to uncomment. Then reload the page and the SQL request will be echo'ed on the screen, this may give you some ideas of what you did wrong.

<br><br>
In our custom case, everything should work fine by default, except for "registration date" it will display "1 Jan 1970" and it will show email address as well, despite it is forbidden by user under forums profile. Our custom script is not handling registration date (at the time it should), and this is still a mandatory field for miniBB which doesn't handle it as well (remember? we have disabled registrations). So we need just to re-program registration time displaying function to return an empty value.

<br><br>
In miniBB it's possible to rewrite any profile-related functions putting them under <em>bb_plugins.php</em> file. Study more under <a href="http://www.minibb.com/new_profile_field.html" target="_blank">Adding new profile field to miniBB</a> article. In our case, we need to take some functions from <em>bb_func_usernfo.php</em>, putting them under <em>bb_plugins.php</em> with a condition to enable them only when viewing user's profile (<em>$action=='userinfo'</em>). Also we must follow users table's field names and rename these functions by the same manner:

<br><br>
<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">/* Custom user profile functions */
if($action=='userinfo'){

function parseUserInfo_user_regdate($val){
return '';
}

function parseUserInfo_email($val){
if ($GLOBALS['row'][3]!=1) return $GLOBALS['usEmail']; elseif($GLOBALS['user_id']&gt;0) return '&lt;a href="mailto:'.$val.'"&gt;'.$val.'&lt;/a&gt;'; else return '';
}

}
/* --Custom user profile functions */</textarea>

<br><br>
You may rewrite other profile-related functions the same way, keeping in mind if function returns an empty value, it won't be displayed on the profile page at all.
</li>

<li><a name="form_profile"></a>The last question in our integration process is handling user's profile form itself. As you may notice, besides personal information this profile contains some forums options, like default sorting of topics, language selection, email privacy. If you think for the users these options will work by default and are not needed to change, just disable profile editing under miniBB (at the same time it should be enabled in your custom script!) - set <em>$enableProfileUpdate=FALSE;</em> under <em>setup_options.php</em>. In some cases, disabling the modifying of the profile may be a mandatory condition. It depends on your own program.

<br><br>
There is also a way to enable basic forums options under profile, shortening <em>templates/user_dataform.html</em>. There we will need to eliminate all free type text fields except login name (which can't be changed in miniBB), and optionally eliminate admin's editing variable (read below why). Adding hidden email field (with the default email value) and password fields (with empty values) is a mandatory condition, because these fields are the most important for any profile, incl. miniBB. Finally this template may look like this:

<br><br>

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">&lt;table class="forumsmb"&gt;
&lt;tr&gt;
&lt;td class="caption3"&gt;&lt;a href="{$main_url}/{$startIndex}"&gt;{$sitename}&lt;/a&gt; / {$userTitle}&lt;/td&gt;
&lt;/tr&gt;
&lt;/table&gt;

&lt;table class="tbTransparent"&gt;
&lt;tr&gt;
&lt;td class="tbTransparentCell"&gt;&lt;span class="warning"&gt;{$warning}&lt;/span&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;/table&gt;

&lt;form action="{$main_url}/{$indexphp}" name="regform" method="post" class="formStyle"&gt;
&lt;input type="hidden" name="action" value="{$actionName}" /&gt;

&lt;table class="forumsmb"&gt;
&lt;tr&gt;
&lt;td class="tbClCp"&gt;* &lt;b&gt;{$l_sub_name}&lt;/b&gt;&lt;/td&gt;
&lt;td class="caption5" style="width:100%"&gt;&lt;input type="text" name="login" maxlength="40" size="20" value="{$login}" class="textForm" {$editable} style="width:200px;" /&gt;&lt;span class="txtSm"&gt;{$profileLink}&amp;nbsp;&lt;/span&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td class="tbClCp"&gt;{$l_userViewEmail}&lt;/td&gt;
&lt;td class="caption5"&gt;{$showemailDown}&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td class="tbClCp"&gt;{$l_sortTopics}&lt;/td&gt;
&lt;td class="caption5"&gt;{$sorttopicsDown}&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td class="tbClCp"&gt;{$l_menu[8]}&lt;/td&gt;
&lt;td class="caption5"&gt;{$languageDown}&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td class="tbClCp"&gt;&lt;img src="{$main_url}/img/p.gif" style="width:200px;height:1px" alt="" /&gt;&lt;/td&gt;
&lt;td class="caption5" style="width:100%"&gt;&lt;input type="submit" value="{$userTitle}" class="inputButton" /&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;/table&gt;

&lt;input type="hidden" name="email" value="{$email}" /&gt;
&lt;input type="hidden" name="passwd" value="" /&gt;
&lt;input type="hidden" name="passwd2" value="" /&gt;

{$adminEditField}
&lt;/form&gt; </textarea>

<br><br>Please note that having a custom system, we do not recommend to edit user profiles by admin like it's available in miniBB (i.e. including <em>{ $adminEditField }</em> variable on the form). As admin, you should manage users accounts at your main website level, forgetting that such feature exists on the forums too. However in the case if you have enabled Avatars or Photo album add-ons, it would be necessary to enable basic profile part at least. It may work for the basic profile fields as well, but only in some easy cases. Preventing this from moderators as well, you may put the following code under <em>bb_plugins.php</em>:

<textarea class="textForm" style="width:500px;height:100px;" cols="1" rows="1">/* Restricting from editing a profile on forums */
if(($action=='prefs' or $action=='editprefs') and (isset($_GET['adminUser']) or isset($_POST['adminUser']))){
die('This operation is not available in your synchronized forums version. Please use default tools for modifying users profile from the main website.');
}
/* --Restricting from editing a profile on forums */</textarea>

</li>

</ul>

<h2><a name="package">Examples package all-in-one</a></h2>

<p>You may download all above mentioned code examples in one package, <a href="http://www.minibb.com/download.php?file=minibb_custom_login">clicking here</a>. Use in your scripts at your own risk! I've programmed them in 10 minutes without taking security question in mind. They are just examples.</p>

<h2>Ending the lecture...</h2>

<p>Each software has its own principles of authorization, and here only your professional/educational level matters of how to achieve a good synchronization. It may take hour of work, and it may take days or even a week. In my experience I still didn't meet the software which is technically compatible with miniBB, but still can't be emulated because it has a terrific authorization algorithm which can't be decoded by a human mind. <strong>Everything</strong> can be integrated if it's compatible. Even if it's not possible to rewrite miniBB functions because 3rd party authorization is TOO strong (for example, it was the case when I <a href="http://www.minibb.com/forums/11_4389_1.html#msg30240" target="_blank">synchronized miniBB and the recent version of WordPress</a>), it's still possible to include 3rd party functions and use them in miniBB (you may check my outdated article on <a href="http://www.minibb.com/synchronizing_minibb_wp.html" target="_blank">synchronizing miniBB and the older version of WordPress</a>).</p>

<p>But complexity is just a private case, because mainly the integrations I did in the past are simple, as the web should be. Entertaining Internet is not a serious thing to worry about complex algorithms, the same miniBB is. Good luck in coding :-) and under our <a href="http://www.minibb.com/forums/5_2138_0.html">related topic on forums</a> you may post additional questions to this article.</p>

</td>



</tr>
</tbody></table>

<table class="forumsmb">
<tbody><tr class="tbCel1"><td class="caption1" style="background-color:#D8FFE3"><img src="./index_files/s.gif" style="width:12px;height:9px;padding-right:5px" alt="" title=""><span class="txtNr"><a href="http://www.minibb.com/peoplesay.html">What forum owners say about miniBB</a>: Thank you for a good software. We have been looking for a simple, light BB and we found you. Great job! We installed your BB withing an hour. That was easy.
<img src="./index_files/say.gif" style="width:12px;height:8px" alt="as written by..." title="as written by...">&nbsp;<b>Keith @ Cureself Community</b></span></td></tr>
</tbody></table>

<table class="tbTransparent">
<tbody><tr>
<td style="width:100%;"><span class="txtSm">Copyright © miniBB.com 2001-2016. All rights reserved.<br>miniBB® is a registered trademark. U.S.P.T.O. Reg.No. 3,297,743.</span><!--cnt-- <span class="txtSm"><br />Unique Hits: <abbr title="Today">1,117</abbr> / <abbr title="Yesterday">1,339</abbr> / <abbr title="Total">6,978,182</abbr></span>--/cnt--></td><td style="text-align:right;"><span class="txtSm"><a href="http://www.minibb.com/forums/index.php?action=tpl&amp;tplName=contact_us_form">Contact&nbsp;Us</a>&nbsp;</span><span style="font-size:9px;color:green">@</span></td></tr>
</tbody></table>


</body></html>
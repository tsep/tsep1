<?php 
# Name: Login.class.php 
# Description: simple single user login script 
# Author: ricocheting 
# Web: http://www.ricocheting.com/code/php 
# Update: 2010-06-06 
# Version: 2.1 
# Copyright 2003 ricocheting.com 


/* 
This script is free software: you can redistribute it and/or modify 
    it under the terms of the GNU General Public License as published by 
    the Free Software Foundation, either version 3 of the License, or 
    (at your option) any later version. 

    This program is distributed in the hope that it will be useful, 
    but WITHOUT ANY WARRANTY; without even the implied warranty of 
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
    GNU General Public License for more details. 

    You should have received a copy of the GNU General Public License 
    along with this program.  If not, see <http://www.gnu.org/licenses/>. 
*/ 


//A bit messy, but it will work for now.

$data;

if (!$data = DataCache::Get('login', 'data')) {
 

	$query = "SELECT * FROM ".db::$prefix."users LIMIT 1";
		    
	$result = mysql_query($query);
	$data["user"] = mysql_result($result, 0, "username");
	$data["password"] = mysql_result($result, 0, "passwd");
	
   DataCache::Put('login', 'data', 10, $data);
 }
			
		    	    
		    // username to login into page 
			define('LOGIN_USER', $data['user']); 
			
			// password to login into page 
			define('LOGIN_PASS', $data['password']); 




################################################################################################### 
################################################################################################### 
################################################################################################### 
# CLASS desc: for calling login authentication 
# CLASS req: looks for constants LOGIN_USER and LOGIN_PASS 
# Can be called:  ?action=clear_login   ?action=prompt 
class Login{ 

    // unique prefix that is used with this object (on cookies and password salt) 
    var $prefix = "login_"; 

    // days "remember me" cookies will remain 
    var $cookie_duration = 21; 


    // temporary values for comparing login are auto set here. do not set your own $user or $pass here 
    var $user = ""; 
    var $pass = ""; 


#-############################################# 
# desc: calls the rest of the functions depending on login state 
# returns: nothing, but will print login prompt and die if necessary 
function authorize(){ 

    //save cookie info to session 
    if(isset($_COOKIE[$this->prefix.'user'])){ 
        $_SESSION[$this->prefix.'user'] = $_COOKIE[$this->prefix.'user']; 
        $_SESSION[$this->prefix.'pass'] = $_COOKIE[$this->prefix.'pass']; 
    } 
    //    else{echo "no cookie<br>";} 


    //if setting vars 
    if(isset($_POST['action']) && $_POST['action'] == "set_login"){ 

        $this->user = $_POST['user']; 
        $this->pass = md5($this->prefix.$_POST['pass']); //hash password. salt with prefix 

        $this->check();//dies if incorrect 

        //if "remember me" set cookie 
        if(isset($_POST['remember'])){ 
            setcookie($this->prefix."user", $this->user, time()+($this->cookie_duration*86400));// (d*24h*60m*60s) 
            setcookie($this->prefix."pass", $this->pass, time()+($this->cookie_duration*86400));// (d*24h*60m*60s) 
        } 

        //set session 
        $_SESSION[$this->prefix.'user'] = $this->user; 
        $_SESSION[$this->prefix.'pass'] = $this->pass; 
    } 

    //if forced log in 
    elseif(isset($_GET['action']) && $_GET['action'] == "prompt"){ 
        session_unset(); 
        session_destroy(); 
        //destroy any existing cookie by setting time in past 
        if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25)); 
        if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25)); 

        $this->prompt(); 
    } 

    //if clearing the login 
    elseif(isset($_GET['action']) && $_GET['action'] == "clear_login"){ 
        session_unset(); 
        session_destroy(); 
        //destroy any existing cookie by setting time in past 
        if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25)); 
        if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25)); 

        $msg = '<h2 class="msg">**Logout complete**</h2>'; 
        $this->prompt($msg); 
    } 

    //prompt for 
    elseif(!isset($_SESSION[$this->prefix.'pass']) || !isset($_SESSION[$this->prefix.'user'])){ 
        $this->prompt(); 
    } 

    //check the pw 
    else{ 
        $this->user = $_SESSION[$this->prefix.'user']; 
        $this->pass = $_SESSION[$this->prefix.'pass']; 
        $this->check();//dies if incorrect 
    } 

}#-#authorize() 


#-############################################# 
# desc: compares the user info 
# returns: nothing, but will print login prompt and die if incorrect 
function check(){ 

    if(md5($this->prefix . LOGIN_PASS) != $this->pass || LOGIN_USER != $this->user){ 
        //destroy any existing cookie by setting time in past 
        if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25)); 
        if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25)); 
        session_unset(); 
        session_destroy(); 

        $msg='<h2 class="warn">Incorrect username or password</h2>'; 
        $this->prompt($msg); 
    } 
}#-#check() 


#-############################################# 
# desc: prompt to enter password 
# param: any custom message to display 
# returns: nothing, but exits at end 
function prompt($msg=''){ 
?> 
<html><head> 
<title>Login</title> 
    <style> 
    body{margin:15px;} 
    table.login{border-collapse:collapse;} 
    table.login td{font:bold 10pt verdana;color:black;border:1px #535353 solid;border-collapse:collapse;padding:2px 3px;text-align:center;background:#eeeeee;} 
    table.login td.header{background-color:#cccccc;} 
    .msg{font:bold 120% verdana;text-align:center;color:green;} 
    .warn{font:bold 120% verdana;text-align:center;color:maroon;} 
    </style> 
</head><body> 
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post"> 
    <input type="hidden" name="action" value="set_login"> 

    <?php echo $msg; ?> 

    <table align="center" width="300" class="login"> 
    <tr><td class="header" colspan="2">Enter Login Info</td></tr> 
    <tr> 
        <td class="desc"><label for="user">Username:</label> <input type="text" name="user" id="user"></td> 
        <td class="desc"><label for="pass">Password:</label> <input type="password" name="pass" id="pass"></td> 
    </tr> 

    <tr><td class="desc" colspan="2" style="text-align:left;"> 
        <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me on this computer</label> 
    </td></tr> 

    <tr><td class="desc" colspan="2" style="text-align:right;"><input type="submit" value="Login"></td></tr> 

    </table> 

    </form> 
</body></html> 
<?php 
    //don't run the rest of the page 
    exit; 
}#-#prompt() 


}//CLASS Login 

?>
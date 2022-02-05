 <?php
/* Power By Yexs */
session_start();
include 'db.php';
ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
   <?php include "header.php"; ?>
   
   <title>How to Connect | <?php echo $website_title; ?></title>   
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/static/images/logos/logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li><a href='home'><span class='glyphicon glyphicon-home'></span> HOME</a></li><li><a href='/changelog'><span class='glyphicon glyphicon-wrench'></span> CHANGELOG</a></li>
		<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-signal"></span> INFORMATION <i class="fa fa-chevron-down"></i>
                    </a>
						<div class="dropdown-menu dropdown-menu-dark" role="menu">
                            <a class="dropdown-item" href="/connect">Connection Guide</a>
                            <a class="dropdown-item" href="/account">FAQ</a>
                            <a class="dropdown-item" href="/account">Changes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/account">Report a bug</a>
                            
                 </div>
                </li>
		<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-blackboard'></span> LEADERBOARD <i class="fa fa-chevron-down"></i>
                    </a>
						<div class="dropdown-menu dropdown-menu-dark" role="menu">
                            <a class="dropdown-item" href="/leaderboard">Arena Ladders</a>
							<a class="dropdown-item" href="/hkladder">HK Ladders</a>
                            <a class="dropdown-item" href="/top50">Top 50 killers</a>
                        </div>
                </li>
      </ul>  
<ul class="nav navbar-nav navbar-right">
<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

?>
<li><a href="/account/login"><span class="glyphicon glyphicon-user"></span> Sign In</a></li> 
<?php
}
else
 {
?>	 
<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo htmlspecialchars($_SESSION["username"]); ?> <i class="fa fa-chevron-down"></i>
                    </a>
                        <div class="dropdown-menu dropdown-menu-dark dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="/account/store"><i class="fa fa-shopping-bag"></i>Store</a>
                            <a class="dropdown-item" href="/account/services"><i class="fa fa-wrench"></i>Services</a>
                            <a class="dropdown-item" href="/account/donate"><i class="fa fa-heart"></i>Donate</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/account/manage"><i class="fa fa-cogs"></i>My account</a>
                            <a class="dropdown-item logout-btn" href="/account/logout"><i class="fa fa-sign-out"></i>Log out</a>
                        </div>
                </li>
</ul>  
</ul>
<?php  }  ?>
    </div>
  </div>
</nav>

 <div class="container">
    <div class="row2">
      <div class="col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">How to Connect</div>
          <div class="panel-body">
            <p>

                Step 0: If you already have WoW installed and patched up to 2.4.3 <br /><br />

                Step 1: Download World of Warcraft. <a href="<?php echo $download_link; ?>" target="_blank">Click to start the download.</a> <br /><br />

                Step 2: Check your realmlist.wtf (World of Warcraft/realmlist.wtf) file and replace file content with: <code>set realmlist <?php echo $realmlist; ?></code> <br /><br />

                Step 3: Go to <a href="/"><span class="glyphicon glyphicon-circle-arrow-right"></span> here</a> and create an account. <br /><br />

                Step 4: Using your username (not e-mail address) and password, log in to Server Name, create a character, and you’re all set! <br /><br />

                That's it! If you need any help, do not hesitate to contact us via discord. <br />
                
			    <a href="<?php echo $discord_link; ?>" target="_blank"> <img src="/static/images/discord.png" style="max-width: 300px; border: 0 !important; margin-top: 10px !important;" />
            </p>
          </div>
        </div>
      </div>
    </div>
</div>
<?php include "footer.php" ?>
</body>
</html>
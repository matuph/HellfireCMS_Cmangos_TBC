<?php
/* Power By Yexs */
session_start();
include 'db.php';
ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
$username = $_SESSION['username'];
// защита от грешни входни данни
if(!isset($username))
{
    header('Location: /account/login');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include "header.php"; ?>

<title>Store | <?php echo $website_title; ?></title>
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
        <li><a href='/'><span class='glyphicon glyphicon-home'></span> HOME</a></li><li><a href='/changelog'><span class='glyphicon glyphicon-wrench'></span> CHANGELOG</a></li>
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
<?php  }  ?>
    </div>
  </div>
</nav>

<div class="container">
<div class="row2">
<?php include "left.php" ?>
<?php include "serverinfo.php" ?>

     <!-- right -->
     <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
	 <div class="panel panel-default">
         <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Store </div>  <div style="float: right; line-height: 25px;">
    <div class="col-md-12 text-right" style="margin-top: -40px;">
        <div class="dropdown">
            <a class="btn-shadow btn-shadow-secondary" href="/account/store" data-toggle="dropdown">
                Mounts <i style="margin-left: 8px;"class="fa fa-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-dark dropdown-menu-right no-anim">
			    <a class="dropdown-item" href="/account/store/items">Items</a>
                <a class="dropdown-item" href="/account/tabards">Tabards</a>
                <a class="dropdown-item" href="/account/pets">Pets</a>
				<a class="dropdown-item" href="/account/toys">Toys</a>
				<a class="dropdown-item" href="/account/bags">Bags</a>
            </div>
        </div>
    </div>
</div>

<div class="panel-body">
      <?php include "stores.php" ?>
     </div>
    </div>
</div>
</div>
<footer class="footer footer--dark">
    <div class="container">
        <div class="bottom">
            <ul>
                <li><a target="_blank" href=""><i class="fa fa-reddit-alien"></i></a></li>
                <li><a target="_blank" href=""><i class="discord-icon"></i></a></li>
                <li><a target="_blank" href=""><i class="fa fa-youtube-play"></i></a></li>
                <li><a target="_blank" href=""><i class="fa fa-facebook-official"></i></a></li>
            </ul>
            <div class="copy">© 2020 Lightbringer. All rights reserved.</div>
            <div class="trademark">All trademarks referenced herein are the properties of their respective owners.</div>
            <ul class="footer-links">
                <li><a href="/policy/terms">Terms of Use</a></li>
                <li><a href="/policy/privacy">Privacy</a></li>
                <li><a href="/policy/cookies">Cookies</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
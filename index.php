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
	
    <title><?php echo $website_title; ?></title>
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

                <li class='active'><a href='home'><span class='glyphicon glyphicon-home'></span> HOME</a></li>
                <li><a href='/changelog'><span class='glyphicon glyphicon-wrench'></span> CHANGELOG</a></li>
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
                if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

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
            <?php } ?>
        </div>
    </div>
</nav>
<style>
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: Roboto,sans-serif;
    color: #fff;
}

.lead {
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: 300;
    line-height: 1.4;
	color: #ccc;
}

.realm-status {
    align-items: center;
    background: rgba(0,0,0,.8);
    margin-bottom: 10px;
    padding: 10px 10px 10px 15px;
    position: relative;
    width: 100%;
}

.row {
    margin-right: -15px;
    margin-left: -15px;
}

.realm-status .online:before {
    background: #007e33;
}

.realm-status>div:before {
    position: absolute;
    display: block;
    content: " ";
    top: 0;
    left: 0;
    bottom: 0;
    width: 3px;
}
</style>

<div class="container">
<div style="margin-top: 40px !important;">
<div class="col-md-8">
<h1 class="h1">
Welcome to Lightbringer TBC
</h1> 
<p class="lead" data-v-6af6cce8="">
This is a private burning crusade server created by players on ExcaliburWoW, Lastwow, Sunstrider and many others <font color="#ffffff">With the support and developers of Cmangos and TrinityCore</font>.
</p></div> 

<!--
	  <div class="col-md-4" data-v-6af6cce8="">
	  <div class="realm-status" data-v-6af6cce8="">
	  <div class="row online">
	  <div class="col-xs-6">
	  <div class="realm-name"><span class="h5">Stormspire</span></div> 
	  <div class="realm-uptime"><span class="h5">Uptime</span> 
	  <span class="h5">35m 31s</span>
	  </div>
	  </div> 
	  <div class="col-xs-6 text-right">
	  <div class="faction-ratio">
	  <img src="https://www.lightsvengeance.com/_nuxt/img/3e35b14.png" alt="" class="icon"> 
	  <span class="h5 color-alliance">48%</span>
	  </div> 
	  <div class="faction-ratio">
	  <img src="https://www.lightsvengeance.com/_nuxt/img/2ffd42c.png" alt="" class="icon"> 
	  <span class="h5 color-horde">52%</span>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>-->
	  
	  </div>
	  </div>	  
<div class="container">
    <div style="margin-top: 40px !important;">
        <?php include "left.php" ?>
		<?php include "serverinfo.php" ?>
    <!-- right -->
    <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
        <?php include "news.php" ?>
    </div>
</div>
</div>
<?php include "footer.php" ?>
</body>
</html>
<?php
/* Power By Yexs */
session_start();
ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
$username = $_SESSION['username'];
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /");
    exit;
}
/* login.php */
require_once __DIR__ . '/vendor/autoload.php';
use Laizerox\Wowemu\SRP\UserClient;
include 'db.php';
/* Connect to your CMaNGOS database. */
$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName,$port,$dbChar);

/* Function to get values from MySQL. */
function getMySQLResult($query) {
    global $db;
    return $db->query($query)->fetch_object();
}

/* If the form has been submitted. */
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* Get the salt and verifier from realmd.account for the user. */
    $query = "SELECT s,v FROM account WHERE username='$username'";
    $result = getMySQLResult($query);
    $saltFromDatabase = $result->s;
    $verifierFromDatabase = strtoupper($result->v);

    /* Setup your client and verifier values. */
    $client = new UserClient($username, $saltFromDatabase);
    $verifier = strtoupper($client->generateVerifier($password));

    /* Compare $verifierFromDatabase and $verifier. */
    if ($verifierFromDatabase === $verifier) {

     session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: /");

                        }
						else
						{

							$error = "<div class='alert alert-danger'>Authentication failed!</div>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
	
    <title>Sign In | <?php echo $website_title; ?></title>
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
<li class="active"><a href="/account/login"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
<?php
}
else
 {
?>
<li><a href="account/manage"><span class="glyphicon glyphicon-user"></span>
<?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
</ul>
<?php  }  ?>
    </div>
  </div>
</nav>

<div class="container">
<div class="row2">
<!-- left -->
<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-default" >

<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

?>

          <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Sign In</div>
            <div class="panel-body">
             <div class="signin-form">
                <div id="alert"></div>
				<?php echo $error ?>
                  <form action="/account/login" class="form-signin" method="POST" id="register-form">

                    <div class="form-group">
                      <label for="user">Username:</label>
                      <input type="text" id="user" class="form-control" name="username" required>
                      <span id="check-e"></span>
                    </div>

                    <div class="form-group">
                      <label for="pass">Password:</label>
                      <input type="password" id="pass" class="form-control" name="password" required>
                    </div>
                   <?php $login = sha1(time()); ?>
                    <div class="form-group">
					  <input type="hidden" name="login" value="<?php echo $login; ?>">
                      <button type="submit" class="gradient-btn full-width gradient-color-palette7" id="btn-submit">
                        Sign In
                      </button>

                    </div>
                  </form>
             </div>
			 </div>
</div>
<?php  }  ?>

<?php include "serverinfo.php" ?>

      <!-- right -->
     <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
      <?php include "news.php" ?>
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="/static/js/vendor/yexs.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
</body>
</html>
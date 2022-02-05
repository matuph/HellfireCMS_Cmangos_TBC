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
   
   <title>Add news | <?php echo $website_title; ?></title> 
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

        <li><a href='home'><span class='glyphicon glyphicon-home'></span> HOME</a></li><li class='active'><a href='/changelog'><span class='glyphicon glyphicon-wrench'></span> CHANGELOG</a></li>
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
		<li><a href='/leaderboard'><span class='glyphicon glyphicon-blackboard'></span> LEADERBOARD</a></li>
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
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add news </div>
                        <div class="panel-body">
		  
                           <?php
$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port, $dbChar);

if (isset($_POST['add'])){
	
    $name = $_POST['name'];
    $headline = $_POST['headline'];
	$story = $_POST['story'];
	
    $result = $db->query("INSERT INTO " . $dbweb . ".`news` (headline, story, name, timestamp)VALUES('$headline', '$story', '$name', NOW())");
    
	echo '<div class="text-success fa fa-check"></div>';
}
?>			
							
<form method="post" action="add.php">
  <table width="70%" border="0" cellspacing="0" cellpadding="0">

    <tr>
      <td>News name</td>
      <td><input name="headline" type="text" class="form-control">
    </tr>
    <tr>
      <td>News Story</td>
      <td><textarea name="story" class="form-control"></textarea></td>
    </tr>
    <tr>
      <td colspan="33"><div align="center">
          <input name="name" type="hidden" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
		  <br>
		  <center>
          <input name="add" type="submit" class="btn btn-primary ladda-button" value="Submit">
		  </center>
        </div>
		</td>
    </tr>
  </table>
  </form>

                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php include "footer.php" ?>
</body>
</html>
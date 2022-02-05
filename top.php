<?php
/* Power By Yexs */
session_start();
include 'db.php';
$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port, $dbChar);
ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
	
    <title>Top 50 killers | <?php echo $website_title; ?></title>
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

                <li><a href='home'><span class='glyphicon glyphicon-home'></span> HOME</a></li>
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
                <li class="nav-item dropdown active">
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

<div class="container">
    <div class="row2">
        <?php include "left.php" ?>
        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span> <?php echo $realm_name; ?>
                Information
            </div>
            <div class="panel-body">
                <span class="glyphicon glyphicon-flash"></span> Patch: <?php echo $patch; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> XP: <?php echo $xp; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> Reputations: <?php echo $reputations; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> Professions: <?php echo $professions; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> World Drops: <?php echo $worlddrops; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> Encounter Drops: <?php echo $encounterdrops; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> Honor: <?php echo $honor; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> Arena Points: <?php echo $arenapoints; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> Money: <?php echo $money; ?><br/>
                <span class="glyphicon glyphicon-flash"></span> Realmlist: <?php echo $realmlist; ?>
            </div>
        </div>
    </div>

    <!-- right -->
    <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-default">
         <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span> Top 50 killers </div>
           <div class="panel-body">
<?php
$sql = "SELECT * FROM " . $dbChar . ".characters ORDER BY `totalKills` DESC LIMIT 50";
$result = $db->query($sql);
print '<div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-text-c">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th class="text-left">Name</th>
                            <th>Level</th>
                            <th>Race / Class</th>
                            <th>Faction</th>
                            <th>Today kills</th>
							<th>Total kills</th>
                        </tr>
                    </thead>
                    <tbody>
';
$id = 1;
while ($row = $result->fetch_assoc()) {
array($row);
        if ($row['race'] == 1 || $row['race'] == 3 || $row['race'] == 4 || $row['race'] == 7 || $row['race'] == 11){
                $side = '<div class="game-icon--rounded game-icon game-icon-xs game-icon--faction-0" data-toggle="tooltip" data-placement="top" title="Aliance"><div class="game-icon-icon"></div></div>';
               
        }
        else{
                $side = '<div class="game-icon--rounded game-icon game-icon-xs game-icon--faction-1" data-toggle="tooltip" data-placement="top" title="Horde"><div class="game-icon-icon"></div></div>';
           
        }
       
        switch ($row['race']){
                case 1: $race = 'Human';break;        
                case 2: $row['gender'] == 0 ? $race = 'Orc' : $race = 'Orc';break;                      
                case 3: $race = 'Dwarf';break;
                case 4: $row['gender'] == 0 ? $race = 'Night elf' : $race = 'Night elf';break;
                case 5: $row['gender'] == 0 ? $race = 'Undead' : $race = 'Undead';break;
                case 6: $race = 'Tauren';break;
                case 7: $race = 'Gnome';break;
                case 8: $row['gender'] == 0 ? $race = 'Troll' : $race = 'Troll';break;
                case 10: $row['gender'] == 0 ? $race = 'Blood elf' : $race = 'Blood elf';break;
                case 11: $row['gender'] == 0 ? $race = 'Draenei' : $race = 'Draenei';break;
        }
               
        if ($row['class'] == 1){
                $class = '1';
               
        }
        if ($row['class'] == 2){
                $class = '2';
                
        }
        if ($row['class'] == 3){
                $class = '3';
                
        }
        if ($row['class'] == 4){
                $class = '4';
                
        }
        if ($row['class'] == 5){
                $class = '5';
               
        }
        if ($row['class'] == 7){
                $class = '7';
               
        }
        if ($row['class'] == 8){
                $class = '8';
				$class2 = 'Rogue';
                
        }
        if ($row['class'] == 9){
                $class = '9';
                
        }
        if ($row['class'] == 11){
                $class = '11';
               
        }
		
          else
			 
        {
		if ($row['class'] == 1){
                $class2 = 'Warrior';
                
        }
        if ($row['class'] == 2){
                $class2 = 'Paladin';
                
        }
        if ($row['class'] == 3){
                $class2 = 'Hunter';
                
        }
        if ($row['class'] == 4){
                $class2 = 'Rogue';
                
        }
        if ($row['class'] == 5){
                $class2 = 'Priest';
                
        }
        if ($row['class'] == 7){
                $class2 = 'Shaman';
                
        }
        if ($row['class'] == 8){
                $class2 = 'Mage';
                
        }
        if ($row['class'] == 9){
                $class2 = 'Warlock';
                
        }
        if ($row['class'] == 11){
                $class2 = 'Druid';
               
        }
	}	
	
        $name = $row['name'];
        $level = $row['level'];
        $kills_today = $row['todayKills'];
        $kills = $row['totalKills'];

        echo '
		<tr>
           <td>'.$id.'</td>
           <td class="text-left">'.$name.'</td>
		   <td>'.$level.'</td>
           <td class="icon">
           <div data-toggle="tooltip" data-placement="top" title="'.$race.'" class="game-icon--rounded game-icon game-icon-sm game-icon--race-'.$row['race'].'_'.$row['gender'].'"><div class="game-icon-icon"></div></div>
		   <div data-toggle="tooltip" data-placement="top" title="'.$class2.'" class="game-icon--rounded game-icon game-icon-sm game-icon--class-'.$class.'"><div class="game-icon-icon"></div></div>
            </td>
           <td class="icon">
           '.$side.'
           </td>
           <td>'.$kills_today.'</td>
		   <td>'.$kills.'</td>
          </tr>
		';
$id++;
}
if ($id <= 1)
        print ''.$zone.'';

?>
<tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include "footer.php" ?>
</body>
</html>
<div class="panel panel-default">
         <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> My account</div>
           <div class="panel-body">
<div class="row2">
    <div class="col-md-9">
        <div class="infocard">
            <div class="card-header">
                ACCOUNT SUMMARY
            </div>
            <div class="card-body">
                <table class="table-transp">
                    <tbody class="account-info">
<?php
$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName,$port,$dbChar);
$sql = "SELECT id, username, email, gmlevel, joindate, expansion, last_login, last_ip, locked FROM account WHERE username='$username'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo "<span class='glyphicon glyphicon-user'></span> User: <b>". $row["username"]. "</b> <br>";
		echo "<span class='glyphicon glyphicon-send'></span> Email address: <b>". $row["email"]. "</b> <br>";
		echo "<span class='glyphicon glyphicon-time'></span> Join Date: <b>". $row["joindate"]. "</b> <br>";
		echo "<span class='glyphicon glyphicon-time'></span> Last login: <b>". $row["last_login"]. "</b> <br>";
		echo "<span class='glyphicon glyphicon-eye-open'></span> Last ip: <b>". $row["last_ip"]. "</b> <br>";
		
       if ($row['gmlevel'] == 3){ 
        echo '<span class="glyphicon glyphicon-star"></span> Rank:  <font color="#e34141"><b>Administrator</b></font> <br>'; 
       }
      else
       if ($row['gmlevel'] == 0){ 

        echo '<span class="glyphicon glyphicon-star-empty"></span> Rank: <b>Player</b> <br>'; 
       }
	  else
       if ($row['gmlevel'] == 2){ 

        echo '<span class="glyphicon glyphicon-star-empty"></span> Rank: <font color="blue"><b>Gamemaster</b></font> <br>'; 
       }
	  else
       if ($row['gmlevel'] == 1){ 

        echo '<span class="glyphicon glyphicon-star-empty"></span> Rank: <font color="green"><b>Moderator</b></font> <br>'; 
       }
	   
	   if ($row['expansion'] == 2){ 

        echo '<span class="glyphicon glyphicon-heart"></span> Expansion: <b>TBC</b> <br>'; 
       }
	   
		if ($row['locked'] == 0){ 
        echo '<span class="glyphicon glyphicon-ok-circle"></span> Account status:  <font color="green"><b>Active</b></font> <br>'; 
       }
         else
       if ($row['locked'] == 1){ 

        echo '<span class="glyphicon glyphicon-ban-circle"></span> Account status: <font color="red"><b>Banned</b></font> <br>'; 
       }
	
	?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	
    <div class="col-md-3">
        <div class="infocard">
            <div class="card-header">
               <span class='glyphicon glyphicon-gift'></span> Coins<span class="pull-right">0</span>
            </div>
            <div class="card-body services-list">
                <a href="/account/store"><i class="fa fa-shopping-bag"></i>Store</a><br />
                <a href="/account/services"><i class="fa fa-wrench"></i>Services</a><br />
                <a href="/account/donate"><i class="fa fa-heart" style="font-size: 15px;"></i>Donate</a>
            </div>
        </div>
    </div>
</div>
      
	  <div class="row2">
    <div class="col-md-12">

			<div class="panel panel-default">
          <div class="panel-heading"> Your character </div>
		   <div class="panel-body">
<?php
$result2 = $db->query("SELECT guid as id, name as text, level, class, race, gender FROM " . $dbChar . ".`characters` WHERE account = " . $row['id'] . " ORDER BY `level`");
print '<div class="row2">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-text-c">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Name</th>
                            <th>Level</th>
                            <th>Race / Class</th>
                            <th>Faction</th>
                        </tr>
                    </thead>

 <tbody>
';
$id++;
while($row2 = $result2->fetch_assoc()) {
array($row2);
        if ($row2['race'] == 1 || $row2['race'] == 3 || $row2['race'] == 4 || $row2['race'] == 7 || $row2['race'] == 11){
                $side = '<div class="game-icon--rounded game-icon game-icon-xs game-icon--faction-0" data-toggle="tooltip" data-placement="top" title="Aliance"><div class="game-icon-icon"></div></div>';
               
        }
        else{
                $side = '<div class="game-icon--rounded game-icon game-icon-xs game-icon--faction-1" data-toggle="tooltip" data-placement="top" title="Horde"><div class="game-icon-icon"></div></div>';
           
        }
       
        switch ($row2['race']){
                case 1: $race = 'Human';break;        
                case 2: $row2['gender'] == 0 ? $race = 'Orc' : $race = 'Orc';break;                      
                case 3: $race = 'Dwarf';break;
                case 4: $row2['gender'] == 0 ? $race = 'Night elf' : $race = 'Night elf';break;
                case 5: $row2['gender'] == 0 ? $race = 'Undead' : $race = 'Undead';break;
                case 6: $race = 'Tauren';break;
                case 7: $race = 'Gnome';break;
                case 8: $row2['gender'] == 0 ? $race = 'Troll' : $race = 'Troll';break;
                case 10: $row2['gender'] == 0 ? $race = 'Blood elf' : $race = 'Blood elf';break;
                case 11: $row2['gender'] == 0 ? $race = 'Draenei' : $race = 'Draenei';break;
        }
               
        if ($row2['class'] == 1){
                $class = '1';
               
        }
        if ($row2['class'] == 2){
                $class = '2';
                
        }
        if ($row2['class'] == 3){
                $class = '3';
                
        }
        if ($row2['class'] == 4){
                $class = '4';
                
        }
        if ($row2['class'] == 5){
                $class = '5';
               
        }
        if ($row2['class'] == 7){
                $class = '7';
               
        }
        if ($row2['class'] == 8){
                $class = '8';
				$class2 = 'Rogue';
                
        }
        if ($row2['class'] == 9){
                $class = '9';
                
        }
        if ($row2['class'] == 11){
                $class = '11';
               
        }
		
          else
			 
        {
		if ($row2['class'] == 1){
                $class2 = 'Warrior';
                
        }
        if ($row2['class'] == 2){
                $class2 = 'Paladin';
                
        }
        if ($row2['class'] == 3){
                $class2 = 'Hunter';
                
        }
        if ($row2['class'] == 4){
                $class2 = 'Rogue';
                
        }
        if ($row2['class'] == 5){
                $class2 = 'Priest';
                
        }
        if ($row2['class'] == 7){
                $class2 = 'Shaman';
                
        }
        if ($row2['class'] == 8){
                $class2 = 'Mage';
                
        }
        if ($row2['class'] == 9){
                $class2 = 'Warlock';
                
        }
        if ($row2['class'] == 11){
                $class2 = 'Druid';
               
        }
	}	
		
		
		$name = $row2["text"];	
		$level = $row2["level"];
   
		
        echo '
		<tr>
           <td>' . $id++ . '</td>
           <td class="text-left">' . $name . '</td>
		   <td>'.$level.'</td>
           <td class="icon">
           <div data-toggle="tooltip" data-placement="top" title="'.$race.'" class="game-icon--rounded game-icon game-icon-sm game-icon--race-'.$row2['race'].'_'.$row2['gender'].'"><div class="game-icon-icon"></div></div>
		   <div data-toggle="tooltip" data-placement="top" title="'.$class2.'" class="game-icon--rounded game-icon game-icon-sm game-icon--class-'.$class.'"><div class="game-icon-icon"></div></div>
            </td>
           <td class="icon">
           '.$side.'
           </td>
          </tr>
		';

}
?>
                    </table>
               </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>
<?php }} ?>

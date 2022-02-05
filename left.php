<!-- left -->
<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"> 
<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

?>
<script type="text/javascript" src="/static/js/sweetalert.js"></script></body>
<div class="panel panel-default" > 
          <div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Registration</div>
            <div class="panel-body">
             <div class="signin-form">
                <div id="alert"></div>
                  <form action="" class="form" method="POST" id="register-form">

                    <div class="form-group">
                      <label for="user">Username:</label>
                      <input type="text" id="user" class="form-control" name="username" required>
                      <span id="check-e"></span>
                    </div>

                    <div class="form-group">
                      <label for="pass">Password:</label>
                      <input type="password" id="pass" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                      <label for="pass2">Confirm Password:</label>
                      <input type="password" id="pass2" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" id="email" class="form-control" name="email" required>
                    </div>
					<!--
					<center>
                      <div class="g-recaptcha" data-sitekey="6LcQAuYUAAAAAOKR7QI2WsJQYYRI8ZfUU4ne1QsG"></div>
                    </center>
					-->
                     <?php $register = sha1(time()); ?>
                    <div class="form-group">
					  <input type="hidden" name="register" value="<?php echo $register; ?>">
                      <button type="submit" class="gradient-btn full-width gradient-color-palette7" id="btn-submit">
                         Create account
                      </button>
                    </div>
                  </form>
				  <div class="mostrar"></div>
					<script>
	$(function(){
		$('.form').submit(function(){
			$('.loading').html("<img src='loading.gif' width='45'>");
			$.ajax({
				url: 'account/register',
				type: 'POST',
				data: $('.form').serialize(),
				success: function(data){
					$('.mostrar').html(data);
					$('.loading').hide();
					$('.form')[0].reset();
				}
			});
			return false;
		});
	});
</script>	
				  
             </div> 
		 </div> 

 </div>
<?php
}
?>	
<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-flash"></span> Server stats</div>
<div class="panel-body">
<?php
                /* Power By Yexs */
				$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port, $dbChar);
                $sql = "SELECT * FROM `uptime` WHERE `realmid`= 1 ORDER BY `startstring` DESC LIMIT 1";
                $result = $db->query($sql);
                while ($row = $result->fetch_assoc()) {

                    $uptime = $row['uptime'];
                    $sec = $uptime % 60;
                    $uptime = intval($uptime / 60);
                    $min = $uptime % 60;
                    $uptime = intval($uptime / 60);
                    $hour = $uptime % 24;
                    $uptime = intval($uptime / 24);
                    $day = $uptime;

                    if ($day != 0)
                        $day = $day . " d,";
                    else
                        $day = "";
                    if ($hour != 0)
                        $hour = $hour . " h,";
                    else
                        $hour = "";
                    if ($min != 0)
                        $min = $min . " m";
                    else
                        $min = "";

                    if ($sec != 0)
                        $sec = $sec . " s,";
                    else
                        $sec = "";

                    echo "<a href='#'><span class='glyphicon glyphicon-time'></span> Server uptime: $day $hour $min</a></br>";
                }
                ?>   
<span class="glyphicon glyphicon-flash"></span> Realmlist: <code><?php echo $realmlist; ?></code>
</div>
</div>
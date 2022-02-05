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
   <title>Changelog | <?php echo $website_title; ?></title>
   <script>var aowow_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>   
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
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Changelog<div class="form-group pull-right">
                  <?php
if (isset($_POST['listings'])){
        $listings = $_POST['listings'];
    } else if (isset($_GET['listings'])) {
        $listings = $_GET['listings'];
    } else {
        $listings = '14 April 2020';
		
    }

    switch ($listings) {
        case '14 April 2020':
            $iframe = '<span class="title">Saturday, 14 April 2020</span>
                    <div class="sub-title">General</div>
<li>Major optimization changes! You ll feel the difference in the evenings.																					</li>
<li>Fixed some more doors players were still able to run through after a relog.                                                                            </li>
<li>Fixed herbs & nodes sometimes spawning on the same spot.                                                                                                </li>
<li>Added some surprise event for Easter.                                                                                                                   </li>
<li>Implemented max guild size (600 members).                                                                                                               </li>
<li>Reduced crit chance suppression against boss targets from 4.8% to 1.8%.                                                                                      </li>
<li>Fixed some case of creatures not playing the swimming animation correctly when swimming.                                                                </li>
<li>Implemented <a href="https://tbcdb.com/?item=32233"></a>.                                                                                                                               </li>
<li>Fixed some cases of players being wrongly kicked.                                                                                                       </li>
<li>Fixed a bug with the unread mail count not shown properly if you have more than 255 unread mails. And yes some people apparently do have that many.     </li>
<li>Fixed <a href="https://tbcdb.com/?spell=30022"></a> doing 0 damage (appearing as "Miss") when target has <a rel="buff" href="https://tbcdb.com/?spell=14169"></a> applied.                                                          </li>
<li>Fixed <a href="https://tbcdb.com/?spell=33736"></a> not proccing off <a href="https://tbcdb.com/?spell=2094"></a>.                                                                                                      </li>
<li>Fixed parry haste formula rounding errors.                                                                                                              </li>
<li>Updated mining and herb pools to always have 40% of their available resources up (up from 25%).                                                         </li>
<li>Fixed <a href="https://tbcdb.com/?item=11905"></a> not being usable.                                                                                                                    </li>
<li>Adjusted the proc rate of <a rel="buff" href="https://tbcdb.com/?spell=23688"></a>.                                                                                                                 </li>


<div class="sub-title class-hunter"><div class="game-icon game-icon-xs game-icon--class-3"><div class="game-icon-icon"></div></div><span>Hunter</span></div>
<ul>
<li>Fixed ranks of <a href="https://tbcdb.com/?spell=1130"></a> stacking with different levels of <a href="https://tbcdb.com/?spell=19421"></a>.</li>
</ul>

<div class="sub-title class-shaman"><div class="game-icon game-icon-xs game-icon--class-7"><div class="game-icon-icon"></div></div><span>Shaman</span></div>
<ul>
<li>Removed threat from <a rel="buff" href="https://tbcdb.com/?spell=30803"></a> proc.</li>
<li>Fixed <a rel="buff" href="https://tbcdb.com/?spell=24398"></a> and <a rel="buff" href="https://tbcdb.com/?spell=324"></a> triggering on periodic area auras (such as <a rel="buff" href="https://tbcdb.com/?spell=30522"></a>).</li>
</ul>


<div class="sub-title">Battlegrounds and Arenas</div>
<ul>
<li>Fixed one Arathi Basin cemetery not properly teleporting ghost players when the node is taken.		</li>
<li>Fixed Eye of the Storm incorrect messages when losing a point.                                      </li>
<li>Fixed a bug where the max rating difference would be ignored in matchmaking for arena games.        </li>
<li>Tweaked pathing around Ruins of Lordaeron Tomb to allow more consistent charges and pet pathing.    </li>
</ul>

<div class="sub-title">Instances and Raids</div>
<ul>
<li>Fixed 5man dungeons showing "This raid will reset in...".													</li>
<li>Restrict Karazhan books like <a href="https://tbcdb.com/?item=23864"></a> to Karazhan.                                                      </li>
<li>Fixed some altars summoning spells in various vanilla instance.                                             </li>
<li>Fixed locked chest like <a href="https://tbcdb.com/?object=184849"></a> not being unlocked for everyone when someones uses a key on them.   </li>
<li>Many fixes and adjustments to SSC.                                                                          </li>
<li>Fixed BRD s <a href="https://tbcdb.com/?npc=16059"></a> event.                                                                              </li>
<li>Fixed Warrior s T5 <a rel="buff" href="https://tbcdb.com/?spell=37529"></a> bonus.                                                                      </li>
<li>Fixed animal bosses not saving players to a Karazhan ID.                                                    </li>
<li>Fixed <a href="https://tbcdb.com/?npc=14517"></a> behavior.                                                                                 </li>
<li>Improved despawn logic for last boss events in Old Hillsbrad Foothills.                                     </li>
<li>Fixed Coilfang Reservoir trash packs not being linked to their respective bosses.                           </li>
<li>Added more grace period to <a href="https://tbcdb.com/?npc=18836"></a> s <a href="https://tbcdb.com/?spell=33144"></a>.                                                     </li>
<li>Improved <a href="https://tbcdb.com/?npc=20343"></a> s <a href="https://tbcdb.com/?spell=35120"></a> targeting.                                                             </li>
<li>Fixed a few doors in UBRS.                                                                                  </li>
</ul>


<div class="sub-title">World and Quests</div>
<ul>
<li>Fixed dates for Darkmoon Faire													</li>
<li>Fixed <a href="https://tbcdb.com/?npc=18945"></a> not returning to the Dark Portal when respawning.             </li>
<li>Fixed minor issues with <a href="https://tbcdb.com/?npc=17711"></a> s reset.                                    </li>
<li>Added missing <a href="https://tbcdb.com/?item=32071"></a> to its respective vendors.                           </li>
<li>Fixed <a href="https://tbcdb.com/?npc=18382"></a> missing <a href="https://tbcdb.com/?item=38229"></a> and <a href="https://tbcdb.com/?item=34478"></a>.                        </li>
<li>Removed experience from <a href="https://tbcdb.com/?npc=6066"></a>, <a href="https://tbcdb.com/?npc=2462"></a>, <a href="https://tbcdb.com/?npc=10925"></a>.                    </li>
<li>Fixed <a href="https://tbcdb.com/?npc=21318"></a> not despawning                                                </li>
<li>Removed <a href="https://tbcdb.com/?item=22574"></a> from <a href="https://tbcdb.com/?npc=22454"></a>.                                          </li>
<li>Updated <a href="https://tbcdb.com/?npc=20787"></a> script.                                                     </li>
<li>Fixed Dark Portal event <a href="https://tbcdb.com/?npc=18945"></a> not respawning in his correct spot.         </li>
<li>Updates respawn timer for <a href="https://tbcdb.com/?object=181963"></a>.                                      </li>
<li>Added a missing graveyard and <a href="https://tbcdb.com/?npc=6491"></a> in Barrier Hills (above Shattrath).    </li>
<li>Added more protection to <a href="https://tbcdb.com/?npc=22112"></a> s reset.                                   </li>
<li>Added <a href="https://tbcdb.com/?spell=44155"></a> and <a href="https://tbcdb.com/?spell=44157"></a> to their respective trainers.             </li>
<li>Added more chance for <a href="https://tbcdb.com/?object=181555"></a> to contain <a href="https://tbcdb.com/?item=22574"></a>. </li>
</ul>';
            $selected = '14 April 2020';
            break;
        case 'captivaResidential':
            $iframe = '<li>Major optimization changes! You ll feel the difference in the evenings2.</li>';
            $selected = 'da';
            break;
        case 'sanibelCondo':
            $iframe = '<li>Major optimization changes! You ll feel the difference in the evenings3.</li>';
            $selected = 'selected';
            break;
        case 'sanibelResidential':
            $iframe = '<li>Major optimization changes! You ll feel the difference in the evenings4.</li>';
            $selected = 'selected';
            break;
        case 'choose':
            $iframe = '<li>Major optimization changes! You ll feel the difference in the evenings5.</li>';
            $selected = 'selected';
            break;
    }
?>

        <form role="form">
		 <div class="col-md-8">
            <select name="listings" class="form-control1 form-control-sm">
                <option value="choose">Choose an Changelog</option>
                <option value="14 April 2020">Saturday, 14 April 2020</option>
                <option value="captivaResidential">Captiva Residential</option>
                <option value="sanibelCondo">Sanibel Condo</option>
                <option value="sanibelResidential">Sanibel Residential</option>
            </select>
			</div>
			 <div class="col-md-4">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Search</button>
			  </div>
        </form>
                </div>
				</div>
				
<div class="panel-body">
<div id="changelog-content">	
<?php 
echo $iframe;
?>			
</div>
</div>
				

</div>
</div>
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
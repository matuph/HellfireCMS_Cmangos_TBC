<div id="ajax-dialog" class="modal animated fast fadeIn" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-section"></div>
            <div class="modal-body"></div>
            <div class="modal-footer1">
                <button type="button" id="action-button" data-style="slide-left" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<div class="store-items">
<div style="margin-top: 15px !important;">
    <div class="col-md-3 pb-4">
        <div class="list-group">
            <a class="list-group-item list-group-item-action active" href="/account/store/items">Items</a>
			<a class="list-group-item list-group-item-action" href="/account/store">Mounts</a>
            <a class="list-group-item list-group-item-action" href="/account/store/tabards">Tabards</a>
            <a class="list-group-item list-group-item-action" href="/account/store/pets">Pets</a>
            <a class="list-group-item list-group-item-action" href="/account/store/toys">Toys</a>
            <a class="list-group-item list-group-item-action" href="/account/store/bags">Bags</a>
        </div>
    </div>
<?php
$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName,$port,$dbChar);

$sql = "SELECT * FROM " . $dbweb . ".store WHERE cat='2' ORDER BY id DESC";
$result = $db->query($sql);

while($row = $result->fetch_assoc()) {

$itemid = $row['item_id'];
$item_name = $row['item_name'];
$big_name = $row['big_name'];
$item_price_dp = $row['item_price_dp'];
$item_image = $row['item_image'];
$item_votes = $row['item_votes'];
$item_color = $row['item_color'];
$item_icons = $row['item_icons'];


?>			  
<div class="col-md-9 store-items">
                <div class="store-item" data-item-icon-name="<?php echo $item_icons; ?>" data-se="<?php echo $itemid; ?>" data-name="<?php echo $big_name; ?>" data-price="Free" data-quality="<?php echo $item_color; ?>" data-itemid="<?php echo $itemid; ?>">
                    <div class="si item-icon">
                        <div class="icon">
                            <a href="https://tbcdb.com/?item=<?php echo $itemid; ?>" style="background-image: url('/static/images/wow/icons/large/<?php echo $item_icons; ?>.jpg')"></a>
                        </div>
                    </div>
                    <div class="item-name">
                        <a href="https://tbcdb.com/?item=<?php echo $itemid; ?>" target="_blank" class="q-<?php echo $item_color; ?>-i"><?php echo $item_name; ?></a><br/>
                        <!--<span class="si-desc">text</span>-->
                    </div>
                    <div class="si price">Free</div>
                </div>
        
    </div>
	
<?php
}
?>

      </div>
   </div>
</div>

<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.3.1.min.js" crossorigin="anonymous" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT">
</script>
<script>(window.jQuery||document.write("\u003Cscript src=\u0022\/static\/js\/vendor\/jquery.min.js\u0022 crossorigin=\u0022anonymous\u0022 integrity=\u0022sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV\u002BrXbYlF2cqB8txI\/8aZajjp4Bqd\u002BV6D5IgvKT\u0022\u003E\u003C\/script\u003E"));</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous" integrity="sha256-E/V4cWE4qvAeO5MOhjtGtqDzPndRO1LBk8lJ/PR7CA4=">
</script>
<script>(window.jQuery && window.jQuery.fn && window.jQuery.fn.modal||document.write("\u003Cscript src=\u0022\/static\/js\/vendor\/bootstrap.bundle.min.js\u0022 crossorigin=\u0022anonymous\u0022 integrity=\u0022sha256-E\/V4cWE4qvAeO5MOhjtGtqDzPndRO1LBk8lJ\/PR7CA4=\u0022\u003E\u003C\/script\u003E"));</script>
<script src="/static/js/vendor/linq.min.js"></script>
<script src="/static/js/vendor/yexs.min.js"></script>
<script src="/static/js/vendor/handlebars.min.js?v=IGmyMiUp4jBix4XZrTZETaa8AWeEOhAEqOVLVIgNeBQ"></script>
<script src="/static/js/vendor/ladda.min.js"></script>

<script id="ajax-dialog-response-tmpl" type="text/x-handlebars-template">
    <div class="modal-response-icon animated zoomIn">
        {{#if this.IsErrorResponse}}
        <div class="text-danger fa fa-times"></div>
        {{else}}
        <div class="text-success fa fa-check"></div>
        {{/if}}
    </div>
    <div class="modal-response-text animated fadeInUp">
        <p id="response-message">{{this.Message}} Item has been sent successfully.</p>
    </div>
</script>
<script src="/static/js/vendor/tilt.min.js"></script>
<script src="/static/js/vendor/select2.min.js"></script>
	<?php
	$sql = "SELECT id, username, email, gmlevel, joindate FROM account WHERE username='" . $_SESSION['username'] . "'";
	$result = $db->query($sql);
	$characters = [];
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {				
			$result2 = $db->query("SELECT guid as id, race, class, gender, level, name as text FROM " . $dbChar . ".`characters` WHERE account = " . $row['id'] . "");
		$i=0;
		while($row2 = $result2->fetch_assoc()) {		
			$characters[$i]['name'] = $row2["text"];
			$characters[$i]['id'] = $row2["id"];
			$characters[$i]['race'] = $row2["race"];
			$characters[$i]['class'] = $row2["class"];
			$characters[$i]['gender'] = $row2["gender"];
			$characters[$i]['level'] = $row2["level"];
			$i++;


		}

        }
		
	}
?>

 <script id="confirm-tmpl" type="text/x-handlebars-template">    
    <div class="row">        
        <div class="col-md-12">            
            <div class="form-group pt-3">
                <label>Purchase for character:</label>
                <select class="form-control" id="character-sel"></select>
            </div>
        </div>
    </div>    
    </script>
    <script id="confirm-section-tmpl" type="text/x-handlebars-template">    
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="game-item">
                <a rel="item={{itemid}}" style="background-image: url('/static/images/wow/icons/large/{{itemIconName}}.jpg')"></a>
            </div>
            <p><a href="https://tbcdb.com/?item={{itemid}}" target="_blank" class="q-{{quality}}-i">[{{name}}]</a></p>
            <span class="text-warning">This item is <strong>{{price}}</strong>.</span>
        </div>        
    </div>    
    </script>
    <script id="char-sel-item-tmpl" type="text/x-handlebars-template">
        <div class="select2-character_container">
            <div class="game-icon--rounded game-icon game-icon-md game-icon--race-{{race}}_{{gender}}">
                <div class="game-icon-icon"></div>
            </div>
            <div class="select2-character_info">
                <div class="select2-character-name"><font color="#cecab1">{{text}}</font></div>
                <div class="select2-character-levelclass"><font color="#cecab1">Level {{level}} </font><span class="class-{{toLowerCase className}}">{{className}}</span></div>
            </div>
        </div>
    </script>
<script>
    $(function () {
        var store = new Store();
        store.characters =
            <?php
            echo '[';
            foreach ($characters as $character)
          {
			  
		if ($character['class'] == 1){
                $class = 'Warrior';
                $style_class = '#C79C6E';
        }
        if ($character['class'] == 2){
                $class = 'Paladin';
                $style_class = '#F58CBA';
        }
        if ($character['class'] == 3){
                $class = 'Hunter';
                $style_class = '#ABD473';
        }
        if ($character['class'] == 4){
                $class = 'Rogue';
                $style_class = '#FFF569';
        }
        if ($character['class'] == 5){
                $class = 'Priest';
                $style_class = '#FFFFFF';
        }
        if ($character['class'] == 7){
                $class = 'Shaman';
                $style_class = '#0070DE';
        }
        if ($character['class'] == 8){
                $class = 'Mage';
                $style_class = '#69CCF0';
        }
        if ($character['class'] == 9){
                $class = 'Warlock';
                $style_class = '#9482C9';
        }
        if ($character['class'] == 11){
                $class = 'Druid';
                $style_class = '#FF7D0A';
        }

            echo '{"id":' . $character['id'] . ',"text":"' . $character['name'] . '","race":"' . $character['race'] . '","className":"' . $class . '","gender":"' . $character['gender'] . '","level": "' . $character['level'] . '"},';
            }
            echo ']';
            ?>// [];
            store.purchaseUrl = "/send_ajax.php";
        store.initialize();
    });
</script>
</body>
</html>
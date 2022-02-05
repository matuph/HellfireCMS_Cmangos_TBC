<?php
include 'db.php';
$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port, $dbChar);

    $char_guid = $_POST['characterGuid'];
	$items_id = $_POST['storeEntryId'];
    $has_items = "1";
    $gold = 0;

    $item = 1;
    if ($item == 0) {
        $has_items = 0;
    } else {
        $has_items = 1;
    }

    $result = $db->query("SELECT MAX(`guid`) FROM " . $dbChar . ".`item_instance`");
    $row = $result->fetch_assoc();
    $item_instance_id = $row["MAX(`guid`)"];
    $item_instance_id++;

    $result = $db->query("INSERT INTO " . $dbChar . ".`item_instance` (`guid`, `owner_guid`, `data`) VALUES ($item_instance_id , '0', '" . $item_instance_id . " 0 3 $items_id 0 0 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0')");
    $result = $db->query("SELECT MAX(`id`) FROM " . $dbChar . ".`item_text`");

    $row = $result->fetch_assoc();
    $item_page_id = $row["MAX(`id`)"];
    $item_page_id = $item_page_id + 1;

    $result = $db->query("INSERT INTO " . $dbChar . ".`item_text` (id, text) VALUES ($item_page_id,'Thank you for voting!')");
    $result = $db->query("SELECT MAX(`id`) FROM " . $dbChar . ".`mail`");

    $row = $result->fetch_assoc();
    $mail_id = $row["MAX(`id`)"];
    $mail_id = $mail_id + 1;

    $result = $db->query("INSERT INTO " . $dbChar . ".`mail` (id,messageType,stationery,mailTemplateId,sender,receiver,subject,itemTextId,has_items,expire_time,deliver_time,money,cod,checked) VALUES ($mail_id, 0, 61, 0, '0', $char_guid, 'Item store', '$item_page_id', '$has_items', '" . (time() + (30 * 24 * 3600)) . "','" . (time() + 5) . "', '$gold', 0, 0)");
    if ($has_items) {
        $result = $db->query("INSERT INTO " . $dbChar . ".`mail_items` (mail_id,item_guid,item_template,receiver) VALUES ($mail_id, $item_instance_id, $items_id, $char_guid)");
		
		echo '<div class="text-success fa fa-check"></div>';
    }


?>

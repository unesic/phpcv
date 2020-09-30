<?php

if (isset($_POST['id'])) {
	include_once '../../defines.php';
	include_once '../../inc/class/Database.php';
	include_once '../../inc/class/Component.php';
	
	$db = Database::init();
	
    if (isset($_POST['content'])) {
        
        $data['id'] = $_POST['id'];
        $data['content'] = $_POST['content'];
        Component::update($db, $data);
        
        echo $_POST['type'];
    
    } else {
     
	    $component = Component::get($db, $_POST['id']);
	    echo json_encode($component);
	    
    }
}
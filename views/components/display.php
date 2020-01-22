<?php

$components = (new Component($db))->getComponents();
$i = 0;
$components_all = array();

foreach ($components as $component) {
	$components_all[$i] = new Component($db);
	
	$components_all[$i]->setId($component['id']);
	$components_all[$i]->setType($component['type']);
	$components_all[$i]->setContent($component['content']);
	$components_all[$i]->setCvId($component['id']);
	
	$components_all[$i++]->display();
}

//print("<pre>".print_r($components_all,true)."</pre>");

include_once 'views/components/create.php';
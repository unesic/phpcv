<?php

$components = (new Component($db))->getComponents();
$i = 0;

foreach ($components as $component) {
	$components_all[$i] = new Component($db);
	
	$components_all[$i]->setId($component['id']);
	$components_all[$i]->setType($component['type']);
	$components_all[$i]->setContent($component['content']);
	$components_all[$i]->setCvId($component['id']);
	
//	print_r($components_all[$i]);
	
	$components_all[$i++]->display();
//	Component::display($component);
}

include_once 'views/components/create.php';
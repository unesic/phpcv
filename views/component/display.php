<?php

$components = Component::getComponents($db);

foreach ($components as $component) {
	Component::display($component);
}

include_once 'views/component/create.php';
include_once 'views/component/update.php';
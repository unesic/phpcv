<?php

$components = Component::getComponents($db, $_COOKIE['CURRENT_CV']);

foreach ($components as $component) {
	Component::display($component);
}

include_once 'views/component/create.php';
include_once 'views/component/update.php';
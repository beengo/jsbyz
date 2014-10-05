<?php
//load default config file

//autoload core classes
spl_autoload_register("loadCore");

define('NAME_SPACE','jsbyz');
function loadCore($className) {

	$classes = explode('\\', $className);
	$className = $classes[1];
	
	switch($classes[0]) {
		case "jsbyz":
				require CORE_PATH.'/'.$className.'.class.php';
				break;
		case APP_NAME:
				$className = $classes[2];
				require APP_PATH.'/Controller/'.$className.'.class.php';
				break;
		default:break;
	}

}




jsbyz\App::run();

//

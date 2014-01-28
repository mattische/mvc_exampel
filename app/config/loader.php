<?php
include("config/database_conf.php");

define('HEAD', 'templates/header.php');
define('FOOT', 'templates/footer.php');
	
define('CONTROLLER_DIR', 'controller/');
define('MODEL_DIR', 'model/');
define('LIB_DIR', 'lib/');
define('Twig_DIR', 'lib/Twig/');
// Add class dir's to include path
set_include_path(get_include_path().PATH_SEPARATOR.CONTROLLER_DIR);
set_include_path(get_include_path().PATH_SEPARATOR.MODEL_DIR);
set_include_path(get_include_path().PATH_SEPARATOR.LIB_DIR);
set_include_path(get_include_path().PATH_SEPARATOR.Twig_DIR);


spl_autoload_extensions('.php');
// use default autoload implementation
spl_autoload_register();

?>
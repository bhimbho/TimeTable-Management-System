<?php
spl_autoload_register(function($a){
	include $a.'.class.php';
});
?>
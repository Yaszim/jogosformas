<?php
    spl_autoload_register(callback: function($class): void {
        include '../classes/' . $class . '.class.php';
        require_once '../config/config.inc.php';
    });

?>
<?php
require_once 'config/db.php';
require_once 'controllers/CitasController.php';

$controller = new CitasController();
$controller->index();
?>
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time', 10);
define(RUTA, __DIR__ . DIRECTORY_SEPARATOR);
require_once __DIR__ . '/tareasController.class.php';

$json = file_get_contents('php://input');
$data = json_decode($json);
$filetxt = unserialize(file_get_contents("db.txt"));
$tareasController = new tareasController($filetxt);
$action = $data->action;

if($action == "read") {
	$filetxt = $tareasController->orderTask();
} else if($action == "delete") {
	$taskId = $data->id;
	$filetxt = $tareasController->deleteTask($taskId);
} else if($action == "up") {
	$taskId = $data->id;
	$filetxt = $tareasController->goUpTask($taskId);
} else if($action == "down") {
	$taskId = $data->id;
	$filetxt = $tareasController->goDownTask($taskId);
} else if($action == "create") {
	$taskName = $data->nombre_tarea;
	$filetxt = $tareasController->createTask($taskName);
}
echo json_encode($filetxt);


?>

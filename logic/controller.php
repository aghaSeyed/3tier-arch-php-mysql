<?php
require_once('../DB/DBMS.php');
require_once('../DB/Worker.php');
require_once('../DB/Queue.php');
header('Refresh: 5; URL=../ui/dashboard.php');
session_start();

echo "<h1>Logs Of Logic Layer</h1>";
$db = new dbms();
$db->connect();
$queue = new Queue($db);
$worker = new Worker($queue , $db);

if($_GET["action"]== "insert")
{
	
	$queue->addItem($db->insert("'".$_GET["fname"]."'" , "'".$_GET["lname"]."'" , "'".$_GET["score"]."'"));
	
	$_SESSION["data"] = $db->select();
}

if($_GET["action"]== "select")
{
	
	$_SESSION["data"] = $db->select();
	
}


if($_GET["action"]== "update")
{
	
	$queue->addItem($db->update("'".$_GET["ufname"]."'" , "'".$_GET["ulname"]."'" , "'".$_GET["uscore"]."'" , $_GET["id"]));
	$_SESSION["data"] = $db->select();
}



if($_GET["action"]== "delete")
{
	$queue->addItem($db->delete_row($_GET["did"]));

	$_SESSION["data"] = $db->select();
}
$worker->process();
$db->close();

<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once dirname(__FILE__) . '/./dbconfig.php';
header("Access-Control-Allow-Origin: *");
if (isset($_GET['command'])) {
	if ($_GET['command']=="POLYGON") {
		$notes = $_GET['notes'];
		$geometry = $_GET['geometry'];
		$ci = $_SESSION['usuario'];
		try {
			$dbcon = new PDO("pgsql:host=".$dbconfig['_pgsql_db_host_'].";port=".$dbconfig['_pgsql_db_port_'].";dbname=".$dbconfig['_pgsql_db_name_'].";user=".$dbconfig['_pgsql_db_user_'].";password=".$dbconfig['_pgsql_db_pass_']."");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $dbcon->prepare("INSERT INTO data_polygon(notes, geom, ci) VALUES(UPPER(:notes), ST_GeomFromText(:geometry, 4326), '$ci')");
			$stmt->bindValue(":notes", $notes, PDO::PARAM_STR);
			$stmt->bindValue(":geometry", $geometry, PDO::PARAM_STR);
			if($stmt->execute()){
				$response = array("response"=>"200","message"=>"created");
				header('Content-Type: application/json');
				echo json_encode($response);
				$dbcon = null;
				exit;
			} else {
				$response = array("response"=>"500","message"=>$e->getMessage());
				header('Content-Type: application/json');
				echo json_encode($response);
				$dbcon = null;
				exit;
			}
		} catch (PDOException $e) {
			$response = array("response"=>"500","message"=>$e->getMessage());
			header('Content-Type: application/json');
			echo json_encode($response);
			$dbcon = null;
			exit;
		}
	} else {
		$response = array("response"=>"404","message"=>"Command is not properly set.");
		header('Content-Type: application/json');
		echo json_encode($response);
		$dbcon = null;
		exit;
	}
} else {
	$response = array("response"=>"404","message"=>"Command is not properly set.");
	header('Content-Type: application/json');
	echo json_encode($response);
	$dbcon = null;
	exit;
}
?>
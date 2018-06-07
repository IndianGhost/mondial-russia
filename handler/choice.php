<?php
include_once 'dbConnection.php';
function getChoices($pdo, $order='asc', $key='id', $limit=null)
{
	$query	= $limit ?
				'SELECT * FROM choices ORDER BY '.$key.' '.$order.' LIMIT '.$limit
					:
				'SELECT * FROM choices ORDER BY '.$key.' '.$order;

	$response = $pdo->query($query);
	return $response->fetchAll();
}

function findChoice($pdo, $id=1){
	$query 		= 	'SELECT * FROM choices WHERE id = '.$id;
	$response 	= 	$pdo->query($query);
	return $response->fetchAll(); 
}
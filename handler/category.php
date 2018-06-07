<?php
include_once 'dbConnection.php';
function getCategories($pdo, $order='asc', $key='id', $limit=null)
{
	$query	= $limit ?
				'SELECT * FROM categories ORDER BY '.$key.' '.$order.' LIMIT '.$limit
					:
				'SELECT * FROM categories ORDER BY '.$key.' '.$order;

	$response = $pdo->query($query);
	return $response->fetchAll();
}

function findCategory($pdo, $id=1){
	$query 		= 	'SELECT * FROM categories WHERE id = '.$id;
	$response 	= 	$pdo->query($query);
	return $response->fetchAll(); 
}
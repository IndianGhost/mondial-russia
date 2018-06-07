<?php
include_once 'dbConnection.php';
//tested and it works fine !
function getQuestions($pdo, $order='asc', $key='id', $limit=null)
{
	$query	= $limit ?
				'SELECT * FROM questions ORDER BY '.$key.' '.$order.' LIMIT '.$limit
					:
				'SELECT * FROM questions ORDER BY '.$key.' '.$order;

	$response = $pdo->query($query);
	return $response->fetchAll();
}
//tested and it works fine !
function findQuestion($pdo, $id=1){
	$query 		= 	'SELECT * FROM questions WHERE id = '.$id;
	$response 	= 	$pdo->query($query);
	return $response->fetchAll();
}

$question = findQuestion($db, 3);

echo '<pre>';
var_dump($question);
echo '</pre>';
<?php
require_once 'dbConnection.php';

//tested and it works fine !
function getQuestions($order='asc', $key='id', $limit=null)
{
	global $pdo;
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
	return $response->fetch();
}

function getQuestions($order='asc', $key='id', $limit=null)
{
	global $pdo;
	$result = [];

	$query	= $limit ?
				'SELECT * FROM questions ORDER BY '.$key.' '.$order.' LIMIT '.$limit
					:
				'SELECT * FROM questions ORDER BY '.$key.' '.$order
	;
	$response = $pdo->query($query);

	foreach($response->fetchAll() as  $i => $choiceDatabase){
		$choice = new Choice(
			$choiceDatabase['id'],
			$choiceDatabase['content'],
			$choiceDatabase['isCorrect'],
			$choiceDatabase['question_id']
		);
		$result[$i] = $choice;
	}

	return $result;
}
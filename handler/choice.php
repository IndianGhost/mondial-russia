<?php
require_once 'dbConnection.php';
require_once '../model/Choice.class.php';

/**
 * IMPORTANT NOTE: To get choices on a random way, call getChoices('RAND()', null)
 * The second argument must be null, and the third one is optional
 */

//tested and it works fine !
function getChoices($order='asc', $key='id', $limit=null)
{
	global $pdo;
	$result = [];

	$query	=	'SELECT * FROM choices ORDER BY '.$key.' '.$order;
	$query	.=	$limit? ' LIMIT '.$limit : '';

	var_dump($query);
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

//tested and it works fine !
function findChoice($id=1){
	global $pdo;

	$query 				= 	'SELECT * FROM choices WHERE id = '.$id;
	$response 			= 	$pdo->query($query);
	$choiceDatabase		=	$response->fetch();

	$choice		=	new Choice(
		$choiceDatabase['id'],
		$choiceDatabase['content'],
		$choiceDatabase['isCorrect'],
		$choiceDatabase['question_id']
	);

	return $choice;
}

echo '<pre>';
var_dump(getChoices('RAND()', null));
echo '</pre>';
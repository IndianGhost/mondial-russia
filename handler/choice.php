<?php
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

//tested and it works fine !
function getChoicesJson($order='asc', $key='id', $limit=null){
	$choices	=	getChoices($order, $key, $limit);
	$results	=	[];
	foreach($choices as $i => $choice){
		$result = [
			'id'		=>	$choice->getId(),
			'content'	=>	$choice->getContent(),
			'isCorrect'	=>	$choice->getIsCorrect(),
			'question_id'	=>	$choice->getQuestionId()
		];
		$results[$i] = $result;
	}
	return json_encode($results);
}

//tested and it works fine !
function findChoiceJson($id=1){
	$choice	=	findChoice($id);
	$result		=	[
		'id'		=>	$choice->getId(),
		'content'	=>	$choice->getContent(),
		'isCorrect'	=>	$choice->getIsCorrect(),
		'question_id'	=>	$choice->getQuestionId()
	];
	return json_encode($result);
}
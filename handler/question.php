<?php
//tested and it works fine !
function getQuestions($order='asc', $key='id', $limit=null)
{
	global $pdo;
	$result = [];

	$query	=	'SELECT * FROM questions ORDER BY '.$key.' '.$order;
	$query	.=	$limit? ' LIMIT '.$limit : '';

	$response = $pdo->query($query);
	
	foreach($response->fetchAll() as  $i => $questionDatabase){
		$question = new Question(
			$questionDatabase['id'],
			$questionDatabase['content']
		);
		$result[$i] = $question;
	}

	return $result;
}

//tested and it works fine !
function findQuestion($id=1){
	global $pdo;

	$query 				= 	'SELECT * FROM questions WHERE id = '.$id;
	$response 			= 	$pdo->query($query);
	$questionDatabase		=	$response->fetch();

	$question		=	new Question(
		$questionDatabase['id'],
		$questionDatabase['content']
	);

	return $question;
}

//tested and it works fine !
function getQuestionsJson($order='asc', $key='id', $limit=null){
	$questions	=	getQuestions($order, $key, $limit);
	$results	=	[];
	foreach($questions as $i => $question){
		$result = [
			'id'		=>	$question->getId(),
			'content'	=>	$question->getContent()
		];
		$results[$i] = $result;
	}
	return json_encode($results);
}

//tested and it works fine !
function findQuestionJson($id=1){
	$question	=	findQuestion($id);
	$result		=	[
		'id'		=>	$question->getId(),
		'content'	=>	$question->getContent()
	];
	return json_encode($result);
}
<?php
require_once 'dbConnection.php';
require_once '../model/Question.class.php';
/**
 * IMPORTANT NOTE: To get choices on a random way, call getChoices('RAND()', null)
 * The second argument must be null, and the third one is optional
 */

//Not tested yet !
function getQuestions($order='asc', $key='id', $limit=null)
{
	global $pdo;
	$result = [];

	$query	=	'SELECT * FROM questions ORDER BY '.$key.' '.$order;
	$query	.=	$limit? ' LIMIT '.$limit : '';

	$response = $pdo->query($query);
	if($response)
	{
		foreach($response->fetchAll() as  $i => $questionDatabase){
			$question = new Question(
				$questionDatabase['id'],
				$questionDatabase['content']
			);
			$result[$i] = $question;
		}
		return $result;
	}
	return false;
}

//Not tested yet !
function findQuestion($id=1){
	global $pdo;

	$query 				= 	'SELECT * FROM questions WHERE id = '.$id;
	$response 			= 	$pdo->query($query);

	if($response)
	{
		$questionDatabase	=	$response->fetch();
		$question			=	new Question(
			$questionDatabase['id'],
			$questionDatabase['content']
		);
		return $question;
	}
	return false;
}

//tested and it works fine !
function questionWhere($column, $operator, $value, $order='asc', $key='id', $limit=null)
{
	global $pdo;
	$result = [];

	$query	=	'SELECT * FROM questions WHERE '.$column.' '.$operator.' '.$value.' ORDER BY '.$key.' '.$order;
	$query	.=	$limit? ' LIMIT '.$limit : '';

	$response	=	$pdo->query($query);
	if($response)
	{
		foreach($response->fetchAll() as  $i => $questionDatabase){
			$question = new Question(
				$questionDatabase['id'],
				$questionDatabase['content']
			);
			$result[$i] = $question;
		}
		return $result;
	}
	return false;
}

//tested and it works fine !
function getQuestionsJson($order='asc', $key='id', $limit=null){
	$questions	=	getQuestions($order, $key, $limit);
	if($questions)
	{
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
	return false;
}

//Not tested yet !
function findQuestionJson($id=1){
	$question	=	findQuestion($id);
	$result		=	[
		'id'		=>	$question->getId(),
		'content'	=>	$question->getContent()
	];
	return json_encode($result);
}

//Doing : Not done yet !
function getQuestionsWithChoices()
{
	$results	=	[];
	$questions	=	getQuestions();
	foreach($questions as $question)
	{
		$question_id	=	$question->getId();
	}
}

echo '<pre>';
var_dump( questionWhere('id', '=', 1) );
echo '</pre>';
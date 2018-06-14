<?php
require_once 'dbConnection.php';
require_once '../model/Question.class.php';
require_once 'choice.php';

/**
 * IMPORTANT NOTE: To get choices on a random way, call getChoices('RAND()', null)
 * The second argument must be null, and the third one is optional
 */

//tested and it works fine !
function getQuestions($order='asc', $key='id', $limit=null)
{
    global $pdo;
    $result = [];

    $query		=	'SELECT * FROM questions ORDER BY '.$key.' '.$order;
    $query		.=	$limit? ' LIMIT '.$limit : '';
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
function getQuestionsJson($order='asc', $key='id', $limit=null)
{
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

//To avoid typing mistakes ;)
function getQuestion($order='asc', $key='id', $limit=null)
{
    return getQuestions($order, $key, $limit);
}

//To avoid typing mistakes ;)
function getQuestionJson($order='asc', $key='id', $limit=null)
{
    return getQuestionsJson($order, $key, $limit);
}

//tested and it works fine !
function findQuestion($id=1){
    global $pdo;

    $query 				= 	'SELECT * FROM questions WHERE id = '.$id;
    $response 			= 	$pdo->query($query);
    if($response)
    {
        return $response->fetch();
    }
    return false;
}

//tested and it works fine !
function findQuestionJson($id=1)
{
    $question   =   findQuestion($id);
    if($question)
    {
        $data       =   [
            'id'        =>  $question['id'],
            'content'   =>  $question['content']
        ];
        return json_encode( $data );
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

//Coming Soon :'D
function questionWhereJson($column, $operator, $value, $order='asc', $key='id', $limit=null)
{
    $questions  =   questionWhere($column, $operator, $value, $order, $key, $limit);
    if($questions)
    {
        $results = [];
        foreach($questions as $i => $question)
        {
            $result     =   [
                'id'        =>  $question->getId(),
                'content'   =>  $question->getContent()
            ];
            $results[$i] =  $result;
        }
        return json_encode($results);
    }
    return false;
}

//tested and it works fine !
function getQuestionsWithChoices($order='asc', $key='id', $limit=null)
{
    $questions	=	getQuestions($order, $key, $limit);
    if($questions)
    {
        foreach($questions as $question)
        {
            $question_id	=	$question->getId();
            $choices        =   choiceWhere('question_id', '=', $question_id, 'RAND()', '');
            $question->setChoices($choices);
        }
        return $questions;
    }
    return false;
}

//tested and it works fine !
function getQuestionsWithChoicesJson($order='asc', $key='id', $limit=null)
{
    $questionChoices = getQuestionsWithChoices($order, $key, $limit);
    if($questionChoices)
    {
        $results = [];
        foreach($questionChoices as $i => $question)
        {
            $choices = [];
            foreach ($question->getChoices() as $j => $choice)
            {
                $result_choice  =   [
                    'id'            =>  $choice->getId(),
                    'content'       =>  $choice->getContent(),
                    'isCorrect'     =>  $choice->getIsCorrect(),
                    'question_id'   =>  $choice->getQuestionId()
                ];
                $choices[$j]    =   $result_choice;
            }
            $result  =   [
                'id'        =>  $question->getId(),
                'content'   =>  $question->getContent(),
                'choices'   =>  $choices
            ];
            $results[$i] = $result;
        }
        return json_encode($results);
    }
    return false;
}
#==============================
#   Output : Test
#   Just uncomment the code below
#   AND change the function called,
#   enjoy !
#==============================
/*
 * Test for JSON methods
 */
header('Content-Type: application/json; charset=urf-8');
$data = questionWhereJson('id', '<=', '4', 'desc', 'id', 4);
if($data)
    echo $data;
else
    echo 'failed to reach data';

/*
 * Test for other
 */
//header('Content-Type: text/html; charset=utf-8');
//echo '<pre>';
//getQuestionsWithChoicesJson();
//echo '</pre>';

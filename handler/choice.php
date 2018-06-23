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

    $query      =   'SELECT * FROM choices ORDER BY '.$key.' '.$order;
    $query      .=	$limit? ' LIMIT '.$limit : '';
    $response   =   $pdo->query($query);
    if($response)
    {
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
    return false;
}

//tested and it works fine !
function getChoicesJson($order='asc', $key='id', $limit=null)
{
    $choices	=	getChoices($order, $key, $limit);
    if($choices)
    {
        $results	=	[];
        foreach($choices as $i => $choice){
            $result = [
                'id'			=>	$choice->getId(),
                'content'		=>	$choice->getContent(),
                'isCorrect'		=>	$choice->getIsCorrect(),
                'question_id'	=>	$choice->getQuestionId()
            ];
            $results[$i] = $result;
        }
        return json_encode($results);
    }
    return false;
}

//To avoid typing mistakes
function getChoice($order='asc', $key='id', $limit=null)
{
    return getChoices($order, $key, $limit);
}

//To avoid typing mistakes
function getChoiceJson($order='asc', $key='id', $limit=null)
{
    return getChoicesJson($order, $key, $limit);
}

//tested and it works fine !
function findChoice($id=1)
{
    global $pdo;

    $query 				= 	'SELECT * FROM choices WHERE id = '.$id;
    $response 			= 	$pdo->query($query);
    if($response)
    {
        $choiceDatabase		=	$response->fetch();
        $choice		=	new Choice(
            $choiceDatabase['id'],
            $choiceDatabase['content'],
            $choiceDatabase['isCorrect'],
            $choiceDatabase['question_id']
        );
        return $choice;
    }
    return false;
}

//tested and it works fine !
function findChoiceJson($id=1)
{
    $choice	=	findChoice($id);
    $result		=	[
        'id'			=>	$choice->getId(),
        'content'		=>	$choice->getContent(),
        'isCorrect'		=>	$choice->getIsCorrect(),
        'question_id'	=>	$choice->getQuestionId()
    ];
    return json_encode($result);
}

//tested and it works fine !
function choiceWhere($column, $operator, $value, $order='asc', $key='id', $limit=null)
{
    global $pdo;
    $result = [];

    $query	=	'SELECT * FROM choices WHERE '.$column.' '.$operator.' '.$value.' ORDER BY '.$key.' '.$order;
    $query	.=	$limit? ' LIMIT '.$limit : '';

    $response	=	$pdo->query($query);

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
function choiceWhereJson($column, $operator, $value, $order='asc', $key='id', $limit=null)
{
    $choices = choiceWhere($column, $operator, $value, $order, $key, $limit);
    $results	=	[];
    foreach($choices as $i => $choice){
        $result = [
            'id'			=>	$choice->getId(),
            'content'		=>	$choice->getContent(),
            'isCorrect'		=>	$choice->getIsCorrect(),
            'question_id'	=>	$choice->getQuestionId()
        ];
        $results[$i] = $result;
    }
    return json_encode($results);
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
//header('Content-Type: application/json; charset=urf-8');
//$data = getChoiceJson('desc', 'id', 2);
//if($data)
//    echo $data;
//else
//    echo 'failed to reach data';

/*
 * Test for other
 */
//header('Content-Type: text/html; charset=utf-8');
//echo '<pre>';
//var_dump( choiceWhere('id', '<', '5', 'asc', 'id', 1) );
//echo '</pre>';

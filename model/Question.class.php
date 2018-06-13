<?php
require_once 'Choice.class.php';

class Question
{
	private $id;
	private $content;
    private $choices;

	public function __construct($id=null, $content='')
	{
		$this->id		=	$id;
		$this->content	=	$content;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id)
	{
		$this->id	=	$id;
	}

	public function getContent(){
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getChoices()
    {
        return $this->choices;
    }

    public function setChoices($choices)
    {
        $this->choices = $choices;
    }
}
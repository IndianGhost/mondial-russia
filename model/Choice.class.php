<?php

class Choice{
	private $id;
	private $content;
	private $isCorrect;
	private $question_id;

	public function __construct($id=null, $content="", $isCorrect=0, $question_id=null)
	{
		$this->id			=	$id;
		$this->content		=	$content;
		$this->isCorrect	=	$isCorrect;
		$this->question_id	=	$question_id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getIsCorrect()
	{
		return $this->isCorrect;
	}

	public function setIsCorrect($isCorrect)
	{
		$this->isCorrect = $isCorrect;
	}

	public function getQuestionId()
	{
		return $this->question_id;
	}

	public function setQuestionId($question_id)
	{
		$this->question_id = $question_id;
	}
}
<?php

class Choice{
	private $id;
	private $content;
	private $isCorrect;
	private $question_id;

	public function __construct(){}

	public function getId()
	{
		return $this->id;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function getQuestionId(){
		return $this->question_id;
	}
}
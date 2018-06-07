<?php

class Question
{
	private $id;
	private $content;
	private $category_id;

	public function __construct(){}

	public function getId(){
		return $this->id;
	}

	public function getContent(){
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getCategoryId()
	{
		return $this->category_id;
	}
}
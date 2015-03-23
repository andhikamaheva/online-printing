<?php 
include_once 'index2.php';


class routes {

	private $title;
	private $templates;
	private $content;
	function __construsct($title, $templates, $content){
		$this-> title = $title;
		$this-> template = $template;
		$this-> content = $content;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function setTemplates($templates){
		$this->templates = $templates;
	}

	public function setTemplates($content){
		$this->content = $content;
	}

}
?>
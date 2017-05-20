<?php
class Page {
	private $title, $stylesheets=array(), $javascripts=array(), $body;
	
	function Page() {
		//$this->addCSS('css/main.css');
	}
	
	function setTitle($title) {
		$this->title = $title;
	}
	
	function addCSS($path) {
		$this->stylesheets[] = $path;
	}
	
	function addJavascript($path) {
		$this->javascripts[] = $path;
	}
	
	function startBody() {
		ob_start();
	}
	
	function endBody() {
		$this->body = ob_get_clean();
	}
	
	function render($path) {
		ob_start();
		include($path);
		return ob_get_clean();
	}
}
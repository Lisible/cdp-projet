<?php

abstract class Controller {
	private $viewData = array();

	function __construct(){
		$this->setup();
		if(!empty($_POST))
			$this->callOnPost();
		else
			$this->callOnGet();

	}

	function setData($key, $value) {
		$this->viewData[$key] = $value;
	}

	function getData() {
		return $this->viewData;
	}

	function render($viewName) {
		$DATA = $this->viewData;

		include_once('template/header.php');
		include_once('view/' . $viewName . ".php");
		include_once('template/footer.php');
	}

	private function callOnPost() {
		$this->onPost($_POST);
	}

	private function callOnGet() {
		$this->onGet($_GET);
	}

	public function setup(){}
	public function onPost($postData){}
	public function onGet($getData){}
}

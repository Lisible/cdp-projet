<?php
include_once('framework/controller.php');

new class extends Controller
{
	public function setup() {
		$this->setData('title', 'Index');
	}

	public function onGet($getData) {
		$this->render('index_view');
	}

	public function onPost($postData) {
		$this->render('index_view');
	}
};

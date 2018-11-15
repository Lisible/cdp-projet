<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

	public function setup() {
		$this->setData('title', 'Inscription');
	}

	public function onGet($getData) {
		$this->render('registration_view');
	}

	public function onPost($postData) {
        $this->render('registration_view');
        
	}
};
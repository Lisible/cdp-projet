<?php
include_once('framework/controller.php');

new class extends Controller {
	public function setup() {
		$this->setData('title', 'Déconnexion');
	}

	public function onGet($getData) {
		session_destroy();

		$this->redirect('index');
	}
};
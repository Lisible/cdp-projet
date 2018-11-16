<?php
include_once('framework/controller.php');

new class extends Controller {
	public function setup() {
		$this->setData('title', 'Déconnexion');
	}

	public function onGet($getData) {
        unset($_SESSION['connected']);
        unset($_SESSION['userId']);

		$this->redirect('index');
	}
};
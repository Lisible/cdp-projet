<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller
{
	public function setup() {
		$this->setData('title', 'Index');

		if(isset($_SESSION['error_message'])) {
			$this->setData('errorMessage', $_SESSION['error_message']);
			unset($_SESSION['error_message']);
		}

		if(isset($_SESSION['message'])) {
			$this->setData('message', $_SESSION['message']);
			unset($_SESSION['message']);
		}
	}

	public function onGet($getData) {
		$this->render('index_view');
	}

	public function onPost($postData) {
		if(DAO::connectUser($postData['username'], $postData['password']))
		{
			$this->redirect('project_list');
		}
		
		$this->setData('errorMessage', 'La connexion a échouée');
		$this->render('index_view');
	}
};

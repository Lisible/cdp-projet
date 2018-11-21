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
		$created = DAO::createUser($postData['username'], 
					 $postData['password'], 
					 $postData['firstname'], 
					 $postData['lastname'], 
					 $postData['email']);
		
		if($created == true) {
			$_SESSION['message'] = 'Compte créé avec succès';
		}
		else {
			$_SESSION['error_message'] = 'Erreur lors de la création du compte';
		}

		$this->redirect('index');
	}
};
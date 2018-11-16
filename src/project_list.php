<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

	private $userId;

	public function setup() {
        $this->connectedCheck();
		$userId = $_SESSION['userId'];

		$this->setData('title', 'Liste des projets');
	}

	public function onGet($getData) {
		$this->setData('projects', DAO::getProjects());
		$this->render('project_list_view');
	}

	public function onPost($postData) {
		$this->render('project_list_view');
	}
};

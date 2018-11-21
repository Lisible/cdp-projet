<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

	private $userId;

	public function setup() {
        $this->connectedCheck();
		$this->userId = $_SESSION['userId'];

		$this->setData('title', 'Liste des projets');
	}

	public function onGet($getData) {
		$this->setData('projects', DAO::getProjectsByOwnerId($this->userId));
		$this->render('project_list_view');
	}

	public function onPost($postData) {
		$this->render('project_list_view');
	}
};

<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

	public function setup() {
        $this->connectedCheck();
		$this->userId = $_SESSION['userId'];

		$this->setData('title', 'Tâches du sprint');
	}

	public function onGet($getData) {
		$this->setData('project_id', $getData['project_id']);
		$this->setData('sprint_id', $getData['sprint_id']);
		$this->setData('todoTasks', DAO::getTasksFromSprint($getData['project_id'], $getData['sprint_id'], 'todo'));
		$this->setData('ongoingTasks', DAO::getTasksFromSprint($getData['project_id'], $getData['sprint_id'], 'ongoing'));
		$this->setData('doneTasks', DAO::getTasksFromSprint($getData['project_id'], $getData['sprint_id'], 'done'));

		$this->render('tasks_sprint_view');
	}

	public function onPost($postData) {
		$this->render('tasks_sprint_view');
	}
};

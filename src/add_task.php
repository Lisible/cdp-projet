<?php
include_once('framework/controller.php');
include_once('model/dao.php');
include_once('model/task.php');

new class extends Controller {

	public function setup() {
        $this->connectedCheck();
		$this->userId = $_SESSION['userId'];

		$this->setData('title', 'Ajout d\'une tâche');
	}

	public function onGet($getData) {
		$this->setData('project_id', $getData['project_id']);
		$this->setData('sprint_id', $getData['sprint_id']);

		$this->render('add_task_view');
	}

	public function onPost($postData) {
		$task = new Task();
		$task->setTitle($postData['task-title']);
		$task->setDescription($postData['task-description']);
		$task->setWorkload($postData['task-workload']);
		$task->setIssue($postData['task-issue']);




		DAO::addTaskToSprint($task, $postData['project_id'], $postData['sprint_id']);


		$this->setData('project_id', $postData['project_id']);
		$this->setData('sprint_id', $postData['sprint_id']);
		$this->render('add_task_view');
	}
};

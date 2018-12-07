<?php
include_once('framework/controller.php');
include_once('model/dao.php');

class TaskSprintController extends Controller {

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
                $task_id = $postData['task_id'];
                $new_state = $postData['new_state'];
                DAO::setNewState($task_id, $new_state);
                $task = DAO::getTaskById($task_id);
                if($task == null){
                  $this->render("not found");
                  return 1;
                }
                $sprint_id = $task->getSprintId();
                $project_id = $task->getProjectId();
		$this->setData('project_id', $project_id);
		$this->setData('sprint_id', $sprint_id);
		$this->setData('todoTasks', DAO::getTasksFromSprint($project_id, $sprint_id, 'todo'));
		$this->setData('ongoingTasks', DAO::getTasksFromSprint($project_id, $sprint_id, 'ongoing'));
		$this->setData('doneTasks', DAO::getTasksFromSprint($project_id, $sprint_id, 'done'));

               header("Location: tasks_sprint.php?project_id=$project_id&sprint_id=$sprint_id");
	}
}

$tasksSprintController = new TaskSprintController();
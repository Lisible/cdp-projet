<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

    public function setup() {
        $this->connectedCheck();

        $this->setData('title', 'Liste des sprints');
    }

    public function onGet($getData){
        $this->setData('project_id', $getData['project_id']);
        $this->setData('sprints', DAO::getSprintsByProjectId($getData['project_id']));
        $this->render('list_sprints_of_project_view');
    }

    public function onPost($postData){
        $projectId = $postData['project_id'];
        DAO::addSprintToProject($projectId);

        header("Location: list_sprints_of_project.php?project_id=$projectId");
    }
};

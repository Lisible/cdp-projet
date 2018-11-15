<?php
include_once('framework/controller.php');
include_once('model/dao.php');
include_once('model/project.php');

new class extends Controller {

    public function setup() {
        $this->setData('title', 'Ajouter un projet');
    }

    public function onGet($getData) {
        $this->render('add_project_view');
    }

    public function onPost($postData) {
        $project = new Project();
        $project->setName($postData['nom']);
        $project->setDescription($postData['description']);
        $project->setSprintDuration($postData['duree']);
        $project->setBeginDate(date("Y-m-d", strtotime($postData['date'])));
        DAO::createProject($project);

        header('Location: project_list.php');
    }
};
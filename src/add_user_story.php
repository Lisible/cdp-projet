<?php
include_once('framework/controller.php');
include_once('model/dao.php');
include_once('model/user_story.php');

new class extends Controller {

    public function setup() {
        $this->connectedCheck();

        $this->setData('title', "Création d'une user story");
    }

    public function onGet($getData) {
       $this->setData('project_id', $getData['project_id']);
       $this->render('add_user_story_view');
    }

    public function onPost($postData) {
        $us = new UserStory();
        $us->setDifficulty($postData['difficulty']);
        $us->setDescription($postData['description']);
        $us->setNumber($postData['number']);
        $us->setProjectId($postData['project_id']);
        $us->setPriority($postData['priority']);
        DAO::createUserStory($us);

        header("Location: list_backlog.php?project_id=".$postData['project_id']);
    }
};

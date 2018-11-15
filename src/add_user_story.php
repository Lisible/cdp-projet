<?php
include_once('framework/controller.php');
include_once('model/dao.php');
include_once('model/project.php');

new class extends Controller {

    public function setup() {
        $this->setData('title', "Création d'une user story");
    }

    public function onGet($getData) {
        $this->render('add_user_story_view');
    }

    public function onPost($postData) {
        $us = new UserStory();
        $us->setDifficulty($postData['nom']);
        $us->setDescription($postData['description']);
        $us->setId($postData['id']);
        $us->setProjectId();
        $us->setPriority($postData['priorite']);
        DAO::createUserStory($us);

        $this->render('list_backlog');
    }
};
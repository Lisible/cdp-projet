<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

    public function setup() {
        $this->connectedCheck();

        $this->setData('title', 'Liste des membres');
    }

    public function onGet($getData){
        $this->setData('project_id', $getData['project_id']);
        $this->setData('membres', DAO::getMembersByProjectId($getData['project_id']));
        $this->render('list_members_of_project_view');
    }

    public function onPost($postData){
        $this->render('list_members_of_project_view');
    }
};

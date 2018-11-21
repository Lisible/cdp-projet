<?php
include_once('framework/controller.php');
include_once('model/dao.php');
include_once('model/project.php');
include_once ('model/user.php');

new class extends Controller {

    private $userId = 0;

    public function setup() {
        $this->connectedCheck();

        $this->userId = $_SESSION['userId'];
        $this->setData('title', 'Ajouter un nouveau membre');
    }

    public function onGet($getData) {
        $_SESSION['project_id'] = $getData["project_id"];
        if(!DAO::existProject($_SESSION['project_id'])) {
            $this->render('not_found');
        } else {
            $this->render('add_user_to_project_view');
        }
    }

    public function onPost($postData) {
        $membre_username = $postData["username"];
        $project_id = $_SESSION['project_id'];
        if(!DAO::existUser($membre_username)) {
            $this->redirect("not_found");
        } else {
            $membre = DAO::getUserByUserName($membre_username);
            $membreId = $membre->getId();
            DAO::addUserToProject($membreId, $project_id);
            header("Location: project_details.php?project_id=$project_id");
            unset($_SESSION['project_id']);
        }
    }
};


<?php
include_once('framework/controller.php');
include_once('model/dao.php');
include_once('model/user_story.php');

new class extends Controller {

    public function setup() {
        $this->connectedCheck();
    }

    
    public function onGet($getData) {
       DAO::deleteUserStory($getData['user_story_id']);
       header("Location: list_backlog.php?project_id=".$getData['project_id']);

    }

    public function onPost($postData) {}
};

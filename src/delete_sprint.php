<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {
    public function setup() {
       $this->connectedCheck();
    }                
      
    public function onGet($getData) {
      DAO::deleteSprint($getData['sprint_id'], $getData['project_id']);
      header("Location: list_sprints_of_project.php?project_id=".$getData['project_id']);
    }
   
   public function onPost($postData) {}
};

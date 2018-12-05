<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {
  public function setup() {
    $this->connectedCheck();
  }

  public function onGet($getData) {
    DAO::deleteTask($getData['task_id']);
    header("Location: tasks_sprint.php?project_id=".$getData['project_id']."&sprint_id=".$getData['sprint_id']);
  }                                          
   
  public function onPost($postData) {}
 
 };
 ?>

<?php 
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

  public function setup() {
    $this->connectedCheck();
    $this->setData('title', 'Détails de la tâche:');
  }

  public function onGet($getData) {
    $task = DAO::getTaskById($getData['task_id']);               
    if($task == null) {                                                    
      $this->render('not_found');
      return 1;
    }
    $this->setData('task', $task);
    $this->render('task_details_view');
  }
  
  public function onPost($postData) {
    $this->render('task_details_view');
  }
};
?>

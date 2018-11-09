<?php
  include_once('framework/controller.php');
  include_once('model/dao.php');

  new class extends Controller {

    public function setup() {
      $this->setData('title', 'Liste des US');
    }

    public function onGet(){
      $this->setData('backlog', DAO::getUserStories($_GET['project_id']));
      $this->render('list_backlog_view');
    }

    public function onPost($postData){
      $this->render('list_backlog_view');
    }
};
?>

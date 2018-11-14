<?php
  include_once('framework/controller.php');
  include_once('model/dao.php');

  new class extends Controller {

    public function setup() {
      $this->setData('title', 'Liste des US');
    }

    public function onGet($getData){
      $this->setData('backlog', DAO::getUserStories($getData['project_id']));
      $this->render('list_backlog_view');
    }

    public function onPost($postData){
      $this->render('list_backlog_view');
    }
};
?>
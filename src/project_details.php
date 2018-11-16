<?php
include_once('framework/controller.php');
include_once('model/dao.php');

new class extends Controller {

    public function setup() {
        $this->connectedCheck();

        $this->setData('title', 'Les détails de ce projet :');
    }

    public function onGet($getData) {
        $project = DAO::getProjectById($getData['project_id']);
        if($project == null) {
            $this->render('not_found');
            return 1;
        }

        $this->setData('project', $project);
        $this->render('project_details_view');
    }

    public function onPost($postData) {
        $this->render('project_details_view');
    }
};

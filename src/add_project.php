<?php
include_once('framework/controller.php');

new class extends Controller {

    public function setup() {
        $this->setData('title', 'Ajouter un projet');
    }

    public function onGet($getData) {
        $this->render('add_project_view');
    }

    public function onPost($postData) {
        $this->render('add_project_view');
    }
};
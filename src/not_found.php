<?php
include_once('framework/controller.php');
include_once('model/dao.php');
include_once('model/user_story.php');

new class extends Controller {

    public function setup() {
        $this->setData('title', "Page non trouvée");
    }

    public function onGet($getData) {
        $this->render('not_found_view');
    }

    public function onPost($postData) {
        $this->render('not_found_view');
    }
};

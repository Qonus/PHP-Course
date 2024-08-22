<?php

class AboutController extends Controller {
    public function index() {
        $this->view->render('about/index', [
            'title' => 'About'
        ]);
    }
}

?>
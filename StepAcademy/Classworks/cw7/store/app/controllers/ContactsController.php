<?php

class ContactsController extends Controller {
    public function index() {
        $this->view->render('contacts/index', [
            'title' => 'Contacts'
        ]);
    }
}

?>
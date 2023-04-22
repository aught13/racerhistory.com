<?php

class Controller_Person extends Controller_Template {

    public function action_index() {
        $data['people'] = Model_Person::find('all');
        $this->template->title = "People";
        $this->template->content = View::forge('person/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('person');

        if (!$data['person'] = Model_Person::find($id)) {
            Session::set_flash('error', 'Could not find person #' . $id);
            Response::redirect('person');
        }

        $this->template->title = "Person";
        $this->template->content = View::forge('person/view', $data);
    }

}

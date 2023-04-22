<?php

class Controller_Sport extends Controller_Template {

    public function action_index() {
        $data['sports'] = Model_Sport::find('all');
        $this->template->title = "Sports";
        $this->template->content = View::forge('sport/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('sport');

        if (!$data['sport'] = Model_Sport::find($id)) {
            Session::set_flash('error', 'Could not find sport #' . $id);
            Response::redirect('sport');
        }

        $this->template->title = "Sport";
        $this->template->content = View::forge('sport/view', $data);
    }

}

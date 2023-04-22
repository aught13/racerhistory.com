<?php

class Controller_Team extends Controller_Template {

    public function action_index() {
        $data['teams'] = Model_Team::find('all');
        $this->template->title = "Teams";
        $this->template->content = View::forge('team/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('team');

        if (!$data['team'] = Model_Team::find($id)) {
            Session::set_flash('error', 'Could not find team #' . $id);
            Response::redirect('team');
        }

        $this->template->title = "Team";
        $this->template->content = View::forge('team/view', $data);
    }

}

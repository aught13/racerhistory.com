<?php

class Controller_Season extends Controller_Template {

    public function action_index() {
        $data['seasons'] = Model_Season::find('all');
        $this->template->title = "Seasons";
        $this->template->content = View::forge('season/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('season');

        if (!$data['season'] = Model_Season::find($id)) {
            Session::set_flash('error', 'Could not find season #' . $id);
            Response::redirect('season');
        }

        $this->template->title = "Season";
        $this->template->content = View::forge('season/view', $data);
    }

}

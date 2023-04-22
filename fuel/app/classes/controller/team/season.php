<?php

class Controller_Team_Season extends Controller_Template {

    public function action_index() {
        $data['team_seasons'] = Model_Team_Season::find('all');
        $this->template->title = "Team_seasons";
        $this->template->content = View::forge('team/season/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('team/season');

        if (!$data['team_season'] = Model_Team_Season::find($id)) {
            Session::set_flash('error', 'Could not find team_season #' . $id);
            Response::redirect('team/season');
        }

        $this->template->title = "Team_season";
        $this->template->content = View::forge('team/season/view', $data);
    }

}

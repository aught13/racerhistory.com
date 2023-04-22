<?php

class Controller_Team_Season_Roster extends Controller_Template {

    public function action_index() {
        $data['team_season_rosters'] = Model_Team_Season_Roster::find('all');
        $this->template->title = "Team_season_rosters";
        $this->template->content = View::forge('team/season/roster/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('team/season/roster');

        if (!$data['team_season_roster'] = Model_Team_Season_Roster::find($id)) {
            Session::set_flash('error', 'Could not find team_season_roster #' . $id);
            Response::redirect('team/season/roster');
        }

        $this->template->title = "Team_season_roster";
        $this->template->content = View::forge('team/season/roster/view', $data);
    }

}

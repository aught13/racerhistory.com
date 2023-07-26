<?php

class Controller_Admin_Team_Season_Roster extends Controller_Admin {

    public function action_index() {
        $query = Model_Team_Season_Roster::query();

        $pagination = Pagination::forge('team_season_rosters_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['team_season_rosters'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Team Rosters";
        $this->template->content = View::forge('admin/team/season/roster/index', $data);
    }

    public function action_view($id = null) {
        $data['team_season_roster'] = Model_Team_Season_Roster::find($id);

        $this->template->title = "Team Roster";
        $this->template->content = View::forge('admin/team/season/roster/view', $data);
    }

    public function action_create($team_season = null) {
        isset($team_season) ? $season = $team_season : $season = null;
        if (Input::method() == 'POST') {
            $val = Model_Team_Season_Roster::validate('create');

            if ($val->run()) {
                $team_season_roster = Model_Team_Season_Roster::forge([
                    'team_season_id' => Input::post('team_season_id'),
                    'person_id' => Input::post('person_id'),
                    'roster_year' => Input::post('roster_year'),
                    'roster_number' => Input::post('roster_number') !== '' ? (int)Input::post('roster_number') : NULL,
                    'roster_position' => Input::post('roster_position'),
                    'roster_height' => Input::post('roster_height'),
                    'roster_weight' => Input::post('roster_weight'),
                ]);

                if ($team_season_roster and $team_season_roster->save()) {
                    Session::set_flash('success', e('Added team_season_roster #' . $team_season_roster->id . '.'));

                    Response::redirect('admin/team/season/'.(isset($season) ? '/view/'.$season : ''));
                } else {
                    Session::set_flash('error', e('Could not save team_season_roster.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        
        $data = $this->set_ops($season);

        $this->template->title = "Team Rosters";
        $this->template->content = View::forge('admin/team/season/roster/create', $data, false);
    }

    public function action_edit($id = null) {
        $team_season_roster = Model_Team_Season_Roster::find($id);
        $val = Model_Team_Season_Roster::validate('edit');

        if ($val->run()) {
            $team_season_roster->team_season_id = Input::post('team_season_id');
            $team_season_roster->person_id = Input::post('person_id');
            $team_season_roster->roster_year = Input::post('roster_year');
            $team_season_roster->roster_number = Input::post('roster_number');
            $team_season_roster->roster_position = Input::post('roster_position');
            $team_season_roster->roster_height = Input::post('roster_height');
            $team_season_roster->roster_weight = Input::post('roster_weight');

            if ($team_season_roster->save()) {
                Session::set_flash('success', e('Updated team_season_roster #' . $id));

                Response::redirect('admin/team/season/view/'.$team_season_roster->team_season_id);
            } else {
                Session::set_flash('error', e('Could not update team_season_roster #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $team_season_roster->team_season_id = $val->validated('team_season_id');
                $team_season_roster->person_id = $val->validated('person_id');
                $team_season_roster->roster_year = $val->validated('roster_year');
                $team_season_roster->roster_number = $val->validated('roster_number');
                $team_season_roster->roster_position = $val->validated('roster_position');
                $team_season_roster->roster_height = $val->validated('roster_height');
                $team_season_roster->roster_weight = $val->validated('roster_weight');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('team_season_roster', $team_season_roster, false);
        }
        
        $data = $this->set_ops();

        $this->template->title = "Team Rosters";
        $this->template->content = View::forge('admin/team/season/roster/edit', $data, false);
    }

    public function action_delete($id = null) {
        if ($team_season_roster = Model_Team_Season_Roster::find($id)) {
            $team_season_roster->delete();

            Session::set_flash('success', e('Deleted team_season_roster #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete team_season_roster #' . $id));
        }

        Response::redirect('admin/team/season/roster');
    }
    
    private static function set_ops($season = null) {
        if (isset($season)) {
            $tmseason = Model_Team_Season::find($season);
            $teams[$tmseason->id] = $tmseason->teams->team_name.' - '.($tmseason->semester == 1 ? $tmseason->seasons->start : ($tmseason->semester == 2 ? $tmseason->seasons->start.'-'.$tmseason->seasons->end : $tmseason->seasons->end));            
        } else {
            $tmseason = Model_Team_Season::find('all');
            $teams[] = '';
            foreach ($tmseason as $result) {
                $teams[$result->id] = $result->teams->team_name.' - '.($result->semester == 1 ? $result->seasons->start : ($result->semester == 2 ? $result->seasons->start.'-'.$result->seasons->end : $result->seasons->end));            
            }
        }
        $person = Model_Person::find('all');
        $persons[] = '';
        foreach ($person as $value) {
            $persons[$value->id] = $value->last.', '.$value->first;
        }
        asort($persons);
        $data['teams'] = $teams;
        $data['persons'] = $persons;
        
        return $data;
    }

}

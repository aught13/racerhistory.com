<?php

class Controller_Admin_Team extends Controller_Admin {

    public function action_index() {
        $query = Model_Team::query();

        $pagination = Pagination::forge('teams_pagination', array(
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ));

        $data['teams'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Teams";
        $this->template->content = View::forge('admin/team/index', $data);
    }

    public function action_view($id = null) {
        $data['team'] = Model_Team::find($id);

        $this->template->title = "Team";
        $this->template->content = View::forge('admin/team/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Team::validate('create');

            if ($val->run()) {
                $team = Model_Team::forge(array(
                            'sport_id' => Fuel\Core\Input::post('sport_id'),
                            'team_name' => Input::post('team_name'),
                            'team_description' => Input::post('team_description'),
                            'abbr' => Input::post('abbr'),
                            'gender' => Input::post('gender'),
                ));

                if ($team and $team->save()) {
                    Session::set_flash('success', e('Added team #' . $team->id . '.'));

                    Response::redirect('admin/team');
                } else {
                    Session::set_flash('error', e('Could not save team.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        
        $sports = Model_Sport::find('all');
        $data['sports'] = [0=>''];        
        foreach ($sports as $value) {
            $data['sports'][$value->id] = $value->sport_name;
        }

        $this->template->title = "Teams";
        $this->template->content = View::forge('admin/team/create', $data, false);
    }

    public function action_edit($id = null) {
        $team = Model_Team::find($id);
        $val = Model_Team::validate('edit');

        if ($val->run()) {
            $team->sport_id = Input::post('sport_id');
            $team->team_name = Input::post('team_name');
            $team->team_description = Input::post('team_description');
            $team->abbr = Input::post('abbr');
            $team->gender = Input::post('gender');

            if ($team->save()) {
                Session::set_flash('success', e('Updated team #' . $id));

                Response::redirect('admin/team');
            } else {
                Session::set_flash('error', e('Could not update team #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $team->sport_id = $val->validated('sport_id');
                $team->team_name = $val->validated('team_name');
                $team->team_description = $val->validated('team_description');
                $team->abbr = $val->validated('abbr');
                $team->gender = $val->validated('gender');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('team', $team, false);
        }
        
        $sports = Model_Sport::find('all');
        $data['sports'] = [0=>''];        
        foreach ($sports as $value) {
            $data['sports'][$value->id] = $value->sport_name;
        }

        $this->template->title = "Teams";
        $this->template->content = View::forge('admin/team/edit', $data, false);
    }

    public function action_delete($id = null) {
        if ($team = Model_Team::find($id)) {
            $team->delete();

            Session::set_flash('success', e('Deleted team #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete team #' . $id));
        }

        Response::redirect('admin/team');
    }

}

<?php

class Controller_Admin_Team_Season extends Controller_Admin {

    public function action_index() {        
        $query = Model_Team_Season::query()
                ->related('seasons')
                ->order_by('seasons.start', 'desc');

        $seasons = $query->get();

        $data['team_seasons'] = $seasons;

        $this->template->set_global(
            'records', Model_Game::getRecords('team', 'index', $seasons)
        );

        $this->template->title   = "Team Seasons";
        $this->template->content = View::forge('admin/team/season/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('admin/team/season');

        if (!$data = Model_Team_Season::find($id)) {
            Session::set_flash('error', 'Could not find team_season #' . $id);
            Response::redirect('admin/team/season');
        }

        $this->template->set_global('team_season', $data, false);
        $this->template->set_global('record', 
                                    Model_Game::getRecords('team', 
                                                           'season', 
                                                           $id)
        );
        $this->template
            ->set_global('stats', Data_Seasonview::getStats($id), false);
        $this->template
            ->set_global(
                'title',
                $data->semester == 1 ?
                    $data->seasons->start : ($data->semester == 2 ?
                        $data->seasons->start . '-' . $data->seasons->end :
                        $data->seasons->end) . ' - ' . $data->teams->team_name
            );
        $nav = Data_Seasonview::getNav($id, $data->team_id);
        if ($nav) {
            $this->template->sidenav = View::forge('team/season/sidenav',$nav,false);
        }
        $this->template->content = View::forge('admin/team/season/view');
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Team_Season::validate('create');

            if ($val->run()) {
                $team_season = Model_Team_Season::forge(array(
                            'team_id' => Input::post('team_id'),
                            'season_id' => Input::post('season_id'),
                            'semester' => Input::post('semester'),
                            'league' => Input::post('league'),
                            'league_abbr' => Input::post('league_abbr'),                    
                            'league_finish' => Input::post('league_finish'),
                            'league_torunament_finish' => Input::post('league_torunament_finish'),
                            'last_post_game' => Input::post('last_post_game'),
                            'team_season_notes' => Input::post('team_season_notes'),
                            'team_season_image' => Input::post('team_season_image'),
                            'team_season_preview' => Input::post('team_season_preview'),
                            'team_season_recap' => Input::post('team_season_recap'),
                ));

                if ($team_season and $team_season->save()) {
                    Session::set_flash('success', e('Added team Season #' . $team_season->id . '.'));

                    Response::redirect('admin/team/season');
                } else {
                    Session::set_flash('error', e('Could not save team season.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        
        $data = $this->set_opts();
        
        $this->template->title = "Team Seasons";
        $this->template->content = View::forge('admin/team/season/create', $data, false);
    }

    public function action_edit($id = null) {
        $team_season = Model_Team_Season::find($id);
        $val = Model_Team_Season::validate('edit');

        if ($val->run()) {
            $team_season->team_id = Input::post('team_id');
            $team_season->season_id = Input::post('season_id');
            $team_season->semester = Input::post('semester');
            $team_season->league = Input::post('league');
            $team_season->league_abbr = Input::post('league_abbr');
            $team_season->league_finish = Input::post('league_finish');
            $team_season->league_torunament_finish = Input::post('league_torunament_finish');
            $team_season->last_post_game = Input::post('last_post_game');
            $team_season->team_season_notes = Input::post('team_season_notes');
            $team_season->team_season_image = Input::post('team_season_image');
            $team_season->team_season_preview = Input::post('team_season_preview');
            $team_season->team_season_recap = Input::post('team_season_recap');

            if ($team_season->save()) {
                Session::set_flash('success', e('Updated team season #' . $id));

                Response::redirect('admin/team/season');
            } else {
                Session::set_flash('error', e('Could not update team season #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $team_season->team_id = $val->validated('team_id');
                $team_season->season_id = $val->validated('season_id');
                $team_season->semester = $val->validated('semester');
                $team_season->league = $val->validated('league');
                $team_season->league_abbr = $val->validated('league_abbr');
                $team_season->league_finish = $val->validated('league_finish');
                $team_season->league_torunament_finish = $val->validated('league_torunament_finish');
                $team_season->last_post_game = $val->validated('last_post_game');
                $team_season->team_season_notes = $val->validated('team_season_notes');
                $team_season->team_season_image = $val->validated('team_season_image');
                $team_season->team_season_preview = $val->validated('team_season_preview');
                $team_season->team_season_recap = $val->validated('team_season_recap');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('team_season', $team_season, false);
        }
        
        $data = $this->set_opts();

        $this->template->title = "Team Seasons";
        $this->template->content = View::forge('admin/team/season/edit', $data, false);
    }

    public function action_delete($id = null) {
        if ($team_season = Model_Team_Season::find($id)) {
            $team_season->delete();

            Session::set_flash('success', e('Deleted team season #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete team season #' . $id));
        }

        Response::redirect('admin/team/season');
    }
    
    public function action_add($param) {
        
    }
    
    private static function set_opts() {
        $teams = DB::select('id', 'team_name')->from('teams')->as_assoc()->execute();
        $team_list['A'] = '';
        foreach ($teams as $result) {
            $team_list[$result['id']] = $result['team_name'];
        }
        $seasons = DB::select('id', 'start', 'end')->from('seasons')->as_assoc()->execute();
        $season_list['A'] = '';
        foreach ($seasons as $result) {
            $season_list[$result['id']] = $result['start'].'-'.$result['end'];
        }
        $data['teams'] = $team_list;
        $data['seasons'] = $season_list;
        
        return $data;
    }
    
}

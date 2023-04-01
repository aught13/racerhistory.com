<?php

class Controller_Admin_Game extends Controller_Admin {

    public function action_index() {
        $query = Model_Game::query();

        $pagination = Pagination::forge('games_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['games'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Games";
        $this->template->content = View::forge('admin/game/index', $data);
    }

    public function action_view($id = null) {
        if (!isset($id)) {
            Response::redirect('admin/game/');
        }
        $game = Model_Game::find($id);

        $data['person_box'] = Model_Stat_Basket_Game_Person::query()->where('game_id', $id)->get();
        $data['team_box'] = Model_Stat_Basket_Game_Team::query()->where('game_id', $id)->where('opp', 0)->get();
        $data['game_box_mur'] = Model_Stat_Basket_Game_Box::query()->where('game_id', $id)->where('opponent_id', 0)->order_by('period', 'asc')->get();
        $data['game_box_opp'] = Model_Stat_Basket_Game_Box::query()->where('game_id', $id)->where('opponent_id', $game->opponent_id)->order_by('period', 'asc')->get();
        $data['opponent_box'] = Model_Stat_Basket_Game_Opponent::query()->where('game_id', $id)->get();
        $data['team_box_opp'] = Model_Stat_Basket_Game_Team::query()->where('game_id', $id)->where('opp', 1)->get();
        $data['techs'] = $this->getTechs($id);

        $this->template->set_global('stats', $this->getStats($id), false);
        $this->template->set_global('game', $game, false);

        $this->template->title = "Murray State " . ($game->hrn == 1 ? 'Vs' : ($game->hrn == 2 ? '@' : 'Vs')) . " " . $game->opponents->opponent_name . " - " .date_format(date_create($game->game_date), "m/d/Y");
        $this->template->content = View::forge('admin/game/view', $data, false);
    }

    public function action_create($id = null) {
        $season = Model_Team_Season::find($id);
        if (Input::method() == 'POST') {
            $val = Model_Game::validate('create');

            if ($val->run()) {
                $game = Model_Game::forge([
                            'team_season_id' => Input::post('team_season_id'),
                            'game_date' => Input::post('game_date'),
                            'game_time' => Input::post('game_time'),
                            'game_duration' => Input::post('game_duration'),
                            'game_type_id' => Input::post('game_type_id'),
                            'opponent_id' => Input::post('opponent_id'),
                            'place_id' => Input::post('place_id'),
                            'site_id' => Input::post('site_id'),
                            'hrn' => Input::post('hrn'),
                            'post' => Input::post('post'),
                            'periods' => Input::post('periods'),
                ]);

                if ($game and $game->save()) {
                    Session::set_flash('success', e('Added game #' . $game->id . '.'));

                    Response::redirect('admin/game/view/' . $game->id);
                } else {
                    Session::set_flash('error', e('Could not save game.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        isset($id) ? $this->template->set_global('season', $season, false) : '';
        $this->template->set_global('options' ,$this->set_opts(), false);

        $this->template->title = "Games";
        $this->template->content = View::forge('admin/game/create', $this->set_opts(), false);
    }

    public function action_edit($id = null) {
        $game = Model_Game::find($id);
        $val = Model_Game::validate('edit');

        if ($val->run()) {
            $game->team_season_id = Input::post('team_season_id');
            $game->game_date = Input::post('game_date');
            $game->game_time = Input::post('game_time');
            $game->game_duration = Input::post('game_duration');
            $game->game_type_id = Input::post('game_type_id');
            $game->opponent_id = Input::post('opponent_id');
            $game->place_id = Input::post('place_id');
            $game->site_id = Input::post('site_id');
            $game->hrn = Input::post('hrn');
            $game->post = Input::post('post');
            $game->w = Input::post('w');
            $game->l = Input::post('l');
            $game->pts_mur = Input::post('pts_mur');
            $game->pts_opp = Input::post('pts_opp');
            $game->mur_rk = Input::post('mur_rk');
            $game->opp_rk = Input::post('opp_rk');
            $game->periods = Input::post('periods');
            $game->ot = Input::post('ot');
            $game->attendance = Input::post('attendance');
            $game->game_preview = Input::post('game_preview');
            $game->game_recap = Input::post('game_recap');
            $game->game_notes = Input::post('game_notes');

            if ($game->save()) {

                $this->cleanPoints($game);

                Session::set_flash('success', e('Updated game #' . $id));

                Response::redirect('admin/game/view/' . $id);
            } else {
                Session::set_flash('error', e('Could not update game #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $game->team_season_id = $val->validated('team_season_id');
                $game->game_date = $val->validated('game_date');
                $game->game_time = $val->validated('game_time');
                $game->game_duration = $val->validated('game_duration');
                $game->game_type_id = $val->validated('game_type_id');
                $game->opponent_id = $val->validated('opponent_id');
                $game->place_id = $val->validated('place_id');
                $game->site_id = $val->validated('site_id');
                $game->hrn = $val->validated('hrn');
                $game->post = $val->validated('post');
                $game->w = $val->validated('w');
                $game->l = $val->validated('l');
                $game->pts_mur = $val->validated('pts_mur');
                $game->pts_opp = $val->validated('pts_opp');
                $game->mur_rk = $val->validated('mur_rk');
                $game->opp_rk = $val->validated('opp_rk');
                $game->periods = $val->validated('periods');
                $game->ot = $val->validated('ot');
                $game->attendance = $val->validated('attendance');
                $game->game_preview = $val->validated('game_preview');
                $game->game_recap = $val->validated('game_recap');
                $game->game_notes = $val->validated('game_notes');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('game', $game, false);
        }
        
        $this->template->set_global('options' ,$this->set_opts(), false);

        $this->template->title = "Games";
        $this->template->content = View::forge('admin/game/edit');
    }

    public function action_refs($id = null) {
        $game = Model_Game::find($id);
        $val = Model_Game::val_Refs('edit');

        if ($val->run()) {

            if (!empty(Input::post('ref_1'))) {
                $game->ref_1 = Input::post('ref_1');
            } elseif (!empty($game->ref_1)) {
                $game->ref_1 = null;
            }
            if (!empty(Input::post('ref_2'))) {
                $game->ref_2 = Input::post('ref_2');
            } elseif (!empty($game->ref_2)) {
                $game->ref_2 = null;
            }
            if (!empty(Input::post('ref_3'))) {
                $game->ref_3 = Input::post('ref_3');
            } elseif (!empty($game->ref_3)) {
                $game->ref_3 = null;
            }

            if ($game->save()) {
                Session::set_flash('success', e('Updated game #' . $id));

                Response::redirect('admin/game/view/'.$id);
            } else {
                Session::set_flash('error', e('Could not update game #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $game->ref_1 = $val->validated('ref_1');
                $game->ref_2 = $val->validated('ref_2');
                $game->ref_3 = $val->validated('ref_3');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('game', $game, false);
        }

        $this->template->title = "Game Referees";
        $this->template->content = View::forge('admin/game/edit_ref');
    }

    public function action_score($id = null) {
        $game = Model_Game::find($id);
        //get the periods, OT if needed
        $data['periods'] = (int) $game->periods;
        !empty($game->ot) ? $data['ot'] = (int) $game->ot : $data['ot'] = 0;

        $val = Model_Game::val_score($data);

        if ($val->run()) {
            //we don't know how many periods we have so do all of $_POST
            foreach ($val->validated() as $key => $value) {
                $game->{$key} = $value;
            }

            if ($game->save()) {
                Session::set_flash('success', e('Updated game #' . $id));

                Response::redirect('admin/game/view/' . $id);
            } else {
                Session::set_flash('error', e('Could not update game #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                foreach ($val->input() as $key) {
                    $game->{$key} = $val->validated($key);
                }

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('game', $game, false);
        }

        $this->template->title = "Game Score";
        $this->template->content = View::forge('admin/game/score', $data);
    }

    public function action_delete($id = null) {
        if ($game = Model_Game::find($id)) {
            $game->delete();

            Session::set_flash('success', e('Deleted game #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete game #' . $id));
        }

        Response::redirect('admin/game');
    }

    private static function set_opts() {
        $seasons[] = '';
        $game_types[] = '';
        $opponents[] = '';
        $places[] = '';
        $sites[] = '';
        $season = Model_Team_Season::find('all');
        foreach ($season as $value) {
            $seasons[$value->id] = $value->seasons->start . '-' . $value->seasons->end . ' - ' . $value->teams->team_name;
        }
        $game_type = Model_Game_Type::find('all');
        foreach ($game_type as $value) {
            $game_types[$value->id] = $value->game_type_name;
        }
        $opponent = Model_Opponent::find('all', ['order_by' => ['opponent_name' => 'asc']]);
        foreach ($opponent as $value) {
            $opponents[$value->id] = $value->opponent_name . ' ' . $value->places->place_state;
        }
        $place = Model_Place::find('all', ['order_by' => ['place_name' => 'desc']]);
        foreach ($place as $value) {
            $places[$value->id] = $value->place_name . ', ' . $value->place_state;
        }
        $site = Model_Site::find('all');
        foreach ($site as $value) {
            $sites[$value->id] = $value->places->place_name . ', ' . $value->places->place_state . ' - ' . $value->site_name;
        }
        $data = ['seasons' => $seasons, 'game_types' => $game_types, 'opponents' => $opponents, 'places' => $places, 'sites' => $sites];
        return $data;
    }

    private static function getStats($game) {
        $stats = [];
        $query_person = Model_Stat_Basket_Game_Person::query()->where('game_id', $game);
        $query_team = Model_Stat_Basket_Game_Team::query()->where('game_id', $game);
        $query_game_box_mur = Model_Stat_Basket_Game_Box::query()->where('game_id', $game)->where('opponent_id', 0);
        if ($query_person->count() > 0) {
            foreach ($query_person->get() as $result) {
                foreach ($result as $key => $value) {
                    if ($value >= 0) {
                        $stats[$key] = true;
                    }
                }
            }
        }
        if ($query_team->count() > 0) {
            $query = $query_team->get();
            foreach ($query as $result) {
                foreach ($result as $key => $value) {
                    if ($value >= 0) {
                        $stats[$key] = true;
                    }
                }
            }
        }
        if ($query_game_box_mur->count() > 0) {
            foreach ($query_game_box_mur->get() as $result) {
                foreach ($result as $key => $value) {
                    if (!empty($value) || $value == '0') {
                        $stats[$key] = true;
                    }
                }
            }
        }

        return $stats;
    }

    private static function cleanPoints($game) {
        $per = Model_Game_Eav::query()->where('game_id', $game->id)->and_where_open()->where('key', 'like', 'mur_%')->or_where('key', 'like', 'opp_%')->and_where_close();
        $setper = $per->count();
        $ot = Model_Game_Eav::query()->where('game_id', $game->id)->and_where_open()->where('key', 'like', 'mur_ot_%')->or_where('key', 'like', 'opp_ot%')->and_where_close();
        $setot = $ot->count();
        $setper -= $setot;
        $x = false;
        if ($setper > ((empty($game->periods) ? 0 : $game->periods) * 2)) {
            foreach ($per->get() as $value) {
                $value->value = null;
                $value->save();
            }
            $x = true;
        }
        if ($setot > ((empty($game->ot) ? 0 : $game->ot) * 2)) {
            foreach ($ot->get() as $value) {
                $value->value = null;
                $value->save();
            }
            $x = true;
        }

        return $x;
    }
    
    public function getTechs($game) {
        $techs = [];
        $opp = Model_Stat_Basket_Game_Box::query()->select('TF')->where('game_id', $game)->and_where_open()->where('opponent_id', '>', 0 )->where('period', 'Z')->where('TF', '>', 0)->and_where_close()->get_one() ?? false;
        if ($opp) {
            $query = Model_Stat_Basket_Game_Opponent::query()->select('name', 'TF')->where('game_id', $game)->and_where_open()->where('TF', '>', 0 )->where('period', 'Z')->and_where_close();
            $q = 0;
            $w = 0;
            foreach ($query->get() as $value) {
                $techs['opp'][$value->name] = $value->TF;
                $q += $value->TF;
                $w++;
            }
            if ($q < $opp->TF) {
                $techs['opp']['TEAM'] = $opp->TF - $q;
                $w++;
            }
            $techs['opptot'] = $opp->TF;
            $techs['oppcnt'] = $w;
        }
        $mur = Model_Stat_Basket_Game_Box::query()->select('TF')->where('game_id', $game)->and_where_open()->where('opponent_id', 0 )->where('period', 'Z')->where('TF', '>', 0)->and_where_close()->get_one() ?? false;
        if ($mur) {
            $query = Model_Stat_Basket_Game_Person::query()->select('TF')->where('game_id', $game)->and_where_open()->where('TF', '>', 0 )->where('period', 'Z')->and_where_close();
            $e = 0;
            $r = 0;
            foreach ($query->get() as $value) {
                $techs['mur'][$value->name] = $value->TF;
                $r += $value->TF;
                $e++;
            }
            if ($r < $mur->TF) {
                $techs['mur']['TEAM'] = ($mur->TF - $r);
                $e++;
            } 
            $techs['murtot'] = $mur->TF;
            $techs['murcnt'] = $e;
        }
        
        return $techs;
    }


}

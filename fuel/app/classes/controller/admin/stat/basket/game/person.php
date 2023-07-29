<?php

class Controller_Admin_Stat_Basket_Game_Person extends Controller_Admin {

    public function action_index() {
        $query = Model_Stat_Basket_Game_Person::query();
        
        $pagination = Pagination::forge('stat_basket_game_people_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['stat_basket_game_people'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Stat_basket_game_people";
        $this->template->content = View::forge('admin/stat/basket/game/person/index', $data);
    }

    public function action_view($id = null) {
        $data['stat_basket_game_person'] = Model_Stat_Basket_Game_Person::find($id);

        $this->template->title = "Stat_basket_game_person";
        $this->template->content = View::forge('admin/stat/basket/game/person/view', $data);
    }

    public function action_create($game = null) {
        
        $statgame = Model_Game::find($game);
        $add = Input::post('submitand') ?: false;
        
        if (Input::method() == 'POST') {
            $val = Model_Stat_Basket_Game_Person::validate('create');
            
            if ($val->run() && $this->noDup(Input::post('team_season_roster_id'), Input::post('game_id'), Input::post('period'))) {
                $stat_basket_game_person = Model_Stat_Basket_Game_Person::forge([
                'team_season_roster_id' => Input::post('team_season_roster_id'),
                'game_id' => Input::post('game_id'),
                'period' => Input::post('period'),
                'GP' => Input::post('GP'),
                'GS' => Input::post('GS'),
                'MIN' => Input::post('MIN'),
                'FGM' => Input::post('FGM'),
                'FGA' => Input::post('FGA'),
                'TPM' => Input::post('TPM'),
                'TPA' => Input::post('TPA'),
                'FTM' => Input::post('FTM'),
                'FTA' => Input::post('FTA'),
                'ORB' => Input::post('ORB'),
                'DRB' => Input::post('DRB'),
                'RB' => Input::post('RB'),
                'AST' => Input::post('AST'),
                'STL' => Input::post('STL'),
                'BS' => Input::post('BS'),
                'BD' => Input::post('BD'),
                'TRN' => Input::post('TRN'),
                'PF' => Input::post('PF'),
                'TF' => Input::post('TF'),
                'FD' => Input::post('FD'),
                'PTS' => Input::post('PTS'),
                ]);
                
                if ($stat_basket_game_person and $stat_basket_game_person->save()) {
                    Session::set_flash('success', e('Added Player Stat for ' . $stat_basket_game_person->team_season_roster->persons->display . '.')); 
                    $_POST = [];
                    $add ? Response::redirect('admin/stat/basket/game/person/create/' .$game) : '';                   
                    Response::redirect('admin/game/view/'.$statgame->id);                    
                } else {
                    Session::set_flash('error', e('Could not save stat_basket_game_person.'));                    
                }                
            } else {            
                Session::set_flash('error', (!empty($val->error()) ? $val->error() : 'Duplicate entry'));                
            }            
        }
        
        isset($statgame) ? $this->template->set_global('periods', $this->setPers($game), false) : '';
        isset($statgame) ? $this->template->set_global('people', $this->setPeople($game), false) : '';
        isset($statgame) ? $this->template->set_global('game', $statgame, false) : '';
        
        $this->template->title = "Individual Game Stats";
        $this->template->content = View::forge('admin/stat/basket/game/person/create');
    }

    public function action_edit($id = null) {
        $stat_basket_game_person = Model_Stat_Basket_Game_Person::find($id);
        $statgame = Model_Game::find($stat_basket_game_person->game_id);
        $val = Model_Stat_Basket_Game_Person::validate('edit');

        if ($val->run() && $this->noDup(Input::post('team_season_roster_id'), Input::post('game_id'), Input::post('period'), $stat_basket_game_person)) {        
        $stat_basket_game_person->team_season_roster_id = Input::post('team_season_roster_id');
        $stat_basket_game_person->game_id = Input::post('game_id');
        $stat_basket_game_person->period = Input::post('period');
        $stat_basket_game_person->GP = Input::post('GP');
        $stat_basket_game_person->GS = Input::post('GS');
        $stat_basket_game_person->MIN = Input::post('MIN');
        $stat_basket_game_person->FGM = Input::post('FGM');
        $stat_basket_game_person->FGA = Input::post('FGA');
        $stat_basket_game_person->TPM = Input::post('TPM');
        $stat_basket_game_person->TPA = Input::post('TPA');
        $stat_basket_game_person->FTM = Input::post('FTM');
        $stat_basket_game_person->FTA = Input::post('FTA');
        $stat_basket_game_person->ORB = Input::post('ORB');
        $stat_basket_game_person->DRB = Input::post('DRB');
        $stat_basket_game_person->RB = Input::post('RB');
        $stat_basket_game_person->AST = Input::post('AST');
        $stat_basket_game_person->STL = Input::post('STL');
        $stat_basket_game_person->BS = Input::post('BS');
        $stat_basket_game_person->BD = Input::post('BD');
        $stat_basket_game_person->TRN = Input::post('TRN');
        $stat_basket_game_person->PF = Input::post('PF');
        $stat_basket_game_person->TF = Input::post('TF');
        $stat_basket_game_person->FD = Input::post('FD');
        $stat_basket_game_person->PTS = Input::post('PTS');
            
            if ($stat_basket_game_person->save()) {            
                Session::set_flash('success', e('Updated stat_basket_game_person #' . $id));                     
                Response::redirect('admin/game/view/'.$statgame->id);                    
            } else {            
                Session::set_flash('error', e('Could not update stat_basket_game_person #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') {            
            $stat_basket_game_person->team_season_roster_id = $val->validated('team_season_roster_id');
            $stat_basket_game_person->game_id = $val->validated('game_id');
            $stat_basket_game_person->period = $val->validated('period');
            $stat_basket_game_person->GP = $val->validated('GP');
            $stat_basket_game_person->GS = $val->validated('GS');
            $stat_basket_game_person->MIN = $val->validated('MIN');
            $stat_basket_game_person->FGM = $val->validated('FGM');
            $stat_basket_game_person->FGA = $val->validated('FGA');
            $stat_basket_game_person->TPM = $val->validated('TPM');
            $stat_basket_game_person->TPA = $val->validated('TPA');
            $stat_basket_game_person->FTM = $val->validated('FTM');
            $stat_basket_game_person->FTA = $val->validated('FTA');
            $stat_basket_game_person->ORB = $val->validated('ORB');
            $stat_basket_game_person->DRB = $val->validated('DRB');
            $stat_basket_game_person->RB = $val->validated('RB');
            $stat_basket_game_person->AST = $val->validated('AST');
            $stat_basket_game_person->STL = $val->validated('STL');
            $stat_basket_game_person->BS = $val->validated('BS');
            $stat_basket_game_person->BD = $val->validated('BD');
            $stat_basket_game_person->TRN = $val->validated('TRN');
            $stat_basket_game_person->PF = $val->validated('PF');
            $stat_basket_game_person->TF = $val->validated('TF');
            $stat_basket_game_person->FD = $val->validated('FD');
            $stat_basket_game_person->PTS = $val->validated('PTS');
                
                Session::set_flash('error', $val->error());                
            }
            
            $this->template->set_global('stat_basket_game_person', $stat_basket_game_person, false);            
        }
        
        isset($statgame) ? $this->template->set_global('periods', $this->setPers($statgame->id), false) : '';
        isset($statgame) ? $this->template->set_global('people', $this->setPeople($statgame->id), false) : '';
        isset($statgame) ? $this->template->set_global('game', $statgame, false) : '';
        
        $this->template->title = "Stat_basket_game_people";
        $this->template->content = View::forge('admin/stat/basket/game/person/edit');
    }

    public function action_delete($id = null) {
        if ($stat_basket_game_person = Model_Stat_Basket_Game_Person::find($id)) {
            $game = $stat_basket_game_person->game_id;
            $stat_basket_game_person->delete();

            Session::set_flash('success', e('Deleted stat_basket_game_person #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not delete stat_basket_game_person #'.$id));            
        }

        Response::redirect('admin/game/view/'.$game);
    }
            
    private static function setPers($id = null) {
        $game = Model_Game::find($id);
        if ($game) {
            $i= $game->periods ;
            $periods['Z'] = 'Final';
            while ($i > 0) {
                $periods[$i] = Inflector::ordinalize($i);
                --$i;
            }
            $i= $game->ot;
            while ($i > 0) {
                $periods['OT '.$i] = Inflector::ordinalize($i).' OT';
                --$i;
            }
        }
        
        return $periods;
    }
    
    private static function setPeople($id = null) {
        $game = Model_Game::find($id);
        $options = [];
        if ($game) {
            $players = Model_Team_Season_Roster::query()->where('team_season_id',$game->team_season_id)->get() ;            
            foreach ($players as $value) {
                $options[$value->id] = $value->persons->display;
            } 
        }
        
        return $options;
    }
    
    private static function noDup($param1, $param2, $param3, $edit = false) {
        if ($edit) {
            if ($edit->team_season_roster_id == $param1 && $edit->period == $param3) { 
                return true;
            }
        }    
        if (Model_Stat_Basket_Game_Person::query()->where(['team_season_roster_id' => $param1, 'game_id' => $param2, 'period' => $param3])->count() == 0) {            
                return true;
            } else {
                return false;
            }
    }


}

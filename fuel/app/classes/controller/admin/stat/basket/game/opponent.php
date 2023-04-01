<?php

class Controller_Admin_Stat_Basket_Game_Opponent extends Controller_Admin {

    public function action_index() {
        $query = Model_Stat_Basket_Game_Opponent::query();
        
        $pagination = Pagination::forge('stat_basket_game_opponents_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['stat_basket_game_opponents'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Stat_basket_game_opponents";
        $this->template->content = View::forge('admin/stat/basket/game/opponent/index', $data);
    }

    public function action_view($id = null) {
        $data['stat_basket_game_opponent'] = Model_Stat_Basket_Game_Opponent::find($id);

        $this->template->title = "Stat_basket_game_opponent";
        $this->template->content = View::forge('admin/stat/basket/game/opponent/view', $data);
    }

    public function action_create($id = null) {
        
        $game = Model_Game::find($id);
        
        if (Input::method() == 'POST') {
            $val = Model_Stat_Basket_Game_Opponent::validate('create');
            
            if ($val->run()&& $this->noDup(Input::post('name'), Input::post('game_id'), Input::post('period'))) {
                $stat_basket_game_opponent = Model_Stat_Basket_Game_Opponent::forge([
                'game_id' => Input::post('game_id'),
                'period' => Input::post('period'),
                'name' => Input::post('name'),
                'jersey' => Input::post('jersey'),
                'position' => Input::post('position'),
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
                
                if ($stat_basket_game_opponent and $stat_basket_game_opponent->save()) {
                    Session::set_flash('success', e('Added stat_basket_game_opponent #' . $stat_basket_game_opponent->id . '.'));                    
                    Response::redirect('admin/game/view/' .$stat_basket_game_opponent->game_id);                    
                } else {
                    Session::set_flash('error', e('Could not save stat_basket_game_opponent.'));                    
                }                
            } else {            
                Session::set_flash('error', $val->error());                
            }            
        }
        
        isset($game) ? $this->template->set_global('periods', $this->setPers($id), false) : '';
        isset($game) ? $this->template->set_global('game', $game, false) : '';
        
        $this->template->title = "New Opponent Individual Stat";
        $this->template->content = View::forge('admin/stat/basket/game/opponent/create');
    }

    public function action_edit($id = null) {
        $stat_basket_game_opponent = Model_Stat_Basket_Game_Opponent::find($id);        
        $statgame = Model_Game::find($stat_basket_game_opponent->game_id);
        $val = Model_Stat_Basket_Game_Opponent::validate('edit');

        if ($val->run()) {        
        $stat_basket_game_opponent->game_id = Input::post('game_id');
        $stat_basket_game_opponent->period = Input::post('period');
        $stat_basket_game_opponent->name = Input::post('name');
        $stat_basket_game_opponent->jersey = Input::post('jersey');
        $stat_basket_game_opponent->position = Input::post('position');
        $stat_basket_game_opponent->GP = Input::post('GP');
        $stat_basket_game_opponent->GS = Input::post('GS');
        $stat_basket_game_opponent->MIN = Input::post('MIN');
        $stat_basket_game_opponent->FGM = Input::post('FGM');
        $stat_basket_game_opponent->FGA = Input::post('FGA');
        $stat_basket_game_opponent->TPM = Input::post('TPM');
        $stat_basket_game_opponent->TPA = Input::post('TPA');
        $stat_basket_game_opponent->FTM = Input::post('FTM');
        $stat_basket_game_opponent->FTA = Input::post('FTA');
        $stat_basket_game_opponent->ORB = Input::post('ORB');
        $stat_basket_game_opponent->DRB = Input::post('DRB');
        $stat_basket_game_opponent->RB = Input::post('RB');
        $stat_basket_game_opponent->AST = Input::post('AST');
        $stat_basket_game_opponent->STL = Input::post('STL');
        $stat_basket_game_opponent->BS = Input::post('BS');
        $stat_basket_game_opponent->BD = Input::post('BD');
        $stat_basket_game_opponent->TRN = Input::post('TRN');
        $stat_basket_game_opponent->PF = Input::post('PF');
        $stat_basket_game_opponent->TF = Input::post('TF');
        $stat_basket_game_opponent->FD = Input::post('FD');
        $stat_basket_game_opponent->PTS = Input::post('PTS');
            
            if ($stat_basket_game_opponent->save()) {            
                Session::set_flash('success', e('Updated stat_basket_game_opponent #' . $id));                
                Response::redirect('admin/game/view/'.$statgame->id);                  
            } else {            
                Session::set_flash('error', e('Could not update stat_basket_game_opponent #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') {            
            $stat_basket_game_opponent->game_id = $val->validated('game_id');
            $stat_basket_game_opponent->period = $val->validated('period');
            $stat_basket_game_opponent->name = $val->validated('name');
            $stat_basket_game_opponent->jersey = $val->validated('jersey');
            $stat_basket_game_opponent->position = $val->validated('position');
            $stat_basket_game_opponent->GP = $val->validated('GP');
            $stat_basket_game_opponent->GS = $val->validated('GS');
            $stat_basket_game_opponent->MIN = $val->validated('MIN');
            $stat_basket_game_opponent->FGM = $val->validated('FGM');
            $stat_basket_game_opponent->FGA = $val->validated('FGA');
            $stat_basket_game_opponent->TPM = $val->validated('TPM');
            $stat_basket_game_opponent->TPA = $val->validated('TPA');
            $stat_basket_game_opponent->FTM = $val->validated('FTM');
            $stat_basket_game_opponent->FTA = $val->validated('FTA');
            $stat_basket_game_opponent->ORB = $val->validated('ORB');
            $stat_basket_game_opponent->DRB = $val->validated('DRB');
            $stat_basket_game_opponent->RB = $val->validated('RB');
            $stat_basket_game_opponent->AST = $val->validated('AST');
            $stat_basket_game_opponent->STL = $val->validated('STL');
            $stat_basket_game_opponent->BS = $val->validated('BS');
            $stat_basket_game_opponent->BD = $val->validated('BD');
            $stat_basket_game_opponent->TRN = $val->validated('TRN');
            $stat_basket_game_opponent->PF = $val->validated('PF');
            $stat_basket_game_opponent->TF = $val->validated('TF');
            $stat_basket_game_opponent->FD = $val->validated('FD');
            $stat_basket_game_opponent->PTS = $val->validated('PTS');
                
                Session::set_flash('error', $val->error());                
            }
            
            $this->template->set_global('stat_basket_game_opponent', $stat_basket_game_opponent, false);            
        }
        
        isset($statgame) ? $this->template->set_global('periods', $this->setPers($statgame->id), false) : '';
        isset($statgame) ? $this->template->set_global('game', $statgame, false) : '';
        
        $this->template->title = "Stat_basket_game_opponents";
        $this->template->content = View::forge('admin/stat/basket/game/opponent/edit');
    }

    public function action_delete($id = null) {
        if ($stat_basket_game_opponent = Model_Stat_Basket_Game_Opponent::find($id)) {        
            $stat_basket_game_opponent->delete();

            Session::set_flash('success', e('Deleted stat_basket_game_opponent #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not delete stat_basket_game_opponent #'.$id));            
        }

        Response::redirect('admin/stat/basket/game/opponent');
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
    
    private static function noDup($param1, $param2, $param3, $edit = false) {
        if ($edit) {
            if ($edit->team_season_roster_id == $param1 && $edit->period == $param3) { 
                return true;
            }
        }    
        if (Model_Stat_Basket_Game_Opponent::query()->where(['name' => $param1, 'game_id' => $param2, 'period' => $param3])->count() == 0) {            
                return true;
            } else {
                return false;
            }
    }
    
}

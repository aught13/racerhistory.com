<?php

class Controller_Admin_Stat_Basket_Game_Team extends Controller_Admin {

    public function action_create($id = null, $opp = null) {
        if (!isset($id)) {
            Response::redirect('admin/');
        }
        if (Input::method() == 'POST') {
            
            $val = Model_Stat_Basket_Game_Team::validate('create');
            
            if ($val->run() && self::noDup(Input::post('game_id'), Input::post('opp'))) {
                $stat_basket_game_team = Model_Stat_Basket_Game_Team::forge([
                'game_id' => Input::post('game_id'),
                'opp' => Input::post('opp'),    
                'ORB' => Input::post('ORB'),
                'DRB' => Input::post('DRB'),
                'RB' => Input::post('RB'),
                'TRN' => Input::post('TRN'),
                'TF' => Input::post('TF'),
                'PTS' => Input::post('PTS'),
                ]);
                
                if ($stat_basket_game_team and $stat_basket_game_team->save()) {
                    Session::set_flash('success', e('Added stat_basket_game_team #' . $stat_basket_game_team->id . '.'));                    
                    Response::redirect('admin/game/view/'.$stat_basket_game_team->game_id);                    
                } else {
                    Session::set_flash('error', e('Could not save stat_basket_game_team.'));                    
                }                
            } else {            
                Session::set_flash('error', (!empty($val->error()) ? $val->error() : 'Duplicate entry'));                
            }            
        }
        if (isset($opp)) {
            $this->template->set_global('opp', 1 , false);
        }
        $this->template->set_global('game', $id, false);
        $this->template->title = "Team stats";
        $this->template->content = View::forge('admin/stat/basket/game/team/create');
    }

    public function action_edit($id = null) {
        $stat_basket_game_team = Model_Stat_Basket_Game_Team::find($id);
        $game = $stat_basket_game_team->game_id;
        $val = Model_Stat_Basket_Game_Team::validate('edit');

        if ($val->run() && self::noDup(Input::post('game_id'), Input::post('opp'), $stat_basket_game_team)) {        
        $stat_basket_game_team->game_id = Input::post('game_id');
        $stat_basket_game_team->opp = Input::post('opp');
        $stat_basket_game_team->ORB = Input::post('ORB');
        $stat_basket_game_team->DRB = Input::post('DRB');
        $stat_basket_game_team->RB = Input::post('RB');
        $stat_basket_game_team->TRN = Input::post('TRN');
        $stat_basket_game_team->TF = Input::post('TF');
        $stat_basket_game_team->PTS = Input::post('PTS');
            
            if ($stat_basket_game_team->save()) {            
                Session::set_flash('success', e('Updated stat_basket_game_team #' . $id));                
                Response::redirect('admin/game/view/'.$game);                  
            } else {            
                Session::set_flash('error', e('Could not update stat_basket_game_team #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') {            
            $stat_basket_game_team->game_id = $val->validated('game_id');
            $stat_basket_game_team->opp = $val->validated('opp');
            $stat_basket_game_team->ORB = $val->validated('ORB');
            $stat_basket_game_team->DRB = $val->validated('DRB');
            $stat_basket_game_team->RB = $val->validated('RB');
            $stat_basket_game_team->TRN = $val->validated('TRN');
            $stat_basket_game_team->TF = $val->validated('TF');
            $stat_basket_game_team->PTS = $val->validated('PTS');
                
                Session::set_flash('error', (!empty($val->error()) ? $val->error() : 'Duplicate entry'));                
            }
            
            $this->template->set_global('stat_basket_game_team', $stat_basket_game_team, false);            
        }
        $this->template->set_global('game', $game, false);
        $this->template->title = "Team stats";
        $this->template->content = View::forge('admin/stat/basket/game/team/edit');
    }

    public function action_delete($id = null) {
        if ($stat_basket_game_team = Model_Stat_Basket_Game_Team::find($id)) {
            $redirect = $stat_basket_game_team->game_id;
            $stat_basket_game_team->delete();

            Session::set_flash('success', e('Deleted stat_basket_game_team #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not delete stat_basket_game_team #'.$id));            
        }

        Response::redirect('admin/game/view/'.$redirect);
    }
    
    private static function noDup($param1, $param2, $edit = false) {
        if ($edit) {
            if ($edit->game_id == $param1 && $edit->opp == $param2) { 
                return true;
            }
        }    
        if (Model_Stat_Basket_Game_team::query()->where(['game_id' => $param1, 'opp' => $param2])->count() == 0) {            
                return true;
            } else {
                return false;
            }
    }

}

<?php

class Controller_Admin_Stat_Basket_Season_Team extends Controller_Admin {

    public function action_index() {
        $query = Model_Stat_Basket_Season_Team::query();
        
        $pagination = Pagination::forge('stat_basket_season_teams_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['stat_basket_season_teams'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Basketball Stats";
        $this->template->content = View::forge('admin/stat/basket/season/team/index', $data);
    }

    public function action_view($id = null) {
        $data['stat_basket_season_team'] = Model_Stat_Basket_Season_Team::find($id);

        $this->template->title = "Stat_basket_season_team";
        $this->template->content = View::forge('admin/stat/basket/season/team/view', $data);
    }

    public function action_create($id = null) {
        
        if (Input::method() == 'POST') {
            $val = Model_Stat_Basket_Season_Team::validate('create');
            
            if ($val->run()) {
                $stat_basket_season_team = Model_Stat_Basket_Season_Team::forge([
                'team_season_id' => Input::post('team_season_id'),
                'GP' => Input::post('GP'),
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
                'TRN' => Input::post('TRN'),
                'PF' => Input::post('PF'),
                'TF' => Input::post('TF'),
                'PTS' => Input::post('PTS'),
                ]);
                
                if ($stat_basket_season_team and $stat_basket_season_team->save()) {
                    Session::set_flash('success', e('Added Team Season Total Stats.'));                    
                    Response::redirect('admin/team/season/view/'.$stat_basket_season_team->team_season_id);                    
                } else {
                    Session::set_flash('error', e('Could not save stat_basket_season_team.'));                    
                }                
            } else {            
                Session::set_flash('error', $val->error());                
            }            
        }
        
        isset($id) ? $this->template->set_global('team', $id, false) : '';
        $this->template->title = "Add Season Stats";
        $this->template->content = View::forge('admin/stat/basket/season/team/create');
    }

    public function action_edit($id = null) {
        $stat_basket_season_team = Model_Stat_Basket_Season_Team::find($id);
        $val = Model_Stat_Basket_Season_Team::validate('edit');

        if ($val->run()) {        
        $stat_basket_season_team->team_season_id = Input::post('team_season_id');
        $stat_basket_season_team->GP = Input::post('GP');
        $stat_basket_season_team->MIN = Input::post('MIN');
        $stat_basket_season_team->FGM = Input::post('FGM');
        $stat_basket_season_team->FGA = Input::post('FGA');
        $stat_basket_season_team->TPM = Input::post('TPM');
        $stat_basket_season_team->TPA = Input::post('TPA');
        $stat_basket_season_team->FTM = Input::post('FTM');
        $stat_basket_season_team->FTA = Input::post('FTA');
        $stat_basket_season_team->ORB = Input::post('ORB');
        $stat_basket_season_team->DRB = Input::post('DRB');
        $stat_basket_season_team->RB = Input::post('RB');
        $stat_basket_season_team->AST = Input::post('AST');
        $stat_basket_season_team->STL = Input::post('STL');
        $stat_basket_season_team->BS = Input::post('BS');
        $stat_basket_season_team->TRN = Input::post('TRN');
        $stat_basket_season_team->PF = Input::post('PF');
        $stat_basket_season_team->TF = Input::post('TF');
        $stat_basket_season_team->PTS = Input::post('PTS');
            
            if ($stat_basket_season_team->save()) {            
                Session::set_flash('success', e('Updated Season Total Stats'));                
                Response::redirect('admin/team/season/view/'.$stat_basket_season_team->team_season_id);                  
            } else {            
                Session::set_flash('error', e('Could not update stat_basket_season_team #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') {            
            $stat_basket_season_team->team_season_id = $val->validated('team_season_id');
            $stat_basket_season_team->GP = $val->validated('GP');
            $stat_basket_season_team->MIN = $val->validated('MIN');
            $stat_basket_season_team->FGM = $val->validated('FGM');
            $stat_basket_season_team->FGA = $val->validated('FGA');
            $stat_basket_season_team->TPM = $val->validated('TPM');
            $stat_basket_season_team->TPA = $val->validated('TPA');
            $stat_basket_season_team->FTM = $val->validated('FTM');
            $stat_basket_season_team->FTA = $val->validated('FTA');
            $stat_basket_season_team->ORB = $val->validated('ORB');
            $stat_basket_season_team->DRB = $val->validated('DRB');
            $stat_basket_season_team->RB = $val->validated('RB');
            $stat_basket_season_team->AST = $val->validated('AST');
            $stat_basket_season_team->STL = $val->validated('STL');
            $stat_basket_season_team->BS = $val->validated('BS');
            $stat_basket_season_team->TRN = $val->validated('TRN');
            $stat_basket_season_team->PF = $val->validated('PF');
            $stat_basket_season_team->TF = $val->validated('TF');
            $stat_basket_season_team->PTS = $val->validated('PTS');
                
                Session::set_flash('error', $val->error());                
            }
            
            $this->template->set_global('stat_basket_season_team', $stat_basket_season_team, false);            
        }
        
        $this->template->title = "Edit Season Stats";
        $this->template->content = View::forge('admin/stat/basket/season/team/edit');
    }

    public function action_delete($id = null) {
        if ($stat_basket_season_team = Model_Stat_Basket_Season_Team::find($id)) {      
            
            $redirect = $stat_basket_season_team->team_season_id;
            
            $stat_basket_season_team->delete();

            Session::set_flash('success', e('Deleted stat_basket_season_team #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not delete stat_basket_season_team #'.$id));            
        }

        Response::redirect('admin/team/season/view/' . $redirect);
    }

}

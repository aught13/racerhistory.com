<?php

class Controller_Admin_Stat_Basket_Season_Opponent extends Controller_Admin {

    public function action_index() {
        $query = Model_Stat_Basket_Season_Opponent::query();
        
        $pagination = Pagination::forge('stat_basket_season_opponents_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['stat_basket_season_opponents'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Stat_basket_season_opponents";
        $this->template->content = View::forge('admin/stat/basket/season/opponent/index', $data);
    }

    public function action_view($id = null) {
        $data['stat_basket_season_opponent'] = Model_Stat_Basket_Season_Opponent::find($id);

        $this->template->title = "Stat_basket_season_opponent";
        $this->template->content = View::forge('admin/stat/basket/season/opponent/view', $data);
    }

    public function action_create($id = null) {
        if (Input::method() == 'POST') {
            $val = Model_Stat_Basket_Season_Opponent::validate('create');
            
            if ($val->run()) {
                $stat_basket_season_opponent = Model_Stat_Basket_Season_Opponent::forge([
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
                
                if ($stat_basket_season_opponent and $stat_basket_season_opponent->save()) {
                    Session::set_flash('success', e('Added Opponent Totals.'));                    
                    Response::redirect('admin/team/season/view/'.$stat_basket_season_opponent->team_season_id);                    
                } else {
                    Session::set_flash('error', e('Could not save stat_basket_season_opponent.'));                    
                }                
            } else {            
                Session::set_flash('error', $val->error());                
            }            
        }
        
        isset($id) ? $this->template->set_global('team', $id, false) : '';
        
        $this->template->title = "New Opponent Total";
        $this->template->content = View::forge('admin/stat/basket/season/opponent/create');
    }

    public function action_edit($id = null) {
        $stat_basket_season_opponent = Model_Stat_Basket_Season_Opponent::find($id);
        $val = Model_Stat_Basket_Season_Opponent::validate('edit');

        if ($val->run()) {        
        $stat_basket_season_opponent->team_season_id = Input::post('team_season_id');
        $stat_basket_season_opponent->GP = Input::post('GP');
        $stat_basket_season_opponent->MIN = Input::post('MIN');
        $stat_basket_season_opponent->FGM = Input::post('FGM');
        $stat_basket_season_opponent->FGA = Input::post('FGA');
        $stat_basket_season_opponent->TPM = Input::post('TPM');
        $stat_basket_season_opponent->TPA = Input::post('TPA');
        $stat_basket_season_opponent->FTM = Input::post('FTM');
        $stat_basket_season_opponent->FTA = Input::post('FTA');
        $stat_basket_season_opponent->ORB = Input::post('ORB');
        $stat_basket_season_opponent->DRB = Input::post('DRB');
        $stat_basket_season_opponent->RB = Input::post('RB');
        $stat_basket_season_opponent->AST = Input::post('AST');
        $stat_basket_season_opponent->STL = Input::post('STL');
        $stat_basket_season_opponent->BS = Input::post('BS');
        $stat_basket_season_opponent->TRN = Input::post('TRN');
        $stat_basket_season_opponent->PF = Input::post('PF');
        $stat_basket_season_opponent->TF = Input::post('TF');
        $stat_basket_season_opponent->PTS = Input::post('PTS');
            
            if ($stat_basket_season_opponent->save()) {            
                Session::set_flash('success', e('Updated Opponent Totals'));                
                Response::redirect('admin/team/season/view/'.$stat_basket_season_opponent->team_season_id);                  
            } else {            
                Session::set_flash('error', e('Could not update stat_basket_season_opponent #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') {            
            $stat_basket_season_opponent->team_season_id = $val->validated('team_season_id');
            $stat_basket_season_opponent->GP = $val->validated('GP');
            $stat_basket_season_opponent->MIN = $val->validated('MIN');
            $stat_basket_season_opponent->FGM = $val->validated('FGM');
            $stat_basket_season_opponent->FGA = $val->validated('FGA');
            $stat_basket_season_opponent->TPM = $val->validated('TPM');
            $stat_basket_season_opponent->TPA = $val->validated('TPA');
            $stat_basket_season_opponent->FTM = $val->validated('FTM');
            $stat_basket_season_opponent->FTA = $val->validated('FTA');
            $stat_basket_season_opponent->ORB = $val->validated('ORB');
            $stat_basket_season_opponent->DRB = $val->validated('DRB');
            $stat_basket_season_opponent->RB = $val->validated('RB');
            $stat_basket_season_opponent->AST = $val->validated('AST');
            $stat_basket_season_opponent->STL = $val->validated('STL');
            $stat_basket_season_opponent->BS = $val->validated('BS');
            $stat_basket_season_opponent->TRN = $val->validated('TRN');
            $stat_basket_season_opponent->PF = $val->validated('PF');
            $stat_basket_season_opponent->TF = $val->validated('TF');
            $stat_basket_season_opponent->PTS = $val->validated('PTS');
                
                Session::set_flash('error', $val->error());                
            }
            
            $this->template->set_global('stat_basket_season_opponent', $stat_basket_season_opponent, false);            
        }
        
        $this->template->title = "Editing Opponent totals";
        $this->template->content = View::forge('admin/stat/basket/season/opponent/edit');
    }

    public function action_delete($id = null) {
        if ($stat_basket_season_opponent = Model_Stat_Basket_Season_Opponent::find($id)) {  
            
            $redirect = $stat_basket_season_opponent->team_season_id;
            
            $stat_basket_season_opponent->delete();

            Session::set_flash('success', e('Deleted stat_basket_season_opponent #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not delete stat_basket_season_opponent #'.$id));            
        }

        Response::redirect('admin/team/season/view/'.$redirect);
    }

}

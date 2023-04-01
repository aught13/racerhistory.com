<?php

class Controller_Admin_Stat_Basket_Season_Person extends Controller_Admin {

    public function action_index() {
        $query = Model_Stat_Basket_Season_Person::query();
        
        $pagination = Pagination::forge('stat_basket_season_people_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['stat_basket_season_people'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Player Season Stats";
        $this->template->content = View::forge('admin/stat/basket/season/person/index', $data);
    }

    public function action_create($id = null) {
        $roster = Model_Team_Season_Roster::find($id);
        if (Input::method() == 'POST') {
            $val = Model_Stat_Basket_Season_Person::validate('create');
            
            if ($val->run()) {
                $stat_basket_season_person = Model_Stat_Basket_Season_Person::forge([
                'team_season_roster_id' => Input::Post('team_season_roster_id'),    
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
                'TRN' => Input::post('TRN'),
                'PF' => Input::post('PF'),
                'TF' => Input::post('TF'),
                'PTS' => Input::post('PTS'),
                ]);
                
                if ($stat_basket_season_person and $stat_basket_season_person->save()) {
                    Session::set_flash('success', e('Added Player Season Stats #' . $stat_basket_season_person->id . '.'));                    
                    Response::redirect('admin/team/season/view/'.$stat_basket_season_person->team_season_roster->team_season_id);                    
                } else {
                    Session::set_flash('error', e('Could not save Player Season Stats.'));                    
                }                
            } else {            
                Session::set_flash('error', $val->error());                
            }            
        }
        
        isset($id) ? $this->template->set_global('roster_player', $roster, false) : '';
        
        $this->template->title = "Player Season Stats";
        $this->template->content = View::forge('admin/stat/basket/season/person/create');
    }

    public function action_edit($id = null) {
        $stat_basket_season_person = Model_Stat_Basket_Season_Person::find($id);
        $val = Model_Stat_Basket_Season_Person::validate('edit');

        if ($val->run()) { 
        $stat_basket_season_person->GP = Input::post('GP');
        $stat_basket_season_person->GS = Input::post('GS');
        $stat_basket_season_person->MIN = Input::post('MIN');
        $stat_basket_season_person->FGM = Input::post('FGM');
        $stat_basket_season_person->FGA = Input::post('FGA');
        $stat_basket_season_person->TPM = Input::post('TPM');
        $stat_basket_season_person->TPA = Input::post('TPA');
        $stat_basket_season_person->FTM = Input::post('FTM');
        $stat_basket_season_person->FTA = Input::post('FTA');
        $stat_basket_season_person->ORB = Input::post('ORB');
        $stat_basket_season_person->DRB = Input::post('DRB');
        $stat_basket_season_person->RB = Input::post('RB');
        $stat_basket_season_person->AST = Input::post('AST');
        $stat_basket_season_person->STL = Input::post('STL');
        $stat_basket_season_person->BS = Input::post('BS');
        $stat_basket_season_person->TRN = Input::post('TRN');
        $stat_basket_season_person->PF = Input::post('PF');
        $stat_basket_season_person->TF = Input::post('TF');
        $stat_basket_season_person->PTS = Input::post('PTS');
            
            if ($stat_basket_season_person->save()) {            
                Session::set_flash('success', e('Updated Player Season Stats #' . $id));                
                Response::redirect('admin/team/season/view/'.$stat_basket_season_person->team_season_roster->team_season_id);                  
            } else {            
                Session::set_flash('error', e('Could not update Player Season Stats #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') { 
            $stat_basket_season_person->GP = $val->validated('GP');
            $stat_basket_season_person->GS = $val->validated('GS');
            $stat_basket_season_person->MIN = $val->validated('MIN');
            $stat_basket_season_person->FGM = $val->validated('FGM');
            $stat_basket_season_person->FGA = $val->validated('FGA');
            $stat_basket_season_person->TPM = $val->validated('TPM');
            $stat_basket_season_person->TPA = $val->validated('TPA');
            $stat_basket_season_person->FTM = $val->validated('FTM');
            $stat_basket_season_person->FTA = $val->validated('FTA');
            $stat_basket_season_person->ORB = $val->validated('ORB');
            $stat_basket_season_person->DRB = $val->validated('DRB');
            $stat_basket_season_person->RB = $val->validated('RB');
            $stat_basket_season_person->AST = $val->validated('AST');
            $stat_basket_season_person->STL = $val->validated('STL');
            $stat_basket_season_person->BS = $val->validated('BS');
            $stat_basket_season_person->TRN = $val->validated('TRN');
            $stat_basket_season_person->PF = $val->validated('PF');
            $stat_basket_season_person->TF = $val->validated('TF');
            $stat_basket_season_person->PTS = $val->validated('PTS');
                
                Session::set_flash('error', $val->error());                
            }
            
            $this->template->set_global('stat_basket_season_person', $stat_basket_season_person, false);            
        }
        
        $this->template->title = "Player Season Stats";
        $this->template->content = View::forge('admin/stat/basket/season/person/edit');
    }

    public function action_delete($id = null) {
        if ($stat_basket_season_person = Model_Stat_Basket_Season_Person::find($id)) {
            
            $redirect = $stat_basket_season_person->team_season_roster->team_season_id;
            
            $stat_basket_season_person->delete();

            Session::set_flash('success', e('Deleted Player Season Stats #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not Player Season Stats #'.$id));            
        }

        Response::redirect('admin/team/season/view/'.$redirect);
    }

}

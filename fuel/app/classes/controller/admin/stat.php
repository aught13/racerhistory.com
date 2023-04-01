<?php

class Controller_Admin_Stat extends Controller_Admin {

    public function action_index() {
        $query = Model_Stat::query();
        
        $pagination = Pagination::forge('stats_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['stats'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Stats";
        $this->template->content = View::forge('admin/stat/index', $data);
    }

    public function action_view($id = null) {
        $data['stat'] = Model_Stat::find($id);

        $this->template->title = "Stat";
        $this->template->content = View::forge('admin/stat/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Stat::validate('create');
            
            if ($val->run()) {
                $stat = Model_Stat::forge([
                'sport_id' => Input::post('sport_id'),
                'stat_name' => Input::post('stat_name'),
                'stat_table' => Input::post('stat_table'),
                ]);
                
                if ($stat and $stat->save()) {
                    Session::set_flash('success', e('Added stat #' . $stat->id . '.'));                    
                    Response::redirect('admin/stat');                    
                } else {
                    Session::set_flash('error', e('Could not save stat.'));                    
                }                
            } else {            
                Session::set_flash('error', $val->error());                
            }            
        }
        
        $this->template->title = "Stats";
        $this->template->content = View::forge('admin/stat/create');
    }

    public function action_edit($id = null) {
        $stat = Model_Stat::find($id);
        $val = Model_Stat::validate('edit');

        if ($val->run()) {        
        $stat->sport_id = Input::post('sport_id');
        $stat->stat_name = Input::post('stat_name');
        $stat->stat_table = Input::post('stat_table');
            
            if ($stat->save()) {            
                Session::set_flash('success', e('Updated stat #' . $id));                
                Response::redirect('admin/stat');                  
            } else {            
                Session::set_flash('error', e('Could not update stat #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') {            
            $stat->sport_id = $val->validated('sport_id');
            $stat->stat_name = $val->validated('stat_name');
            $stat->stat_table = $val->validated('stat_table');
                
                Session::set_flash('error', $val->error());                
            }
            
            $this->template->set_global('stat', $stat, false);            
        }
        
        $this->template->title = "Stats";
        $this->template->content = View::forge('admin/stat/edit');
    }

    public function action_delete($id = null) {
        if ($stat = Model_Stat::find($id)) {        
            $stat->delete();

            Session::set_flash('success', e('Deleted stat #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not delete stat #'.$id));            
        }

        Response::redirect('admin/stat');
    }

}

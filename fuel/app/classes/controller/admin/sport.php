<?php

class Controller_Admin_Sport extends Controller_Admin {

    public function action_index() {
        $query = Model_Sport::query();
        
        $pagination = Pagination::forge('sports_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['sports'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Sports";
        $this->template->content = View::forge('admin/sport/index', $data);
    }

    public function action_view($id = null) {
        $data['sport'] = Model_Sport::find($id);

        $this->template->title = "Sport";
        $this->template->content = View::forge('admin/sport/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Sport::validate('create');
            
            if ($val->run()) {
                $sport = Model_Sport::forge([
                'sport_name' => Input::post('sport_name'),
                ]);
                
                if ($sport and $sport->save()) {
                    Session::set_flash('success', e('Added sport #' . $sport->id . '.'));                    
                    Response::redirect('admin/sport');                    
                } else {
                    Session::set_flash('error', e('Could not save sport.'));                    
                }                
            } else {            
                Session::set_flash('error', $val->error());                
            }            
        }
        
        $this->template->title = "Sports";
        $this->template->content = View::forge('admin/sport/create');
    }

    public function action_edit($id = null) {
        $sport = Model_Sport::find($id);
        $val = Model_Sport::validate('edit');

        if ($val->run()) {        
        $sport->sport_name = Input::post('sport_name');
            
            if ($sport->save()) {            
                Session::set_flash('success', e('Updated sport #' . $id));                
                Response::redirect('admin/sport');                  
            } else {            
                Session::set_flash('error', e('Could not update sport #' . $id));                
            }            
        } else {
        
            if (Input::method() == 'POST') {            
            $sport->sport_name = $val->validated('sport_name');
                
                Session::set_flash('error', $val->error());                
            }
            
            $this->template->set_global('sport', $sport, false);            
        }
        
        $this->template->title = "Sports";
        $this->template->content = View::forge('admin/sport/edit');
    }

    public function action_delete($id = null) {
        if ($sport = Model_Sport::find($id)) {        
            $sport->delete();

            Session::set_flash('success', e('Deleted sport #'.$id));            
        } else {        
            Session::set_flash('error', e('Could not delete sport #'.$id));            
        }

        Response::redirect('admin/sport');
    }

}

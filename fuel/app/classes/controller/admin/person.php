<?php

class Controller_Admin_Person extends Controller_Admin {
    
    private $stats = [];

    public function action_index() {
        $query = Model_Person::query();

        $pagination = Pagination::forge('person_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['people'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "People";
        $this->template->content = View::forge('admin/person/index', $data);
    }

    public function action_view($id = null) {
        $data['person'] = Model_Person::find($id);
        
        foreach ($data['person']->team_season_roster as $season) {
            $stats = Data_Personview::getStats($season->person_id);
        }
        
        $this->template->set_global('stats', $stats, false);

        $this->template->title = "Person";
        $this->template->content = View::forge('admin/person/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Person::validate('create');

            if ($val->run()) {
                $person = Model_Person::forge([
                            'first' => Input::post('first'),
                            'last' => Input::post('last'),
                            'full' => Input::post('full'),
                            'display' => Input::post('display'),
                ]);
                
                if ($person and !empty(Input::post('birth'))) {
                    $person->birth = date('Y-m-d', strtotime(Input::post('birth')));
                }
                
                if ($person and !empty(Input::post('death'))) {
                    $person->death = date('Y-m-d', strtotime(Input::post('death')));
                }
                
                if ($person and !empty(Input::post('person_image'))) {
                    $person->person_image = Input::post('person_image');
                }

                if ($person and $person->save()) {
                    Session::set_flash('success', e('Added person #' . $person->id . '.'));

                    Response::redirect('admin/person');
                } else {
                    Session::set_flash('error', e('Could not save person.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "People";
        $this->template->content = View::forge('admin/person/create');
    }

    public function action_edit($id = null) {
        $person = Model_Person::find($id);
        $val = Model_Person::validate('edit');

        if ($val->run()) {
            $person->first = Input::post('first');
            $person->last = Input::post('last');
            $person->full = Input::post('full');
            $person->display = Input::post('display');

            if (!empty(Input::post('birth'))) {
                $person->birth = date('Y-m-d', strtotime(Input::post('birth')));
            } else {
                $person->birth = NULL;
            }

            if ($person and !empty(Input::post('death'))) {
                $person->death = date('Y-m-d', strtotime(Input::post('death')));
            } else {
                $person->death = NULL;
            }

            if ($person and !empty(Input::post('person_image'))) {
                $person->person_image = Input::post('person_image');
            } else {
                $person->person_image = NULL;
            }
            
            if ($person->save()) {
                Session::set_flash('success', e('Updated person #' . $id));

                Response::redirect('admin/person');
            } else {
                Session::set_flash('error', e('Could not update person #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $person->first = $val->validated('first');
                $person->last = $val->validated('last');
                $person->full = $val->validated('full');
                $person->display = $val->validated('display');
                $person->birth = $val->validated('birth');
                $person->death = $val->validated('death');
                $person->person_image = $val->validated('person_image');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('person', $person, false);
        }

        $this->template->title = "People";
        $this->template->content = View::forge('admin/person/edit');
    }

    public function action_delete($id = null) {
        if ($person = Model_Person::find($id)) {
            $person->delete();

            Session::set_flash('success', e('Deleted person #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete person #' . $id));
        }

        Response::redirect('admin/person');
    }
    
    private function getStats($id = null) {
        $query_person = Model_Stat_Basket_Season_Person::query()->where('team_season_roster_id', $id);
        if ($query_person->count() > 0) {
            foreach ($query_person->get() as $result) {
                foreach ($result as $key => $value) {
                    if ($value >= 0) {
                        $this->stats[$key] = true;
                    }
                }   
            }
        }

        return true;
    }

}

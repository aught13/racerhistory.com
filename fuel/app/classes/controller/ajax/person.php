<?php

class Controller_Ajax_Person extends Controller_Ajax {

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
                    $this->response([   
                        'message' => 'Success, Added person #' . $person->id . '.',
                        'person_id' => $person->id,
                        'person_name' => $person->display], 200);
                } else {
                    
                    $this->response(['message' => 'Fail, could not save person'], 200);
                }
            } else {
                
                $this->response(['message' => 'Fail, validation error '.implode($val->error())], 200);
            }
        }

    }

}

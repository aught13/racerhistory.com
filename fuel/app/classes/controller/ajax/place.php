<?php

class Controller_Ajax_Place extends Controller_Ajax {

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Place::validate('create');

            if ($val->run()) {
                $place = Model_Place::forge([
                            'place_name' => Input::post('place_name'),
                            'place_state' => Input::post('place_state'),
                ]);

                if ($place and $place->save()) {
                    
                    $this->response([   
                        'message' => 'Success, Added place #' . $place->id . '.',
                        'place_id' => $place->id,
                        'place_name' => $place->place_name.', '.$place->place_state], 200);
                } else {
                    
                    $this->response(['message' => 'Fail, could not save place'], 200);
                }
            } else {
                
                $this->response(['message' => 'Fail, validation error '.implode($val->error())], 200);
            }
        }
    }

}    
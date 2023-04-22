<?php

class Controller_Ajax_Opponent extends Controller_Ajax {

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Opponent::validate('create');

            if ($val->run()) {
                $opponent = Model_Opponent::forge([
                            'place_id' => (empty(Input::post('place_id')) ? 0 : Input::post('place_id')),
                            'opponent_name' => Input::post('opponent_name'),
                            'opponent_mascot' => Input::post('opponent_mascot'),
                            'opponent_short' => Input::post('opponent_short'),
                            'opponent_abbr' => Input::post('opponent_abbr'),
                            'opponent_current' => 0,
                ]);

                if ($opponent and $opponent->save()) {
                    
                    $this->response([   
                        'message' => 'Success, Added opponent #' . $opponent->opponent_name . '.',
                        'opponent_id' => $opponent->id,
                        'opponent_name' => $opponent->opponent_name.' - '.($value->places ? $value->places->place_state : '')], 200);
                } else {
                    
                    $this->response(['message' => 'Fail, could not save place'], 200);
                }
            } else {
                
                $this->response(['message' => 'Fail, validation error '.implode($val->error())], 200);
            }
        }
    }
}

<?php

class Controller_Ajax_Season extends Controller_Ajax {

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Season::validate('create');

            if ($val->run()) {
                $season = Model_Season::forge([
                            'start' => Input::post('start'),
                            'end' => Input::post('end'),
                ]);

                if ($season and $season->save()) {
                    $this->response([   
                        'message' => 'Success, Added place #' . $season->id . '.',
                        'season_id' => $season->id,
                        'season_name' => $season->start.' - '.$season->end], 200);
                } else {
                    $this->response(['message' => 'Fail, could not save season'], 200);
                }
            } else {
                $this->response(['message' => 'Fail, validation error '.implode($val->error())], 200);
            }
        }

    }

}
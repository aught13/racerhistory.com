<?php

class Controller_Ajax_Game_Type extends Controller_Ajax
{

    public function action_create()
    {
        if (Input::method() == 'POST') {
            $val = Model_Game_Type::validate('create');

            if ($val->run()) {
                $game_type = Model_Game_Type::forge([
                        'game_type_name' => Input::post('game_type_name'),
                        'post'           => Input::post('post'),
                        'conf'           => Input::post('conf'),
                        'ind'            => Input::post('ind')
                ]);

                if ($game_type and $game_type->save()) {

                    $this->response(
                        ['message'       => 'Success, Added game type #' . $game_type->id . '.',
                        'game_type_id'   => $game_type->id,
                        'game_type_name' => $game_type->game_type_name, 
                        'ind'            => $game_type->ind],
                        200);
                } else {

                    $this->response(
                        ['message' => 'Fail, could not save type'],
                         200);
                }
            } else {

                $this->response(
                    ['message' => 'Fail, validation error ' . implode($val->error())],
                    200);
            }
        }
    }
}

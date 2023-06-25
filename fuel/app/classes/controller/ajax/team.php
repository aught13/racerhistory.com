<?php

class Controller_Ajax_Team extends Controller_Ajax
{

    public function action_create()
    {
        if (Input::method() == 'POST') {
            $val = Model_Team::validate('create');

            if ($val->run()) {
                $team = Model_Team::forge([
                        'sport_id'         => Input::post('sport_id'),
                        'team_name'        => Input::post('team_name'),
                        'team_description' => Input::post('team_description'),
                        'abbr'             => Input::post('abbr'),
                        'gender'           => Input::post('gender'),
                ]);

                if ($team and $team->save()) {
                    $this->response([
                        'message'   => 'Success, Added team #' . $team->id . '.',
                        'team_id'   => $team->id,
                        'team_name' => $team->team_name], 200);
                } else {
                    $this->response(['message' => 'Fail, could not save team'],
                                    200);
                }
            } else {
                $this->response([
                    'message' => 'Fail, validation error ' . implode($val->error())],
                    200);
            }
        }
    }
}

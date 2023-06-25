<?php

class Controller_Ajax_Site extends Controller_Ajax
{

    public function action_create()
    {
        if (Input::method() == 'POST') {
            $val = Model_Site::validate('create');

            if ($val->run()) {
                $site = Model_Site::forge([
                        'place_id'   => Input::post('place_id'),
                        'site_name'  => Input::post('site_name'),
                        'capacity'   => Input::post('capacity'),
                        'site_image' => Input::post('site_image'),
                        'site_info'  => Input::post('site_info'),
                ]);

                if ($site and $site->save()) {
                    Session::set_flash('success',
                                       e('Added site #' . $site->id . '.'));
                    $this->response(
                        [
                            'message'   => 'Success, Added site #' . $site->id . '.',
                            'site_id'   => $site->id,
                            'site_name' => $site->site_name], 200
                    );
                } else {

                    $this->response(
                        ['message' => 'Fail, could not save place'], 200
                    );
                }
            } else {

                $this->response([
                    'message' => 'Fail, validation error ' . 
                        implode($val->error())],
                    200
                );
            }
        }
    }
}

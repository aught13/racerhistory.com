<?php

class Controller_Site extends Controller_Template
{

    public function action_index()
    {
        $data['sites']           = Model_Site::find('all');
        $this->template->title   = "Sites";
        $this->template->content = View::forge('site/index', $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('site');

        if (!$data['site'] = Model_Site::find($id)) {
            Session::set_flash('error', 'Could not find site #' . $id);
            Response::redirect('site');
        }

        $this->template->title   = "Site";
        $this->template->content = View::forge('site/view', $data);
    }

    public function action_create()
    {
        if (Input::method() == 'POST') {
            $val = Model_Site::validate('create');

            if ($val->run()) {
                $site = Model_Site::forge(array(
                        'id'         => Input::post('id'),
                        'place_id'   => Input::post('place_id'),
                        'site_name'  => Input::post('site_name'),
                        'capacity'   => Input::post('capacity'),
                        'site_image' => Input::post('site_image'),
                        'site_info'  => Input::post('site_info'),
                ));

                if ($site and $site->save()) {
                    Session::set_flash('success', 'Added site #' . $site->id . '.');

                    Response::redirect('site');
                } else {
                    Session::set_flash('error', 'Could not save site.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title   = "Sites";
        $this->template->content = View::forge('site/create');
    }

    public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('site');

        if (!$site = Model_Site::find($id)) {
            Session::set_flash('error', 'Could not find site #' . $id);
            Response::redirect('site');
        }

        $val = Model_Site::validate('edit');

        if ($val->run()) {
            $site->id         = Input::post('id');
            $site->place_id   = Input::post('place_id');
            $site->site_name  = Input::post('site_name');
            $site->capacity   = Input::post('capacity');
            $site->site_image = Input::post('site_image');
            $site->site_info  = Input::post('site_info');

            if ($site->save()) {
                Session::set_flash('success', 'Updated site #' . $id);

                Response::redirect('site');
            } else {
                Session::set_flash('error', 'Could not update site #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $site->id         = $val->validated('id');
                $site->place_id   = $val->validated('place_id');
                $site->site_name  = $val->validated('site_name');
                $site->capacity   = $val->validated('capacity');
                $site->site_image = $val->validated('site_image');
                $site->site_info  = $val->validated('site_info');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('site', $site, false);
        }

        $this->template->title   = "Sites";
        $this->template->content = View::forge('site/edit');
    }

    public function action_delete($id = null)
    {
        is_null($id) and Response::redirect('site');

        if ($site = Model_Site::find($id)) {
            $site->delete();

            Session::set_flash('success', 'Deleted site #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete site #' . $id);
        }

        Response::redirect('site');
    }
}

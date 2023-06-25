<?php

class Controller_Place extends Controller_Template
{

    public function action_index()
    {
        $data['places']          = Model_Place::find('all');
        $this->template->title   = "Places";
        $this->template->content = View::forge('place/index', $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('place');

        if (!$data['place'] = Model_Place::find($id)) {
            Session::set_flash('error', 'Could not find place #' . $id);
            Response::redirect('place');
        }

        $this->template->title   = "Place";
        $this->template->content = View::forge('place/view', $data);
    }
}

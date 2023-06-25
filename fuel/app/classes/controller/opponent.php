<?php

class Controller_Opponent extends Controller_Template
{

    public function action_index()
    {
        $data['opponents']       = Model_Opponent::find('all');
        $this->template->title   = "Opponents";
        $this->template->content = View::forge('opponent/index', $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('opponent');

        if (!$data['opponent'] = Model_Opponent::find($id)) {
            Session::set_flash('error', 'Could not find opponent #' . $id);
            Response::redirect('opponent');
        }

        $this->template->title   = "Opponent";
        $this->template->content = View::forge('opponent/view', $data);
    }
}

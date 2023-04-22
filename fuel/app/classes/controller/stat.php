<?php

class Controller_Stat extends Controller_Template {

    public function action_index() {
        $data['stats'] = Model_Stat::find('all');
        $this->template->title = "Stats";
        $this->template->content = View::forge('stat/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('stat');

        if (!$data['stat'] = Model_Stat::find($id)) {
            Session::set_flash('error', 'Could not find stat #' . $id);
            Response::redirect('stat');
        }

        $this->template->title = "Stat";
        $this->template->content = View::forge('stat/view', $data);
    }

}

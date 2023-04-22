<?php

class Controller_Game_Type extends Controller_Template {

    public function action_index() {
        $data['game_types'] = Model_Game_Type::find('all');
        $this->template->title = "Game_types";
        $this->template->content = View::forge('game/type/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('game/type');

        if (!$data['game_type'] = Model_Game_Type::find($id)) {
            Session::set_flash('error', 'Could not find game_type #' . $id);
            Response::redirect('game/type');
        }

        $this->template->title = "Game_type";
        $this->template->content = View::forge('game/type/view', $data);
    }

}

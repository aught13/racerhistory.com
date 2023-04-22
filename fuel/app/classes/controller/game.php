<?php

class Controller_Game extends Controller_Template {

    public function action_index() {
        $data['games'] = Model_Game::find('all');
        $this->template->title = "Games";
        $this->template->content = View::forge('game/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('game');

        if (!$data['game'] = Model_Game::find($id)) {
            Session::set_flash('error', 'Could not find game #' . $id);
            Response::redirect('game');
        }

        $this->template->title = "Game";
        $this->template->content = View::forge('game/view', $data);
    }

}

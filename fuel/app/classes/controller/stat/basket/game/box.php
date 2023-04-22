<?php

class Controller_Stat_Basket_Game_Box extends Controller_Template {

    public function action_index() {
        $data['stat_basket_game_boxes'] = Model_Stat_Basket_Game_Box::find('all');
        $this->template->title = "Stat_basket_game_boxes";
        $this->template->content = View::forge('stat/basket/game/box/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('stat/basket/game/box');

        if (!$data['stat_basket_game_box'] = Model_Stat_Basket_Game_Box::find($id)) {
            Session::set_flash('error', 'Could not find stat_basket_game_box #' . $id);
            Response::redirect('stat/basket/game/box');
        }

        $this->template->title = "Stat_basket_game_box";
        $this->template->content = View::forge('stat/basket/game/box/view', $data);
    }

}

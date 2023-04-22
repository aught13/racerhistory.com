<?php

class Controller_Stat_Basket_Game_Team extends Controller_Template {

    public function action_index() {
        $data['stat_basket_game_teams'] = Model_Stat_Basket_Game_Team::find('all');
        $this->template->title = "Stat_basket_game_teams";
        $this->template->content = View::forge('stat/basket/game/team/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('stat/basket/game/team');

        if (!$data['stat_basket_game_team'] = Model_Stat_Basket_Game_Team::find($id)) {
            Session::set_flash('error', 'Could not find stat_basket_game_team #' . $id);
            Response::redirect('stat/basket/game/team');
        }

        $this->template->title = "Stat_basket_game_team";
        $this->template->content = View::forge('stat/basket/game/team/view', $data);
    }

}

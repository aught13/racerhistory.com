<?php

class Controller_Stat_Basket_Game_Person extends Controller_Template {

    public function action_index() {
        $data['stat_basket_game_people'] = Model_Stat_Basket_Game_Person::find('all');
        $this->template->title = "Stat_basket_game_people";
        $this->template->content = View::forge('stat/basket/game/person/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('stat/basket/game/person');

        if (!$data['stat_basket_game_person'] = Model_Stat_Basket_Game_Person::find($id)) {
            Session::set_flash('error', 'Could not find stat_basket_game_person #' . $id);
            Response::redirect('stat/basket/game/person');
        }

        $this->template->title = "Stat_basket_game_person";
        $this->template->content = View::forge('stat/basket/game/person/view', $data);
    }

}

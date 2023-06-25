<?php

class Controller_Stat_Basket_Game_Opponent extends Controller_Template
{

    public function action_index()
    {
        $data['stat_basket_game_opponents'] = Model_Stat_Basket_Game_Opponent::find('all');
        $this->template->title              = "Stat_basket_game_opponents";
        $this->template->content            = View::forge('stat/basket/game/opponent/index',
                                                          $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('stat/basket/game/opponent');

        if (!$data['stat_basket_game_opponent'] = Model_Stat_Basket_Game_Opponent::find($id)) {
            Session::set_flash('error',
                               'Could not find stat_basket_game_opponent #' . $id);
            Response::redirect('stat/basket/game/opponent');
        }

        $this->template->title   = "Stat_basket_game_opponent";
        $this->template->content = View::forge('stat/basket/game/opponent/view',
                                               $data);
    }
}

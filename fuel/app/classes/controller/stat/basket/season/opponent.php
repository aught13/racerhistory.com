<?php

class Controller_Stat_Basket_Season_Opponent extends Controller_Template
{

    public function action_index()
    {
        $data['stat_basket_season_opponents'] = Model_Stat_Basket_Season_Opponent::find('all');
        $this->template->title                = "Stat_basket_season_opponents";
        $this->template->content              = View::forge('stat/basket/season/opponent/index',
                                                            $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('stat/basket/season/opponent');

        if (!$data['stat_basket_season_opponent'] = Model_Stat_Basket_Season_Opponent::find($id)) {
            Session::set_flash('error',
                               'Could not find stat_basket_season_opponent #' . $id);
            Response::redirect('stat/basket/season/opponent');
        }

        $this->template->title   = "Stat_basket_season_opponent";
        $this->template->content = View::forge('stat/basket/season/opponent/view',
                                               $data);
    }
}

<?php

class Controller_Stat_Basket_Season_Team extends Controller_Template
{

    public function action_index()
    {
        $data['stat_basket_season_teams'] = Model_Stat_Basket_Season_Team::find('all');
        $this->template->title            = "Stat_basket_season_teams";
        $this->template->content          = View::forge('stat/basket/season/team/index',
                                                        $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('stat/basket/season/team');

        if (!$data['stat_basket_season_team'] = Model_Stat_Basket_Season_Team::find($id)) {
            Session::set_flash('error',
                               'Could not find stat_basket_season_team #' . $id);
            Response::redirect('stat/basket/season/team');
        }

        $this->template->title   = "Stat_basket_season_team";
        $this->template->content = View::forge('stat/basket/season/team/view',
                                               $data);
    }
}

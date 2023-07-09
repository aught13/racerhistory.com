<?php

class Controller_Stat_Basket_Season_Person extends Controller_Template
{

    public function action_index()
    {
        $data['player_season_stats'] = new Data_Stat_Basket_Season_Person();
        $data['flag'] = false;

        $this->template->title   = "Player Season Stats";        
        $this->template->sidenav = \View::forge('stat/basket/sidenav');
        $this->template->content = View::forge('stat/basket/career/person/index',
                                               $data, false);
    }

    public function action_view($roster_id = null)
    {
        is_null($roster_id) and Response::redirect('stat/basket/season/person');

        if (!$person = Model_Stat_Basket_Season_Person::find('first',
                                        ['where' => [
                                            ['team_season_roster_id', $roster_id],
                                        ]])) {
            Session::set_flash('error',
                               'Could not find stats');
            Response::redirect('stat/basket/season/person');
        }
        
                
        $this->template->title   = $person->team_season_roster
            ->persons->display .
            ' ' . $person
            ->team_season_roster
            ->team_season->seasons->start .
            '-' . $person
            ->team_season_roster
            ->team_season->seasons->end .
            ' Stats';
        $this->template->content = Data_Personview::getSeason($roster_id);
    }
}

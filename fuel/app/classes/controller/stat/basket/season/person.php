<?php

class Controller_Stat_Basket_Season_Person extends Controller_Template
{

    public function action_index()
    {
        $query = Model_Stat_Basket_Season_Person::query();

        $pagination = Pagination::forge('stat_basket_season_people_pagination',
                                        ['uri_segment' => 'page',]);

        $data['stat_basket_season_people'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title   = "Player Season Stats";
        $this->template->content = View::forge('stat/basket/season/person/index',
                                               $data);
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

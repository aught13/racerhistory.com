<?php

class Controller_Stat_Basket_Season_Person extends Controller_Template {

    public function action_index() {
        $query = Model_Stat_Basket_Season_Person::query();
        
        $pagination = Pagination::forge('stat_basket_season_people_pagination', [
            'uri_segment' => 'page',
        ]);
        
        $data['stat_basket_season_people'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
            
        $this->template->set_global('pagination', $pagination, false);
        
        $this->template->title   = "Player Season Stats";
        $this->template->content = View::forge('stat/basket/season/person/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('stat/basket/season/person');

        if (!$data['stat_basket_season_person'] = Model_Stat_Basket_Season_Person::find($id)) {
            Session::set_flash('error', 'Could not find stat_basket_season_person #' . $id);
            Response::redirect('stat/basket/season/person');
        }

        $this->template->title = "Stat_basket_season_person";
        $this->template->content = View::forge('stat/basket/season/person/view', $data);
    }

}

<?php

class Controller_Stat_Basket_Season_Person extends Controller_Template {

    public function action_index() {
        $data['stat_basket_season_people'] = Model_Stat_Basket_Season_Person::find('all');
        $this->template->title = "Stat_basket_season_people";
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

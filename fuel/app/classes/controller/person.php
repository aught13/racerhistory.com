<?php

class Controller_Person extends Controller_Template
{

    public function action_index()
    {
        $data['people']          = Model_Person::find('all');
        $this->template->title   = "People";
        $this->template->content = View::forge('person/index', $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('person');

        if (!$data['person'] = Model_Person::find($id)) {
            Session::set_flash('error', 'Could not find person #' . $id);
            Response::redirect('person');
        }
        foreach ($data['person']->team_season_roster as $season) {
            $stats = Data_Personview::getStats($season->person_id);
        }
        $data['career'] = new Data_Stat_Basket_Career_Person($id);

        $this->template->set_global('stats', $stats, false);

        $this->template->title   = "Person";
        $this->template->content = View::forge('person/view', $data, false);
    }
}

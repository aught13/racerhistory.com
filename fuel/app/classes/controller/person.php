<?php

class Controller_Person extends Controller_Template
{

    public function action_index()
    {
        $data['people']          = Model_Person::find('all');
        foreach ($data['people'] as $value) {
            $data['teams'][$value->id] = Data_Personview::getTeams($value->id);
        }
        $this->template->title   = "People";
        $this->template->content = View::forge('person/index', $data, false);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('person');

        if (!$data['person'] = Model_Person::find($id)) {
            Session::set_flash('error', 'Could not find person #' . $id);
            Response::redirect('person');
        }
        
        $stats = false;
//        Get stat columns
        foreach ($data['person']->team_season_roster as $season) {
            if ($stats) {
                $stats = Data_Personview::getStats($season->id, $stats);
            } else {
                $stats = Data_Personview::getStats($season->id);
            }
        }
//        Get stat data
//        Season game stat tables
        foreach ($data['person']->team_season_roster as $season) {
            if ($games = Data_Personview::getSeason($season->id, $stats)) {
                $data['games']
                    [$season->team_season->seasons->start .
                        '-' . $season->team_season->seasons->end] = $games;
            }
        }
//        Season Career stat table
        $data['career'] = Data_Personview::getCareer($data['person'], $stats);
//        Get Teams and years active
        $data['teams'] = Data_Personview::getTeams($id);

        $this->template->title   = $data['person']->full;
        $this->template->content = View::forge('person/view', $data, false);
    }
}

<?php

class Controller_Team_Season extends Controller_Template
{

    public function action_index($team = null)
    {
        $query = $team == null ?
            Model_Team_Season::query()
                ->related('seasons')
                ->order_by('seasons.start', 'desc') :
            Model_Team_Season::query()
                ->where('team_id', $team)->related('seasons')
                ->order_by('seasons.start', 'desc');

        $pagination = Pagination::forge(
                'team_seasons_pagination',
                ['total_items' => $query->count(),
                    'uri_segment' => 'page']
        );

        $seasons = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();

        $data['team_seasons'] = $seasons;

        $this->template->set_global(
            'records', Model_Game::getRecords('team', 'index', $seasons)
        );
        $this->template->set_global('pagination', $pagination, false);

        $this->template->title   = "Team Seasons";
        $this->template->content = View::forge('team/season/index', $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('team/season');

        if (!$data = Model_Team_Season::find($id)) {
            Session::set_flash('error', 'Could not find team_season #' . $id);
            Response::redirect('team/season');
        }

        $this->template->set_global('team_season', $data, false);
        $this->template->set_global('record', 
                                    Model_Game::getRecords('team', 
                                                           'season', 
                                                           $id)
        );
        $this->template
            ->set_global('stats', Data_Seasonview::getStats($id), false);
        $this->template
            ->set_global(
                'title',
                $data->semester == 1 ?
                    $data->seasons->start : ($data->semester == 2 ?
                        $data->seasons->start . '-' . $data->seasons->end :
                        $data->seasons->end) . ' - ' . $data->teams->team_name
            );

        $this->template->content = View::forge('team/season/view');
    }
}

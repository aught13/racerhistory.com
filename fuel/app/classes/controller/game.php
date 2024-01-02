<?php

class Controller_Game extends Controller_Template
{

    private $data = [];

    public function action_index()
    {
        Response::redirect('game/all/2');
    }
    
    public function action_all($team_id = null)
    {
        is_null($team_id) and Response::redirect('team/season/');
        
        $query = Model_Game::query()
            ->related('team_season')
            ->related('team_season.teams')
            ->where('team_season.teams.id', $team_id)->where('pts_mur', '>', 0);

        $this->data['games'] = Model_game::calculate_streaks($query->get());

        $this->template->title = "Games";
        $this->template->content = View::forge('game/index', $this->data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('game');
        $this->data = Data_Gameview::getData($id) ?? Response::redirect('game');

        $this->template->title = $this->data['game']->team_season->teams->team_name .
            ' ' . $this->data['game']->team_season->seasons->start .
            '-' . $this->data['game']->team_season->seasons->end .
            ' ' . ($this->data['game']->hrn == 1 ?
                'Vs' : ($this->data['game']->hrn == 2 ?
                '@' :
                'Vs')) .
            ' ' . $this->data['game']->opponents->opponent_name .
            ' - ' .
            date_format(date_create($this->data['game']->game_date), "m/d/Y");
        $this->template->sidenav = View::forge('game/sidenav', $this->data, false);
        $this->template->content = View::forge('game/view', $this->data, false);
    }
}

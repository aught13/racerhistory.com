<?php

class Controller_Game extends Controller_Template
{

    private $data = [];

    public function action_index($team_id)
    {
        // Get the team_id from the query string
        is_null($team_id) and Response::redirect('team/season/');

        // Get all games for the specified team
        $games = Model_Game::query()
            ->related('team_season')
            ->related('team_season.team')
            ->where('team_season.team.id', $team_id)
            ->get();

        // Pass the games to the view
        $this->template->content = View::forge('games/index', ['games' => $games]);
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

<?php

class Controller_Game extends Controller_Template
{

    private $data = [];

    public function action_index()
    {
        Fuel\Core\Response::redirect('team/season/');
//        $data['games']           = Model_Game::find('all');
//        $this->template->title   = "Games";
//        $this->template->content = View::forge('game/index', $data);
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
        
        $this->template->content = View::forge('game/view', $this->data, false);
    }
}

<?php

class Controller_Admin_Opponent extends Controller_Admin {

    public function action_index() {
        $query = Model_Opponent::query();

        $data['opponents'] = $query->get();

        $this->template->title = "Opponents";
        $this->template->content = View::forge('admin/opponent/index', $data);
    }

    public function action_view($id = null) {
        $data['opponent'] = Model_Opponent::find($id);

        $this->template->title = "Opponent";
        $this->template->content = View::forge('admin/opponent/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Opponent::validate('create');

            if ($val->run()) {
                $opponent = Model_Opponent::forge([
                    'opponent_name' => Input::post('opponent_name'),
                    'opponent_mascot' => Input::post('opponent_mascot'),
                    'opponent_current' => (int)Input::post('opponent_current') ,
                    'opponent_short' => Input::post('opponent_short'),
                    'opponent_abbr' => Input::post('opponent_abbr'),
                    'place_id' => Input::post('place_id')
                ]);

                if ($opponent and $opponent->save()) {
                    Session::set_flash('success', e('Added opponent #' . $opponent->id . '.'));

                    Response::redirect('admin/opponent');
                } else {
                    Session::set_flash('error', e('Could not save opponent.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Opponents";
        $this->template->content = View::forge('admin/opponent/create', $this->set_ops(), false);
    }

    public function action_edit($id = null) {
        $opponent = Model_Opponent::find($id);
        $val = Model_Opponent::validate('edit');

        if ($val->run()) {
            $opponent->opponent_name = Input::post('opponent_name');
            $opponent->opponent_mascot = Input::post('opponent_mascot');
            $opponent->opponent_current = (int)Input::post('opponent_current');
            $opponent->opponent_short = Input::post('opponent_short');
            $opponent->opponent_abbr = Input::post('opponent_abbr');
            $opponent->place_id = Input::post('place_id');

            if ($opponent->save()) {
                Session::set_flash('success', e('Updated opponent #' . $id));

                Response::redirect('admin/opponent');
            } else {
                Session::set_flash('error', e('Could not update opponent #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $opponent->opponent_name = $val->validated('opponent_name');
                $opponent->opponent_mascot = $val->validated('opponent_mascot');
                $opponent->opponent_current = $val->validated('opponent_current');
                $opponent->opponent_short = $val->validated('opponent_short');
                $opponent->opponent_abbr = $val->validated('opponent_abbr');
                $opponent->place_id = Input::post('place_id');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('opponent', $opponent, false);
        }

        $this->template->title = "Opponents";
        $this->template->content = View::forge('admin/opponent/edit', $this->set_ops(), false);
    }

    public function action_delete($id = null) {
        if ($opponent = Model_Opponent::find($id)) {
            $opponent->delete();

            Session::set_flash('success', e('Deleted opponent #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete opponent #' . $id));
        }

        Response::redirect('admin/opponent');
    }
    
    private static function set_ops() {
        $data = [
            'places' => [0=>'N/A'],
            'opp' => [0=>'']];
        $places = Model_Place::find('all', ['order_by' => ['place_name'=>'asc']]);
        foreach ($places as $value) {
            $data['places'][$value->id] = $value->place_name.', '.$value->place_state;
        }
        $opponents = Model_Opponent::find('all', ['order_by' => ['opponent_name'=>'asc']]);
        foreach ($opponents as $value) {
            $data['opp'][$value->id] = $value->opponent_name.' - '.($value->places ? $value->places->place_state : 'N/A');
        }
        
        return $data;
    }

}

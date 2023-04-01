<?php

class Controller_Admin_Stat_Basket_Game_Box extends Controller_Admin {

    public function action_index() {
        $query = Model_Stat_Basket_Game_Box::query();

        $pagination = Pagination::forge('stat_basket_game_boxes_pagination', [
                    'uri_segment' => 'page',
        ]);

        $data['stat_basket_game_boxes'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Stats - Basketball Game Box";
        $this->template->content = View::forge('admin/stat/basket/game/box/index', $data);
    }

    public function action_view($id = null) {
        $data['stat_basket_game_box'] = Model_Stat_Basket_Game_Box::find($id);

        $this->template->title = "Stats - Basketball Game Box";
        $this->template->content = View::forge('admin/stat/basket/game/box/view', $data);
    }

    public function action_create($id = null) {
        $game = Model_Game::find($id);
        if (Input::method() == 'POST') {
            $val = Model_Stat_Basket_Game_Box::validate('create');

            if ($val->run() && $this->noDup(Input::post('opponent_id'), Input::post('game_id'), Input::post('period'))) {
                $stat_basket_game_box = Model_Stat_Basket_Game_Box::forge([
                            'game_id' => Input::post('game_id'),
                            'opponent_id' => Input::post('opponent_id'),
                            'period' => Input::post('period'),
                            'FGM' => Input::post('FGM'),
                            'FGA' => Input::post('FGA'),
                            'TPM' => Input::post('TPM'),
                            'TPA' => Input::post('TPA'),
                            'FTM' => Input::post('FTM'),
                            'FTA' => Input::post('FTA'),
                            'ORB' => Input::post('ORB'),
                            'DRB' => Input::post('DRB'),
                            'RB' => Input::post('RB'),
                            'AST' => Input::post('AST'),
                            'STL' => Input::post('STL'),
                            'BS' => Input::post('BS'),
                            'TRN' => Input::post('TRN'),
                            'PF' => Input::post('PF'),
                            'TF' => Input::post('TF'),
                            'PTS' => Input::post('PTS'),
                            'PNT' => Input::post('PNT'),
                            'OTO' => Input::post('OTO'),
                            'SND' => Input::post('SND'),
                            'FB' => Input::post('FB'),
                            'BN' => Input::post('BN'),
                            'TIED' => Input::post('TIED'),
                            'LC' => Input::post('LC'),
                ]);

                if ($stat_basket_game_box and $stat_basket_game_box->save()) {
                    Session::set_flash('success', e('Added Game Box #' . $stat_basket_game_box->id . '.'));
                    Response::redirect('admin/game/view/' . $game->id);
                } else {
                    Session::set_flash('error', e('Could not save Game Box.'));
                }
            } else {
                Session::set_flash('error', ($val->error() ? $val->error() : (!$this->noDup(Input::post('opponent_id'), Input::post('game_id'), Input::post('period')) ? "Duplicate entry" : '')));
            }
        }

        isset($game) ? $this->template->set_global('periods', $this->setPers($id), false) : '';
        isset($game) ? $this->template->set_global('game', $game, false) : '';

        $this->template->title = "Stats - Basketball Game Box";
        $this->template->content = View::forge('admin/stat/basket/game/box/create');
    }

    public function action_edit($id = null) {
        $stat_basket_game_box = Model_Stat_Basket_Game_Box::find($id);
        $game = Model_Game::find($stat_basket_game_box->game_id);
        $val = Model_Stat_Basket_Game_Box::validate('edit');

        if ($val->run() && $this->noDup(Input::post('opponent_id'), Input::post('game_id'), Input::post('period'), $stat_basket_game_box)) {
            $stat_basket_game_box->game_id = Input::post('game_id');
            $stat_basket_game_box->period = Input::post('period');
            $stat_basket_game_box->FGM = Input::post('FGM');
            $stat_basket_game_box->FGA = Input::post('FGA');
            $stat_basket_game_box->TPM = Input::post('TPM');
            $stat_basket_game_box->TPA = Input::post('TPA');
            $stat_basket_game_box->FTM = Input::post('FTM');
            $stat_basket_game_box->FTA = Input::post('FTA');
            $stat_basket_game_box->ORB = Input::post('ORB');
            $stat_basket_game_box->DRB = Input::post('DRB');
            $stat_basket_game_box->RB = Input::post('RB');
            $stat_basket_game_box->AST = Input::post('AST');
            $stat_basket_game_box->STL = Input::post('STL');
            $stat_basket_game_box->BS = Input::post('BS');
            $stat_basket_game_box->TRN = Input::post('TRN');
            $stat_basket_game_box->PF = Input::post('PF');
            $stat_basket_game_box->TF = Input::post('TF');
            $stat_basket_game_box->PTS = Input::post('PTS');
            $stat_basket_game_box->PNT = Input::post('PNT');
            $stat_basket_game_box->OTO = Input::post('OTO');
            $stat_basket_game_box->SND = Input::post('SND');
            $stat_basket_game_box->FB = Input::post('FB');
            $stat_basket_game_box->BN = Input::post('BN');
            $stat_basket_game_box->TIED = Input::post('TIED');
            $stat_basket_game_box->LC = Input::post('LC');

            if ($stat_basket_game_box->save()) {
                Session::set_flash('success', e('Updated Game Box #' . $id));
                Response::redirect('admin/game/view/' . $game->id);
            } else {
                Session::set_flash('error', e('Could not update Game Box #' . $id));
            }
        } else {

            if (Input::method() == 'POST') {
                $stat_basket_game_box->game_id = $val->validated('game_id');
                $stat_basket_game_box->period = $val->validated('period');
                $stat_basket_game_box->FGM = $val->validated('FGM');
                $stat_basket_game_box->FGA = $val->validated('FGA');
                $stat_basket_game_box->TPM = $val->validated('TPM');
                $stat_basket_game_box->TPA = $val->validated('TPA');
                $stat_basket_game_box->FTM = $val->validated('FTM');
                $stat_basket_game_box->FTA = $val->validated('FTA');
                $stat_basket_game_box->ORB = $val->validated('ORB');
                $stat_basket_game_box->DRB = $val->validated('DRB');
                $stat_basket_game_box->RB = $val->validated('RB');
                $stat_basket_game_box->AST = $val->validated('AST');
                $stat_basket_game_box->STL = $val->validated('STL');
                $stat_basket_game_box->BS = $val->validated('BS');
                $stat_basket_game_box->TRN = $val->validated('TRN');
                $stat_basket_game_box->PF = $val->validated('PF');
                $stat_basket_game_box->TF = $val->validated('TF');
                $stat_basket_game_box->PTS = $val->validated('PTS');
                $stat_basket_game_box->PNT = $val->validated('PNT');
                $stat_basket_game_box->OTO = $val->validated('OTO');
                $stat_basket_game_box->SND = $val->validated('SND');
                $stat_basket_game_box->FB = $val->validated('FB');
                $stat_basket_game_box->BN = $val->validated('BN');
                $stat_basket_game_box->TIED = $val->validated('TIED');
                $stat_basket_game_box->LC = $val->validated('LC');

                Session::set_flash('error', ($val->error() ? $val->error() : (!$this->noDup(Input::post('opponent_id'), Input::post('game_id'), Input::post('period')) ? "Duplicate entry" : '')));
            }

            $this->template->set_global('stat_basket_game_box', $stat_basket_game_box, false);
        }
        isset($game) ? $this->template->set_global('periods', $this->setPers($game->id), false) : '';
        isset($game) ? $this->template->set_global('game', $game, false) : '';

        $this->template->title = "Stats - Basketball Game Box";
        $this->template->content = View::forge('admin/stat/basket/game/box/edit');
    }

    public function action_delete($id = null) {
        if ($stat_basket_game_box = Model_Stat_Basket_Game_Box::find($id)) {
            $stat_basket_game_box->delete();

            Session::set_flash('success', e('Deleted Game Box #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete Game Box #' . $id));
        }

        Response::redirect('admin/stat/basket/game/box');
    }

    private static function setPers($id = null) {
        $game = Model_Game::find($id);
        if ($game) {
            $i = $game->periods;
            $periods['Z'] = 'Final';
            while ($i > 0) {
                $periods[$i] = Inflector::ordinalize($i);
                --$i;
            }
            $i = $game->ot;
            while ($i > 0) {
                $periods['OT ' . $i] = Inflector::ordinalize($i) . ' OT';
                --$i;
            }
        }

        return $periods;
    }

    private static function noDup($param1, $param2, $param3, $edit = false) {
        if ($edit) {
            if ($edit->opponent_id == $param1 && $edit->period == $param3) {
                return true;
            }
        }
        if (Model_Stat_Basket_Game_Box::query()->where(['opponent_id' => $param1, 'game_id' => $param2, 'period' => $param3])->count() == 0) {
            return true;
        } else {
            return false;
        }
    }

}

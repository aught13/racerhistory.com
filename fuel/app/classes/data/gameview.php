<?php

/**
 * Data_Gameview
 *
 * @author Patrick Foltz
 */
class Data_Gameview
{

    public static function getStats($game)
    {
        $stats = [];
        $query = Model_Game::find($game);
        if ($query->person_box) {
            foreach ($query->person_box as $result) {
                foreach ($result as $key => $value) {
                    if ($value >= 0) {
                        $stats[$key] = true;
                    }
                }
            }
        }
        if ($query->game_box_mur) {
            foreach ($query->game_box_mur as $result) {
                foreach ($result as $key => $value) {
                    if (!empty($value) || $value == '0') {
                        $stats[$key] = true;
                    }
                }
            }
        }

        return $stats;
    }

    public static function getTechs($game)
    {
        $techs = [];
        $opp   = Model_Stat_Basket_Game_Box::query()
            ->where('game_id', $game)
            ->and_where_open()
            ->where('opponent_id', '>', 0)
            ->where('period', 'Z')
            ->where('TF', '>', 0)
            ->and_where_close()->get_one()
            ?? false;
        if ($opp) {
            $query = Model_Stat_Basket_Game_Opponent::query()
                ->where('game_id', $game)
                ->and_where_open()
                ->where('TF', '>', 0)
                ->where('period', 'Z')
                ->and_where_close();
            $q     = 0;
            $w     = 0;
            foreach ($query->get() as $value) {
                $techs['opp'][$value->name] = $value->TF;
                $q                          += $value->TF;
                $w++;
            }
            if ($q < $opp->TF) {
                $techs['opp']['TEAM'] = $opp->TF - $q;
                $w++;
            }
            $techs['opptot'] = $opp->TF;
            $techs['oppcnt'] = $w;
        }
        $mur = Model_Stat_Basket_Game_Box::query()
            ->where('game_id', $game)
            ->and_where_open()
            ->where('opponent_id', 0)
            ->where('period', 'Z')
            ->where('TF', '>', 0)
            ->and_where_close()->get_one() ?? false;
        if ($mur) {
            $query = Model_Stat_Basket_Game_Person::query()
                ->where('game_id', $game)
                ->and_where_open()
                ->where('TF', '>', 0)
                ->where('period', 'Z')
                ->and_where_close();
            $e     = 0;
            $r     = 0;
            foreach ($query->get() as $value) {
                $techs['mur'][$value->name] = $value->TF;
                $r                          += $value->TF;
                $e++;
            }
            if ($r < $mur->TF) {
                $techs['mur']['TEAM'] = ($mur->TF - $r);
                $e++;
            }
            $techs['murtot'] = $mur->TF;
            $techs['murcnt'] = $e;
        }

        return $techs;
    }

    public static function getData($game)
    {

        $data = [];

        if (!$gamedata = Model_Game::find($game)) {
            return null;
        }
        $data['techs'] = Data_Gameview::getTechs($game);
        $data['stats'] = Data_Gameview::getStats($game);
        $data['game']  = $gamedata;

        return $data;
    }
}

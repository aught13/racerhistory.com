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
                    if (!empty($value) || $value == '0') {
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
                $techs['mur'][$value->team_season_roster->persons->display] = $value->TF;
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
        $data['nav']   = Data_Gameview::getNav($game);

        return $data;
    }
    /*  
     * getNav
     * 
     * var $game = int Model_Game id
     * var $team = int Model_team_Season team_id
     * 
     * Fetch all game id and date by a given team ordered by date
     * retrieve the rows before and after for next/prev navigation
     * 
     * returns $data['previous' => int, 'current => int, 'next' => int]
     * 
     * seems like there should be a more elegant solution but it gets the job done
     * 
     */
    
    public static function getNav($game)
    {        
        $games = Model_Game::query()
            ->select('id' , 'game_date')
            ->order_by('game_date', 'ASC')
            ->from_cache(false)
            ->get();
        
//      loop over $games 
//      set 'next' and return $data[] array if 'current' is set
//      set 'current' and skip to the next iteration if matching to $game
//      set 'previous' otherwise
// 
//      loop ends when 'previous', 'next', and 'current' or no more rows
        if ($games) {
            foreach ($games as $value) {
                if (isset($data['current']) ?? false){
                    $data['next'] = $value->id;
                    return $data;
                }
                if ($value->id == $game) {
                    $data['current'] = $value->id;
                    continue;
                }
                $data['previous'] = $value->id;
            }
//      if we couldn't set 'next' or 'previous' we still return what we have 
            return $data;
        }
//      if there was somehting to return we wouldn't be here - return false
        return false;        
    }
}

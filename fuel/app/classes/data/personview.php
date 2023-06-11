<?php

/*
 * Copyright (C) 2023 patrick
 *
 
 */

/**
 * Description of personview
 *
 * @author patrick
 */
class Data_Personview {
    
    public function getTeams($person) {
        
        
    }
    
    public static function getStats($person = null) {
        $stats = [];
        
        $query_games = Model_Team_Season_Roster::find($person);
        if ($query_games->count() > 0) {
            foreach ($query_games->stat_basket_season_person as $key => $value) {
                if ($value >= 0) {
                    $stats[$key] = true;
                }
            }
        }

        return $stats;
    }
}

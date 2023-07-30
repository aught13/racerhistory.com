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
class Data_Personview
{

    public static function getTeams($person = null)
    {
        $rosters = [];
        $teams = [];
        $starts = [];
        $ends = [];        
        $query_teams = Model_Team_Season_Roster::find(
                'all', 
                [
                    'where'      => [
                        'person_id'    => $person
                    ],
                    'from_cache' => false,
                ]);
        if ($query_teams) {
            foreach ($query_teams as $value) {
                $value->team_season->seasons->end ? $rosters[$value->team_season->seasons->end] = $value : '';
                $teams[] = $value->team_season->teams->team_name;
                $value->team_season->semester == 1 || 2 ?
                    $starts[] = intval($value->team_season->seasons->start) : '';
                $value->team_season->semester == 2 || 3 ?
                    $ends[]   = intval($value->team_season->seasons->end) : '';
            }
        }
        ksort($rosters);
        $data['rosters'] = $rosters;
        $data['teams']   = array_unique($teams ?? []);
        $starts ?? false && $ends ?? false ? 
            $data['seasons'] = min($starts).' - '.max($ends) : 
                ($starts ?? false && count($starts) > 1 ? 
                    $data['seasons'] = min($starts).' - '.max($starts) : 
                        ($starts ?? false ? 
                            $data['seasons'] = min($starts) : 
                                ($ends ?? false && count($ends) > 1 ? 
                                    $data['seasons'] = min($ends).' - '.max($ends) : 
                                        ($ends ?? false ? 
                                            $data['seasons'] = min($ends) : 
                                                ''
                                        )
                                )
                        )
                );
        $starts ?? false && $ends ?? false ? $starts[] = max($ends) : '';
        $starts ?? false ? asort($starts) : '';
        $starts ?? false ? $data['years'] = $starts : $data['years'] = $ends;
        
        return $data;
    }

    public static function getStats($person = null, $data = null)
    {
        $stats = $data ?? [];

        $query_games = Model_Stat_Basket_Season_Person::find(
                'first',
                ['where' => [
                        ['team_season_roster_id', $person],
                    ],
                 'from_cache' => false]
            );
        if ($query_games) {
            foreach ($query_games as $key => $value) {
                if ($value >= 0) {
                    $stats[$key] = true;
                }
            }
        }

        return $stats;
    }

    public static function getSeason($roster_id = null, $stats = null)
    {
        if (!$data['season_person'] = Model_Stat_Basket_Season_Person::find(
                'first',
                ['where' => [
                        ['team_season_roster_id', $roster_id],
                    ]]
            )) {
            return false;
        }
        if (!$data['season_games'] = Model_Stat_Basket_Game_Person::query()
            ->where('team_season_roster_id', $roster_id)
            ->related('games')
            ->order_by(['games.game_date' => 'asc'])
            ->get()) {
            return false;
        }
        $columns = $stats ?? Data_Personview::getStats($roster_id);
        $data['stats'] = $columns;

        return View::forge('stat/basket/season/person/view', $data);
    }
    
    /*
     * getCareer() Build the career stat table for a person
     * 
     * (obj)$person = Model_Person 
     * (arr)$columns = stat columns for display
     * 
     * returns stat/basket/career/person/view
     */
    public static function getCareer($person, $columns)
    {
        if (!$data['career'] = Data_Stat_Basket_Career_Person::find($person->id)) {
            return false;
        }
        $data['season'] = Data_Personview::teamSeasons($person);
        $data['person'] = $person;
        $data['stats']  = $columns;
        return View::forge('stat/basket/career/person/view', $data, false);
    }
    
    /*
     * teamSeasons()
     * (obj)$person = Model_Person
     * 
     * returns sorted array of stat_basket_season_person objects
     */
    public static function teamSeasons($person)
    {
        $data = [];
        if ($person->team_season_roster) {
            foreach ($person->team_season_roster as $value) {
                $data[$value->team_season->seasons->end] = $value->stat_basket_season_person;
            }
            asort($data);
        }
        return $data;
    }
}

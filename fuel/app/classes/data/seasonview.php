<?php

/**
 * Data_Seasonview
 *
 * @author Patrick Foltz
 */
class Data_Seasonview
{

    public static function getStats($season)
    {
        $stats        = [];
        $persons      = [];
        $query_team   = Model_Stat_Basket_Season_Team::query()
            ->where('team_season_id', $season);
        $query_person = Model_Team_Season_Roster::query()
            ->related('stat_basket_season_person')
            ->where('team_season_id', $season)
            ->order_by('stat_basket_season_person.PTS', 'DESC');
        if ($query_person->count() > 0) {
            foreach ($query_person->get() as $result) {
                if ($result->stat_basket_season_person) {
                    $persons[] = $result->stat_basket_season_person;
                    foreach ($result->stat_basket_season_person as $key =>
                            $value) {
                        if (!empty($value) || $value == '0') {
                            $stats[$key] = true;
                        }
                    }
                }
            }
        }
        $stats['person'] = $persons;
        if ($query_team->count() > 0) {
            foreach ($query_team->get() as $result) {
                foreach ($result as $key => $value) {
                    if (!empty($value) || $value == '0') {
                        $stats[$key] = true;
                    }
                }
            }
        }

        return $stats;
    }
    
    public static function getNav($season_id, $team)
        {   
        $data = [];
//      fetch team_seasons in chronological order by season end   
        $seasons = Model_Team_Season::query()
                ->where('team_id' , $team)
                ->related('seasons')
                ->order_by('seasons.start', 'asc')
                ->from_cache(false)
                ->get();
        
//      loop over $seasons 
//      set 'next' and return $data[] array if 'current' is set
//      set 'current' and skip to the next iteration if matching to $game
//      set 'previous' otherwise
// 
//      loop ends when 'previous', 'next', and 'current' or no more rows
        if ($seasons) {
            foreach ($seasons as $value) {
                if (isset($data['current']) ?? false){
                    $data['next'] = $value->id;
                    return $data;
                }
                if ($value->id == $season_id) {
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

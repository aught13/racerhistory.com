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
        $query_team   = Model_Stat_Basket_Season_Team::query()
            ->where('team_season_id', $season);
        $query_person = Model_Team_Season_Roster::query()
            ->related('stat_basket_season_person')
            ->where('team_season_id', $season)
            ->order_by('stat_basket_season_person.PTS', 'DESC');
        if ($query_person->count() > 0) {
            foreach ($query_person->get() as $result) {
                if ($result->stat_basket_season_person) {
                    foreach ($result->stat_basket_season_person as $key =>
                            $value) {
                        if ($value >= 0) {
                            $stats[$key] = true;
                        }
                    }
                }
            }
        }
        $stats['person'] = $query_person->get();
        if ($query_team->count() > 0) {
            foreach ($query_team->get() as $result) {
                foreach ($result as $key => $value) {
                    if ($value >= 0) {
                        $stats[$key] = true;
                    }
                }
            }
        }

        return $stats;
    }
}

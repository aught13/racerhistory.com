<?php

class Model_Team_Season_Roster_Award extends \Orm\Model {

    protected static $_properties = [
        'id',
        'team_season_roster_id',
        'award_type',
        'award_category',
        'award_name'
    ];
    
    protected static $_table_name = 'team_season_roster_awards';
    
    protected static $_belongs_to = [
        'team_season_roster', 
    ];
    
}

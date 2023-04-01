<?php

class Model_Team_Season_Roster extends \Orm\Model {

    protected static $_properties = [
        'id',
        'team_season_id',
        'person_id',
        'roster_year',
        'roster_number',
        'roster_position',
        'roster_height',
        'roster_weight',
    ];
    
    protected static $_table_name = 'team_season_roster';
    
    protected static $_belongs_to = ['team_season', 'persons'];
    
    protected static $_has_many = ['stat_basket_game_person'];
    
    protected static $_has_one = ['stat_basket_season_person'];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('team_season_id', 'Team Season Id', 'required|valid_string[numeric]');
        $val->add_field('person_id', 'Person Id', 'required|valid_string[numeric]');
        $val->add_field('roster_year', 'Roster Year', 'max_length[162]');
        $val->add_field('roster_number', 'Roster Number', 'max_length[162]');
        $val->add_field('roster_position', 'Roster Position', 'max_length[162]');
        $val->add_field('roster_height', 'Roster Height', 'max_length[162]');
        $val->add_field('roster_weight', 'Roster Weight', 'max_length[162]');

        return $val;
    }

}

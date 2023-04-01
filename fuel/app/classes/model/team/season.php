<?php

class Model_Team_Season extends \Orm\Model {

    protected static $_properties = [
        'id',
        'team_id',
        'season_id',
        'semester',
        'league_finish',
        'league_torunament_finish',
        'last_post_game',
        'team_season_notes',
        'team_season_image',
        'team_season_preview',
        'team_season_recap',
        'created_at',
        'updated_at',
    ];
    
    protected static $_table_name = 'team_season';
    
    protected static $_observers = [
        'Orm\Observer_CreatedAt' => [
            'events' => ['before_insert'],
            'mysql_timestamp' => true,
        ],
        'Orm\Observer_UpdatedAt' => [
            'events' => ['before_save'],
            'mysql_timestamp' => true,
        ],
    ];
    
    protected static $_belongs_to = ['teams' , 'seasons'];
    
    protected static $_has_many = ['team_season_roster', 'games', 'stat_basket_season_team', 'stat_basket_season_person', 'stat_basket_season_opponent'];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('team_id', 'Team Id', 'required|valid_string[numeric]');
        $val->add_field('season_id', 'Season Id', 'required|valid_string[numeric]');
        $val->add_field('semester', 'Semester', 'required|valid_string[numeric]');
        $val->add_field('league_finish', 'League Finish', 'max_length[240]');
        $val->add_field('league_torunament_finish', 'League Torunament Finish', 'max_length[240]');
        $val->add_field('last_post_game', 'Last Post Game', 'max_length[240]');
        $val->add_field('team_season_notes', 'Team Season Notes', 'max_length[240]');
        $val->add_field('team_season_image', 'Team Season Image', 'max_length[162]');
        $val->add_field('team_season_preview', 'Team Season Preview', 'max_length[16777215]');
        $val->add_field('team_season_recap', 'Team Season Recap', 'max_length[16777215]');

        return $val;
    }

}

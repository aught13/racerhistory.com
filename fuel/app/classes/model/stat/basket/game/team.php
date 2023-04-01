<?php
class Model_Stat_Basket_Game_Team extends \Orm\Model {

    protected static $_properties = [
        'id',
        'opp',
        'game_id',
        'ORB',
        'DRB',
        'RB',
        'TRN',
        'TF',
        'PTS',
        'created_at',
        'updated_at',
    ];

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
    
    protected static $_table_name = 'stat_basket_game_team';
    
    protected static $_belongs_to = ['games'];

        public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('game_id', 'Game Id', 'required|valid_string[numeric]');
        $val->add_field('opp', 'opp', 'required|valid_string[numeric]');
        $val->add_field('ORB', 'ORB', 'valid_string[numeric]');
        $val->add_field('DRB', 'DRB', 'valid_string[numeric]');
        $val->add_field('RB', 'RB', 'valid_string[numeric]');
        $val->add_field('TRN', 'TRN', 'valid_string[numeric]');
        $val->add_field('TF', 'TF', 'valid_string[numeric]');
        $val->add_field('PTS', 'PTS', 'valid_string[numeric]');

        return $val;
    }

}

<?php

class Model_Opponent extends \Orm\Model {

    protected static $_properties = [
        'id',
        'opponent_name',
        'opponent_mascot',
        'opponent_current',
        'opponent_short',
        'opponent_abbr',
        'place_id',
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
    
    protected static $_belongs_to = [
        'places'
    ];
                
    protected static $_has_many = [
        'games' => [
            'cascade_delete' => true
        ]
    ];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('opponent_name', 'Opponent Name', 'required|max_length[162]');
        $val->add_field('opponent_mascot', 'Opponent Mascot', 'max_length[162]');
        $val->add_field('opponent_current', 'Opponent Current', 'valid_string[numeric]');
        $val->add_field('opponent_short', 'Opponent Short', 'required|max_length[30]');
        $val->add_field('opponent_abbr', 'Opponent Abbr', 'required|max_length[6]');
        $val->add_field('place_id', 'Place Id', 'valid_string[numeric]');

        return $val;
    }

}

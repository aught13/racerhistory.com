<?php

class Model_Season extends \Orm\Model {

    protected static $_properties = [
        'id',
        'start',
        'end',
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
    
    protected static $_has_many = ['team_season'];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('start', 'Start', 'required|max_length[4]');
        $val->add_field('end', 'End', 'required|max_length[4]');

        return $val;
    }

}

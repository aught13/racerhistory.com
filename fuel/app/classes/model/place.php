<?php

class Model_Place extends \Orm\Model {

    protected static $_properties = [
        'id',
        'place_name',
        'place_state',
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
    
    protected static $_has_many = ['sites', 'games', 'opponents'];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('place_name', 'Place Name', 'required|max_length[162]');
        $val->add_field('place_state', 'Place State', 'required|max_length[162]');

        return $val;
    }

}

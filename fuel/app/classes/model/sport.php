<?php

class Model_Sport extends \Orm\Model
{

    protected static $_properties = [
        'id',
        'sport_name',
        'created_at',
        'updated_at',
    ];
    protected static $_observers = [
        'Orm\Observer_CreatedAt' => [
            'events'          => ['before_insert'],
            'mysql_timestamp' => true,
        ],
        'Orm\Observer_UpdatedAt' => [
            'events'          => ['before_save'],
            'mysql_timestamp' => true,
        ],
    ];
    protected static $_has_many = ['teams', 'stats'];

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('sport_name', 'Sport Name', 'required|max_length[162]');

        return $val;
    }
}

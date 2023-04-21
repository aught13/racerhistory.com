<?php

class Model_Site extends \Orm\Model {

    protected static $_properties = [
        'id',
        'place_id',
        'site_name',
        'capacity',
        'site_image',
        'site_info',
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
    
    protected static $_has_many = ['games'];
    
    protected static $_belongs_to = [
        'places' => [
            'cascade_delete' => false
        ]
    ];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('place_id', 'Place Id', 'required|valid_string[numeric]');
        $val->add_field('site_name', 'Site Name', 'required|max_length[162]');
        $val->add_field('capacity', 'Capacity', 'valid_string[numeric]');
        $val->add_field('site_image', 'Site Image', 'max_length[162]');
        $val->add_field('site_info', 'Site Info', 'max_length[16777215]');

        return $val;
    }

}

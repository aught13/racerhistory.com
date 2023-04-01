<?php

class Model_Person extends \Orm\Model {

    protected static $_properties = [
        'id',
        'first',
        'last',
        'full',
        'display',
        'birth',
        'death',
        'person_image',
        'created_at',
        'updated_at',
    ];
    
    protected static $_table_name = 'persons';
    
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
    
    protected static $_has_many = ['team_season_roster', 'stat_basket_season_person'];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('first', 'First', 'required|max_length[30]');
        $val->add_field('last', 'Last', 'required|max_length[30]');
        $val->add_field('full', 'Full', 'required|max_length[162]');
        $val->add_field('display', 'Display', 'required|max_length[162]');
        $val->add_field('birth', 'Birth', 'max_length[10]');
        $val->add_field('death', 'Death', 'max_length[10]');
        $val->add_field('person_image', 'Person Image', 'max_length[162]');

        return $val;
    }

}

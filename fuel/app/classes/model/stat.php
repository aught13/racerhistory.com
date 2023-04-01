<?php
class Model_Stat extends \Orm\Model {

    protected static $_properties = [
        'id',
        'sport_id',
        'stat_name',
        'stat_table',
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
    
    protected static $_belongs_to = ['sports'];

        public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('sport_id', 'Sport Id', 'required|valid_string[numeric]');
        $val->add_field('stat_name', 'Stat Name', 'required|max_length[162]');
        $val->add_field('stat_table', 'Stat Table', 'required|max_length[162]');

        return $val;
    }

}

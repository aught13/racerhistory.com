<?php

class Model_Team extends \Orm\Model
{

    protected static $_properties = [
        'id',
        'sport_id',
        'team_name',
        'team_description',
        'abbr',
        'gender',
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
    protected static $_has_many = ['team_season'];
    protected static $_belongs_to = ['sports'];

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('sport_id', 'Sport', 'required|valid_string[numeric]');
        $val->add_field('team_name', 'Team Name', 'required|max_length[162]');
        $val->add_field('team_description', 'Team Description',
                        'required|max_length[240]');
        $val->add_field('abbr', 'Abbr', 'required|max_length[5]');
        $val->add_field('gender', 'Gender', 'required|max_length[1]');

        return $val;
    }
}

<?php

class Model_Game extends \Orm\Model
{

    protected static $_properties = [
        'id',
        'team_season_id',
        'game_date',
        'game_time',
        'game_duration',
        'game_type_id',
        'opponent_id',
        'place_id',
        'site_id',
        'hrn',
        'post',
        'w',
        'l',
        'pts_mur',
        'pts_opp',
        'mur_rk',
        'opp_rk',
        'periods',
        'ot',
        'attendance',
        'game_preview',
        'game_recap',
        'game_notes',
        'created_at',
        'updated_at',
    ];
    protected static $_observers  = [
        'Orm\Observer_CreatedAt' => [
            'events'          => ['before_insert'],
            'mysql_timestamp' => true,
        ],
        'Orm\Observer_UpdatedAt' => [
            'events'          => ['before_save'],
            'mysql_timestamp' => true,
        ],
    ];
    protected static $_belongs_to = [
        'game_types',
        'opponents',
        'places',
        'sites',
        'team_season'
    ];
    protected static $_has_many   = [
        'game_eav',
        'opponent_box' => [
            'model_to'       => 'Model_Stat_Basket_Game_Opponent',
            'cascade_delete' => true
        ],
        'team_box'     => [
            'model_to'       => 'Model_Stat_Basket_Game_Team',
            'conditions'     => [
                'where' => [['opp', '=', 0]]
            ],
            'cascade_delete' => true
        ],
        'team_box_opp' => [
            'model_to'       => 'Model_Stat_Basket_Game_Team',
            'conditions'     => [
                'where' => [['opp', '=', 1]]
            ],
            'cascade_delete' => true
        ],
        'person_box'   => [
            'model_to'       => 'Model_Stat_Basket_Game_Person',
            'cascade_delete' => true
        ],
        'game_box_mur' => [
            'model_to'       => 'Model_Stat_Basket_Game_Box',
            'conditions'     => [
                'where'    => [['opponent_id', '=', 0]],
                'order_by' => ['period' => 'ASC']
            ],
            'cascade_delete' => true
        ],
        'game_box_opp' => [
            'model_to'       => 'Model_Stat_Basket_Game_Box',
            'conditions'     => [
                'where'    => [['opponent_id', '<>', 0]],
                'order_by' => ['period' => 'ASC']
            ],
            'cascade_delete' => true
        ]
    ];
    protected static $_eav        = [
        'game_eav' => [
            'attribute' => 'key',
            'value'     => 'value',
        ],
    ];
    protected static $_conditions = [
        'order_by' => [
            'game_date' => 'asc',
            'game_time' => 'asc',
        ]
    ];

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('team_season_id', 'Season', 'required|numeric_min[1]');
        $val->add_field('game_date', 'Game Date', 'required|valid_date[]');
        $val->add_field('game_time', 'Game Time', 'max_length[5]');
        $val->add_field('game_duration', 'Game Duration', 'max_length[5]');
        $val->add_field(
            'game_type_id', 'Game Type Id', 'required|numeric_min[1]'
        );
        $val->add_field('opponent_id', 'Opponent Id', 'required|numeric_min[1]');
        $val->add_field('place_id', 'Place Id', 'required|numeric_min[1]');
        $val->add_field('site_id', 'Site Id', 'numeric_min[0]');
        $val->add_field('hrn', 'Hrn', 'required|valid_string[numeric]');
        $val->add_field('post', 'Post', 'required|valid_string[numeric]');
        $val->add_field('w', 'W', 'valid_string[numeric]');
        $val->add_field('l', 'L', 'required_with[w]|valid_string[numeric]');
        $val->add_field(
            'pts_mur', 'Pts Mur', 'required_with[l]|valid_string[numeric]'
        );
        $val->add_field(
            'pts_opp', 'Pts Opp', 'required_with[pts_mur]|valid_string[numeric]'
        );
        $val->add_field('mur_rk', 'Mur Rk', 'valid_string[numeric]');
        $val->add_field('opp_rk', 'Opp Rk', 'valid_string[numeric]');
        $val->add_field('periods', 'Periods', 'required|valid_string[numeric]');
        $val->add_field('ot', 'Ot', 'valid_string[numeric]');
        $val->add_field('attendance', 'Attendance', 'valid_string[numeric]');
        $val->add_field('game_preview', 'Game Preview', 'max_length[16777215]');
        $val->add_field('game_recap', 'Game Recap', 'max_length[16777215]');
        $val->add_field('game_notes', 'Game Notes', 'max_length[16777215]');

        return $val;
    }

    public static function val_Refs($param)
    {
        $val = \Fuel\Core\Validation::forge($param);
        $val->add_field(
            'ref_1', 'Ref 1',
            'valid_string[alpha,spaces,singlequotes,dashes,dots]|max_length[162]'
        );
        $val->add_field(
            'ref_2', 'Ref 2',
            'valid_string[alpha,spaces,singlequotes,dashes,dots]|max_length[162]'
        );
        $val->add_field(
            'ref_3', 'Ref 3',
            'valid_string[alpha,spaces,singlequotes,dashes,dots]|max_length[162]'
        );

        return $val;
    }

    public static function val_score($param)
    {
        $val = \Fuel\Core\Validation::forge('score');
        $x   = 1;
        while ($x <= $param['periods']) {
            $val->add_field(
                'mur_' . $x, 'Mur ' . $x,
                (
                $x > 1 ?
                    'required_with[mur_1]|' :
                    ''
                ) . 'valid_string[numeric]'
            );
            $val->add_field(
                'opp_' . $x, 'Opp ' . $x,
                (
                $x > 1 ?
                    'required_with[mur_1]|' :
                    ''
                ) . 'valid_string[numeric]'
            );
            $x++;
        }
        $x = 1;
        while ($x <= $param['ot']) {
            $val->add_field(
                'mur_ot_' . $x, 'Mur OT ' . $x,
                'required_with[mur_1]|valid_string[numeric]'
            );
            $val->add_field(
                'opp_ot_' . $x, 'Opp OT ' . $x,
                'required_with[mur_1]|valid_string[numeric]'
            );
            $x++;
        }

        $val->add_field('pts_mur', 'Pts Mur', 'valid_string[numeric]');
        $val->add_field('pts_opp', 'Pts Opp', 'valid_string[numeric]');
        $val->add_field('ot', 'OT', 'valid_string[numeric]');

        return $val;
    }

    public static function val_details($param)
    {
        $val = Validation::forge($param);
        $val->add_field('place_id', 'Place Id', 'required|numeric_min[1]');
        $val->add_field('site_id', 'Site Id', 'numeric_min[0]');
        $val->add_field('game_time', 'Game Time', 'max_length[5]');
        $val->add_field('game_duration', 'Game Duration', 'max_length[5]');
        $val->add_field('attendance', 'Attendance', 'valid_string[numeric]');
        $val->add_field('mur_rk', 'Mur Rk', 'valid_string[numeric]');
        $val->add_field('opp_rk', 'Opp Rk', 'valid_string[numeric]');

        return $val;
    }

    public static function val_story($param)
    {
        $val = Validation::forge('edit');
        $val->add_field(
            'game_' . $param, 'Game ' . $param, 'max_length[16777215]'
        );

        return $val;
    }

    public static function getRecords($type, $scope, $param = null)
    {
        switch ($type) {
            case 'team':
                switch ($scope) {
                    case 'season':
                        $record['w']   = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->count();
                        $record['l']   = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)->count();
                        $record['hw']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->where('hrn', 1)->count();
                        $record['hl']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)->where('hrn', 1)->count();
                        $record['rw']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->where('hrn', 2)->count();
                        $record['rl']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)->where('hrn', 2)->count();
                        $record['nw']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->where('hrn', 3)->count();
                        $record['nl']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)->where('hrn', 3)->count();
                        $record['cw']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)
                                ->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 0)->count();
                        $record['cl']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)
                                ->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 0)->count();
                        $record['crw'] = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->where('hrn', 1)
                                ->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 0)->count();
                        $record['crl'] = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)->where('hrn', 2)
                                ->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 0)->count();
                        $record['chw'] = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->where('hrn', 1)
                                ->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 0)->count();
                        $record['chl'] = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)
                                ->where('hrn', 2)
                                ->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 0)->count();
                        $record['ctw'] = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 1)->count();
                        $record['ctl'] = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)->related('game_types')
                                ->where('game_types.conf', 1)
                                ->where('game_types.post', 1)->count();
                        $record['pw']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('w', 1)->related('game_types')
                                ->where('game_types.conf', 0)
                                ->where('game_types.post', 1)->count();
                        $record['pl']  = Model_Game::query()
                                ->where('team_season_id', $param)
                                ->where('l', 1)->related('game_types')
                                ->where('game_types.conf', 0)
                                ->where('game_types.post', 1)->count();
                        return $record;
                        break;

                    case 'index' :
                        foreach ($param as $value) {
                            $records[$value->id]['w']   = Model_Game::query()
                                ->where('team_season_id', $value->id)
                                ->where('w', 1)->count();
                            $records[$value->id]['l']   = Model_Game::query()
                                ->where('team_season_id', $value->id)
                                ->where('l', 1)->count();
                            $records[$value->id]['cw']  = Model_Game::query()
                                    ->where('team_season_id', $value->id)
                                    ->where('w', 1)
                                    ->related('game_types')
                                    ->where('game_types.conf', 1)
                                    ->where('game_types.post', 0)->count();
                            $records[$value->id]['cl']  = Model_Game::query()
                                    ->where('team_season_id', $value->id)
                                    ->where('l', 1)
                                    ->related('game_types')
                                    ->where('game_types.conf', 1)
                                    ->where('game_types.post', 0)->count();
                        }
                        return $records;
                        break;

                    default:
                        break;
                }

                break;

            default:
                break;
        }
    }
    
    public static function calculate_streaks($games) 
    {
        $streak = 0;
        $streak_type = '';
        foreach ($games as $game) {
            if ($game->w == 1 && $game->l == 0) {
                if ($streak_type == 'W') {
                    $streak++;
                } else {
                    $streak_type = 'W';
                    $streak = 1;
                }
            } elseif ($game->w == 0 && $game->l == 1) {
                if ($streak_type == 'L') {
                    $streak++;
                } else {
                    $streak_type = 'L';
                    $streak = 1;
                }
            } elseif ($game->w == 0 && $game->l == 0) {
                if ($streak_type == 'T') {
                    $streak++;
                } else {
                    $streak_type = 'T';
                    $streak = 1;
                }
            }
            $game->streak_type = $streak_type;
            $game->streak = $streak;
        }
        return $games;
    }

}

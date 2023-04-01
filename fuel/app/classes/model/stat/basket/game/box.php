<?php

class Model_Stat_Basket_Game_Box extends \Orm\Model {

    protected static $_properties = [
        'id',
        'game_id',
        'opponent_id',
        'period',
        'FGM',
        'FGA',
        'TPM',
        'TPA',
        'FTM',
        'FTA',
        'ORB',
        'DRB',
        'RB',
        'AST',
        'STL',
        'BS',
        'TRN',
        'PF',
        'TF',
        'PTS',
        'PNT',
        'OTO',
        'SND',
        'FB',
        'BN',
        'TIED',
        'LC',
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
    
    protected static $_table_name = 'stat_basket_game_box';
    
    protected static $_belongs_to = ['games'];

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('game_id', 'Game Id', 'required|valid_string[numeric]');
        $val->add_field('opponent_id', 'Team', 'required|valid_string[numeric]');
        $val->add_field('period', 'Period', 'required|max_length[10]');
        $val->add_field('FGM', 'FGM', 'valid_string[numeric]');
        $val->add_field('FGA', 'FGA', 'valid_string[numeric]');
        $val->add_field('TPM', 'TPM', 'valid_string[numeric]');
        $val->add_field('TPA', 'TPA', 'valid_string[numeric]');
        $val->add_field('FTM', 'FTM', 'valid_string[numeric]');
        $val->add_field('FTA', 'FTA', 'valid_string[numeric]');
        $val->add_field('ORB', 'ORB', 'valid_string[numeric]');
        $val->add_field('DRB', 'DRB', 'valid_string[numeric]');
        $val->add_field('RB', 'RB', 'valid_string[numeric]');
        $val->add_field('AST', 'AST', 'valid_string[numeric]');
        $val->add_field('STL', 'STL', 'valid_string[numeric]');
        $val->add_field('BS', 'BS', 'valid_string[numeric]');
        $val->add_field('TRN', 'TRN', 'valid_string[numeric]');
        $val->add_field('PF', 'PF', 'valid_string[numeric]');
        $val->add_field('TF', 'TF', 'valid_string[numeric]');
        $val->add_field('PTS', 'PTS', 'valid_string[numeric]');
        $val->add_field('PNT', 'PNT', 'valid_string[numeric]');
        $val->add_field('OTO', 'OTO', 'valid_string[numeric]');
        $val->add_field('SND', 'SND', 'valid_string[numeric]');
        $val->add_field('FB', 'FB', 'valid_string[numeric]');
        $val->add_field('BN', 'BN', 'valid_string[numeric]');
        $val->add_field('TIED', 'TIED', 'valid_string[numeric]');
        $val->add_field('LC', 'LC', 'valid_string[numeric]');

        return $val;
    }

}

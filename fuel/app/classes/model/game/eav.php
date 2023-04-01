<?php

class Model_Game_Eav extends \Orm\Model {

    protected static $_properties = [
        'id',
        'game_id',
        'key',
        'value',
    ];
    
    protected static $_belongs_to = ['games'];
    
    protected static $_table_name = 'game_eav';

}

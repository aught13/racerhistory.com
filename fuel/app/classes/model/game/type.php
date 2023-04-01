<?php
class Model_Game_Type extends \Orm\Model
{
	protected static $_properties = [
		'id',
		'game_type_name',
		'post',
		'conf',
	]; 
        
        protected static $_has_many = ['games'];
        
        protected static $_table_name = 'game_types';


        public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('game_type_name', 'Game Type Name', 'required|max_length[162]');
		$val->add_field('post', 'Post', 'required|valid_string[numeric]');
		$val->add_field('conf', 'Conf', 'required|valid_string[numeric]');

		return $val;
	}
        
        

}

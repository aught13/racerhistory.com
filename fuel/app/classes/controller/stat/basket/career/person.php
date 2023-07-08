<?php

/*
 * Copyright (C) 2023 patrick
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of person
 *
 * @author patrick
 */
class Controller_Stat_Basket_Career_Person extends Controller_Template
{

    public function action_index()
    {
        $data['player_season_stats'] = Data_Stat_Basket_Career_Person::find();
        $data['flag'] = true;

        $this->template->title   = "Player Stats";
        $this->template->content = View::forge('stat/basket/career/person/index',
                                               $data, false);
    }
}

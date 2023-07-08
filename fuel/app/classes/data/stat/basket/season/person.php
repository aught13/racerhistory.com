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
class Data_Stat_Basket_Season_Person implements IteratorAggregate, Countable
{
    protected $_properties = [];
    
   function __construct()
    {
        $this->set();
    }
    
    private function set()
    {
        $query = Model_Stat_Basket_Season_Person::find('all');
        
        foreach ($query as $value) {
            $this->_properties[$value->id] = [
                'id'          => $value->team_season_roster->persons->id,
                'person_name' => $value->team_season_roster->persons->display,
                'start'       => $value->team_season_roster->team_season->seasons->start,
                'finish'      => $value->team_season_roster->team_season->seasons->end,
                'seasons'     => $value->team_season_roster->team_season->seasons->start . '-' . $value->team_season_roster->team_season->seasons->end,
                'count'       => $value->team_season_roster->roster_year,
                'GP'          => $value->GP == '' ? '' : $value->GP,
                'GS'          => $value->GS == '' ? '' : $value->GS,
                'MIN'         => $value->MIN == '' ? '' : $value->MIN,
                'FGM'         => $value->FGA == '' ? '' : $value->FGM,
                'FGA'         => $value->FGA == '' ? '' : $value->FGA,
                'FGP'         => $value->FGA == 0 ? '' : floatval($value->FGM/$value->FGA),
                'TPM'         => $value->TPA == '' ? '' : $value->TPM,
                'TPA'         => $value->TPA == '' ? '' : $value->TPA,
                'TPP'         => $value->TPA == 0 ? '' : floatval($value->TPM/$value->TPA),
                'FTM'         => $value->FTA == '' ? '' : $value->FTM,
                'FTA'         => $value->FTA == '' ? '' : $value->FTA,
                'FTP'         => $value->FTA == 0 ? '' : floatval($value->FTM/$value->FTA),
                'ORB'         => $value->ORB == '' ? '' : $value->ORB,
                'DRB'         => $value->DRB == '' ? '' : $value->DRB,
                'RB'          => $value->RB == '' ? '' : $value->RB,
                'AST'         => $value->AST == '' ? '' : $value->AST,
                'ATR'         => $value->TRN == 0 ? '' : floatval($value->AST/$value->TRN),
                'STL'         => $value->STL == '' ? '' : $value->STL,
                'BS'          => $value->BS == '' ? '' : $value->BS,
                'TRN'         => $value->TRN == '' ? '' : $value->TRN,
                'PF'          => $value->PF == '' ? '' : $value->PF,
                'PTS'         => $value->PTS
            ];
        }
    }
    
    public function count(): int
    {
        return count($this->_properties);
    }

    public function __get($property)
    {
        if (array_key_exists($property, $this->_properties)) {
        return $this->_properties[$property];
        }

        throw new \OutOfBoundsException('Property "' . $property . '" not found for ' . get_called_class() . '.');
    }
    
    public function __isset($name)
    {
        return isset($this->_properties[$name]);
    }
    
    public function getIterator(): Traversable 
    {
        return new ArrayIterator($this->_properties);
    }
}

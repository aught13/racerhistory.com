<?php

/**
 * Basketball career stats
 *
 * @author patrick
 */
class Data_Stat_Basket_Career_Person implements IteratorAggregate, Countable
{

    protected $_properties = [];

    public static function find($param = false): iterable|false
    {
        $return = new self($param);
        if ($return->count() == 0) {
            return false;
        }
        return $return ?? false;
    }

    function __construct($param)
    {
        $this->set_props($param);
    }

    private function set_props($id = false)
    {
        if ($id) { 
            $persons[] = ['id' => $id];
        } else {
            $persons = Model_Person::find('all',['select' => ['id', 'display']]);
        }        
        foreach ($persons as $value) {
            $stats = Model_Stat_Basket_Season_Person::find(
                    'all',
                    [
                        'related' => ['team_season_roster'],
                        'where'   =>
                        [
                            'team_season_roster.person_id' => $value['id'] 
                        ],
                        'from_cache' => false,
                        'order-by' => ['PTS', 'desc'],
                    ]
            );
            if ($stats) {
                $name        = '';
                $years       = [];
                $count       = 0;
                $GP          = 0;
                $GS          = 0;
                $MIN         = 0;
                $FGM         = 0;
                $FGA         = 0;
                $TPM         = 0;
                $TPA         = 0;
                $FTM         = 0;
                $FTA         = 0;
                $ORB         = 0;
                $DRB         = 0;
                $RB          = 0;
                $AST         = 0;
                $STL         = 0;
                $BS          = 0;
                $TRN         = 0;
                $PF          = 0;
                $PTS         = 0;
                foreach ($stats as $season) {
                    $name    = $season->team_season_roster->persons->display;
                    $years[] = intval($season->team_season_roster->team_season->seasons->start);
                    $years[] = intval($season->team_season_roster->team_season->seasons->end);
                    $count   = $season ? $count + 1 : $count;
                    $GP      += intval($season->GP ?? 0);
                    $GS      += intval($season->GS ?? 0);
                    $MIN     += intval($season->MIN ?? 0);
                    $FGM     += intval($season->FGM ?? 0);
                    $FGA     += intval(is_null($season->FGA) ? 99999 : $season->FGA);
                    $TPM     += intval($season->TPM ?? 0);
                    $TPA     += intval($season->TPA ?? 0);
                    $FTM     += intval($season->FTM ?? 0);
                    $FTA     += intval($season->FTA ?? 0);
                    $ORB     += intval($season->ORB ?? 0);
                    $DRB     += intval($season->DRB ?? 0);
                    $RB      += intval($season->RB ?? 0);
                    $AST     += intval($season->AST ?? 0);
                    $STL     += intval($season->STL ?? 0);
                    $BS      += intval($season->BS ?? 0);
                    $TRN     += intval($season->TRN ?? 0);
                    $PF      += intval($season->PF ?? 0);
                    $PTS     += intval($season->PTS ?? 0);
                }
                
                $this->_properties[$value['id']] = [
                    'id'          => $value['id'],
                    'person_name' => $name,
                    'start'       => min($years),
                    'finish'      => max($years),
                    'seasons'     => min($years) . '-' . max($years),
                    'count'       => $count,
                    'GP'          => $GP == 0 ? '' : $GP,
                    'GS'          => $GS == 0 ? '' : $GS,
                    'MIN'         => $MIN == 0 ? '' : $MIN,
                    'FGM'         => $FGA == 0 ? '' : $FGM,
                    'FGA'         => $FGA == 0 ? '' : ($FGA > 99998 ? '' : $FGA),
                    'FGP'         => $FGA == 0 ? '' : ($FGM/$FGA),
                    'TPM'         => $TPA == 0 ? '' : $TPM,
                    'TPA'         => $TPA == 0 ? '' : $TPA,
                    'TPP'         => $TPA == 0 ? '' : ($TPM/$TPA),
                    'FTM'         => $FTA == 0 ? '' : $FTM,
                    'FTA'         => $FTA == 0 ? '' : $FTA,
                    'FTP'         => $FTA == 0 ? '' : ($FTM/$FTA),
                    'ORB'         => $ORB == 0 ? '' : $ORB,
                    'DRB'         => $DRB == 0 ? '' : $DRB,
                    'RB'          => $RB == 0 ? '' : $RB,
                    'AST'         => $AST == 0 ? '' : $AST,
                    'ATR'         => $TRN == 0 ? '' : ($AST/$TRN),
                    'STL'         => $STL == 0 ? '' : $STL,
                    'BS'          => $BS == 0 ? '' : $BS,
                    'TRN'         => $TRN == 0 ? '' : $TRN,
                    'PF'          => $PF == 0 ? '' : $PF,
                    'PTS'         => $PTS
                ];
            }
        }
        usort($this->_properties, fn($a, $b) => $b['PTS'] <=> $a['PTS']);
        return $this;
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

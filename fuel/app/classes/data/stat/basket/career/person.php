<?php

/**
 * Basketball career stats
 *
 * @author patrick
 */
class Data_Stat_Basket_Career_Person
{

    public int $person_id;
    public string $person_name;
    public string $seasons;
    public int $count;
    public $GP;
    public $GS;
    public $MIN;
    public $FGM;
    public $FGA;
    public $TPM;
    public $TPA;
    public $FTM;
    public $FTA;
    public $ORB;
    public $DRB;
    public $RB;
    public $AST;
    public $STL;
    public $BS;
    public $TRN;
    public $PF;
    public $PTS;

    public static function find($param = false)
    {
        if ($param) {
            $return = new self($param);
        }
        if ($return->count == 0) {
            return false;
        }
        return $return ?? false;
    }
        
    function __construct($person_id)
    {

        self::set_props($person_id);
    }

    private function set_props($person_id)
    {

        $stats             = Model_Person::find($person_id,
                                                ['related' => [
                                                    'team_season_roster' => [
                                                        'related' => ['stat_basket_season_person']
                                                        ]
                                                    ]
                                                ]);
        $this->person_id   = $person_id;
        $this->person_name = $stats->display;
        $count             = 0;
        foreach ($stats->team_season_roster as $season) {
            $years[]   = intval($season->team_season->seasons->start);
            $years[]   = intval($season->team_season->seasons->end);
            $count     = $season->stat_basket_season_person ? $count + 1 : $count;
            $this->GP  += intval($season->stat_basket_season_person->GP ?? 0);
            $this->GS  += intval($season->stat_basket_season_person->GS ?? 0);
            $this->MIN += intval($season->stat_basket_season_person->MIN ?? 0);
            $this->FGM += intval($season->stat_basket_season_person->FGM ?? 0);
            $this->FGA += intval($season->stat_basket_season_person->FGA ?? 0);
            $this->TPM += intval($season->stat_basket_season_person->TPM ?? 0);
            $this->TPA += intval($season->stat_basket_season_person->TPA ?? 0);
            $this->FTM += intval($season->stat_basket_season_person->FTM ?? 0);
            $this->FTA += intval($season->stat_basket_season_person->FTA ?? 0);
            $this->ORB += intval($season->stat_basket_season_person->ORB ?? 0);
            $this->DRB += intval($season->stat_basket_season_person->DRB ?? 0);
            $this->RB  += intval($season->stat_basket_season_person->RB ?? 0);
            $this->AST += intval($season->stat_basket_season_person->AST ?? 0);
            $this->STL += intval($season->stat_basket_season_person->STL ?? 0);
            $this->BS  += intval($season->stat_basket_season_person->BS ?? 0);
            $this->TRN += intval($season->stat_basket_season_person->TRN ?? 0);
            $this->PF  += intval($season->stat_basket_season_person->PF ?? 0);
            $this->PTS += intval($season->stat_basket_season_person->PTS ?? 0);
        }
        $this->seasons = min($years) . '-' . max($years);
        $this->count   = $count;
    }
}

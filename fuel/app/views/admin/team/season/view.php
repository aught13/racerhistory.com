<!-- TEAM SEASON VIEW -->
<?php if (!empty($team_season->team_season_image)): ?>
    <div class="container">
        <div class="jumbotron">
            <?= $team_season->team_season_image; ?>
        </div>    
    </div>
<?php endif; ?>
<!-- RECORD ROW -->
<?php if (!empty($record)): ?>
    <table class="table">
        <tr>
            <th>Overall</th>
            <th>Home</th>
            <th>Road</th>
            <th>Neutral</th>
        </tr>
        <tr>
            <td><?= $record['w']; ?> - <?= $record['l']; ?></td>
            <td><?= $record['hw']; ?> - <?= $record['hl']; ?></td>
            <td><?= $record['rw']; ?> - <?= $record['rl']; ?></td>
            <td><?= $record['nw']; ?> - <?= $record['nl']; ?></td>
        </tr>
    </table>
<?php else: ?>
    NO RECORDS
<?php endif; ?>
    <!-- CONFERENCE RECORDS -->
<?php if (!empty($record['cw']) | !empty($record['cl']) ): ?>
    <table class="table">
        <tr>
            <th>Conference</th>
            <th>Home</th>
            <th>Road</th>
            <th>Finish</th>
        </tr>
        <tr>
            <td><?= $record['cw']; ?> - <?= $record['cl']; ?></td>   
            <td><?= $record['chw']; ?> - <?= $record['chl']; ?></td>   
            <td><?= $record['crw']; ?> - <?= $record['crl']; ?></td>
            <td><?= !empty($team_season->league_finish)?$team_season->league_finish:''; ?></td>
        </tr>
    </table>
    <?php if (!empty($team_season->league_torunament_finish)): ?>
    <span class="col-sm-12"><?= $team_season->league_torunament_finish; ?></span>
    <?php endif; ?>
<?php endif; ?>
    <!-- POSTSEASON RECORD -->
<?php if (!empty($record['pw'] | !empty($record['pl']))): ?>
    <div class="row">
        <span class="col-sm-3">Postseason</span>
        <span class="col-sm-1">(record)</span>
        <span class="col-sm-8"><?= $team_season->last_post_game; ?></span>
    </div>    
<?php endif; ?>
    <!-- SEASON NOTES -->
<?= !empty($team_season->team_season_notes) ? '<div class="row">'.$team_season->team_season_notes.'</div>':''; ?>
<hr>
    <!-- RECAP AND PREVIEW -->
<div class="row">    
    <?php if (!empty($team_season->team_season_preview)): ?>
    <span>Preview <a href="#preview" data-toggle="collapse">^</a></span>
    <div id="preview" class="col-sm-12 collapse <?= empty($team_season->team_season_recap) ? 'in' : '' ?>">
        <?= $team_season->team_season_preview; ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($team_season->team_season_recap)): ?>
    <span>Preview <a href="#recap" data-toggle="collapse">^</a></span>
    <div id="recap" class="col-sm-12 collapse in">
        <?= $team_season->team_season_recap; ?>
    </div>
    <?php endif; ?>
    <?= (empty($team_season->team_season_preview) && empty($team_season->team_season_recap)) ? '<span class="col-sm-12">No Story</span>' : '' ?>
</div>
<div class="btn-group">
    <?= Html::anchor('admin/team/season/edit/' . $team_season->id, 'Edit Details', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/team/season', 'Back', ['class' => 'btn btn-default']); ?>
</div>
    <!-- SEASON GAMES -->
<?php if (isset($team_season->games)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th></th>
                    <th>Opponent</th>
                    <th></th>
                    <th></th>
                    <th>W/L</th>
                    <th>Final</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($team_season->games as $item): ?>
                    <tr>
                        <td><?= $item->game_date; ?></td>
                        <td><?= $item->mur_rk; ?> Racers <?= $item->hrn == '1' ? 'Vs' : ($item->hrn == '2' ? '@' : 'Vs'); ?></td>
                        <td><?= $item->opp_rk; ?> <?= $item->opponents->opponent_name; ?></td>
                        <td><?= ($item->game_types->conf == '1' ? '*' : ($item->game_types->post == '1' ? '+' : '')); ?></td>
                        <td><?= $item->places->place_name; ?>, <?= $item->places->place_state; ?></td>
                        <td><?= $item->w == '1' ? 'W' : ($item->l == '1' ? 'L' : ''); ?></td>
                        <td><?= $item->pts_mur; ?> - <?= $item->pts_opp; ?></td>
                        <td><?= ($item->ot == '1' ? 'OT' : (empty($item->ot) ? '' : $item->ot.' OT')); ?></td>
                        <td>
                            <?= Html::anchor('admin/game/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/game/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/game/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p>No Games.</p>
<?php endif; ?>
<p>
    <?= Html::anchor('admin/game/create/'.$team_season->id, 'Add new Game', array('class' => 'btn btn-success')); ?>
</p>    
<!-- SEASON ROSTER -->
<h2>Roster</h2>
<?php if ($team_season->team_season_roster): ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Num</th>
                    <th>Pos</th>
                    <th>Ht</th>
                    <th>Wt</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($team_season->team_season_roster as $item): ?>
                    <tr>
                        <td><?= $item->persons->display; ?></td>
                        <td><?= $item->roster_year; ?></td>
                        <td><?= $item->roster_number; ?></td>
                        <td><?= $item->roster_position; ?></td>
                        <td><?= $item->roster_height; ?></td>
                        <td><?= $item->roster_weight; ?></td>
                        <td>
                            <?= Html::anchor('admin/person/view/' . $item->persons->id, 'View'); ?> |
                            <?= Html::anchor('admin/team/season/roster/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/team/season/roster/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                            <?= $item->stat_basket_season_person ? '' : '|'.Html::anchor('admin/stat/basket/season/person/create/' . $item->id, 'Add Stats'); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p>No Team_season_rosters.</p>
<?php endif; ?>
<p>
    <?= Html::anchor('admin/team/season/roster/create/'.$team_season->id , 'Add To Roster', ['class' => 'btn btn-success']); ?>
</p>
<hr><!-- SEASON STATS -->
<h2>Stats</h2>
<div class="row">
    <?php if ($team_season->team_season_roster || $team_season->stat_basket_season_team): ?>
    <div class="col-sm-<?= $team_season->stat_basket_season_team && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA'])) ? 12 : 9 ;?>"> 
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" colspan="<?= $team_season->team_season_roster ? 1 : (isset($stats['MIN']) ? 4 : 3) ; ?>"><?= $team_season->team_season_roster ? '#' : '' ; ?></th>
                    <?= $team_season->team_season_roster ? '<th rowspan="2" colspan="2">Name</th>' : '' ; ?>
                    <?= (isset($stats['MIN']) && $team_season->team_season_roster) ? '<th rowspan="2" colspan="1">Min</th>' : '' ; ?>
                    <th class="text-center" rowspan="<?= isset($stats['FGA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FGA']) ? 2 : 1 ;?>">FG</th>
                    <?= isset($stats['TPM']) ? '<th class="text-center" rowspan="1" colspan="'.(isset($stats['TPA']) ? 2 : 1).'">3P</th>' : '' ; ?>
                    <th class="text-center" rowspan="<?= isset($stats['FTA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FTA']) ? 2 : 1 ;?>">FT</th>
                    <?= isset($stats['ORB']) ? '<th class="text-center" rowspan="1" colspan="'.(isset($stats['DRB']) ? 3 : 2).'">Rebounds</th>' : (isset($stats['RB']) ? '<th rowspan="2" colspan="1">RB</th>' : '') ; ?>
                    <?= isset($stats['PF']) ? '<th class="text-center" rowspan="'.(isset($stats['FD']) ? 1 : 2).'" colspan="'.(isset($stats['FD']) ? 2 : 1).'">'.(isset($stats['FD']) ? 'Fouls' : 'PF').'</th>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<th class="text-center" rowspan="2" colspan="1">AS</th>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<th class="text-center" rowspan="2" colspan="1">TO</th>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<th class="text-center" rowspan="2" colspan="1">ST</th>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<th class="text-center" rowspan="'.(isset($stats['BD']) ? 1 : 2).'" colspan="'.(isset($stats['BD']) ? 2 : 1).'">'.(isset($stats['BD']) ? 'Blocks' : 'BS').'</th>' : '' ; ?>
                    <th class="text-center" rowspan="2" colspan="1">PTS</th>
                    <th rowspan="2" colspan="1"></th>
                </tr>
                <tr>
                    <?= isset($stats['FGA']) ? '<th class="text-center">M</th>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<th class="text-center">A</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="text-center">M</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="text-center">A</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="text-center">M</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="text-center">A</th>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<th class="text-center">OR</th>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<th class="text-center">DR</th>' : '' ; ?>
                    <?= (isset($stats['ORB']) || isset($stats['DRB'])) ? '<th class="text-center">TOT</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th class="text-center">PF</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th class="text-center">FD</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th class="text-center">BS</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th class="text-center">BA</th>' : '' ; ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($team_season->team_season_roster): ?> <!-- Individual Box -->
                <?php foreach ($team_season->team_season_roster as $value): ?>
                <?php if ($value->stat_basket_season_person): ?>
                <tr>                    
                    <?= '<td class="text-center">'.$value->roster_number.'</td>' ;?>
                    <?= '<td>'.$value->persons->display.'</td>' ;?>
                    <?= !empty($value->stat_basket_season_person->GS) ? '<td class="text-center">'.(empty($value->roster_position) ? '*' : $value->roster_position).'</td>' : '<td></td>' ;?>
                    <?= isset($stats['MIN']) ? '<td class="text-center">'.$value->stat_basket_season_person->MIN.'</td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<td class="text-center">'.$value->stat_basket_season_person->FGM.'</td>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<td class="text-center">'.$value->stat_basket_season_person->FGA.'</td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td class="text-center">'.$value->stat_basket_season_person->TPM.'</td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td class="text-center">'.$value->stat_basket_season_person->TPA.'</td>' : '' ; ?>
                    <?= isset($stats['FTM']) ? '<td class="text-center">'.$value->stat_basket_season_person->FTM.'</td>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<td class="text-center">'.$value->stat_basket_season_person->FTA.'</td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td class="text-center">'.$value->stat_basket_season_person->ORB.'</td>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<td class="text-center">'.$value->stat_basket_season_person->DRB.'</td>' : '' ; ?>
                    <?= isset($stats['RB']) ? '<td class="text-center">'.$value->stat_basket_season_person->RB.'</td>' : '' ; ?>
                    <?= isset($stats['PF']) ? '<td class="text-center">'.$value->stat_basket_season_person->PF.'</td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td class="text-center">'.$value->stat_basket_season_person->FD.'</td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td class="text-center">'.$value->stat_basket_season_person->AST.'</td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="text-center">'.$value->stat_basket_season_person->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="text-center">'.$value->stat_basket_season_person->STL.'</td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="text-center">'.$value->stat_basket_season_person->BS.'</td>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<td class="text-center">'.$value->stat_basket_season_person->BD.'</td>' : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="text-center">'.$value->stat_basket_season_person->PTS.'</td>' : '' ; ?>
                    <td><?= Html::anchor('admin/stat/basket/season/person/edit/' . $value->stat_basket_season_person->id, 'edit', ['class' => '']); ?>|<?= Html::anchor('admin/stat/basket/season/person/delete/' . $value->stat_basket_season_person->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?></td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php else: ?>
                <tr></tr>
                <?php endif; ?>
            </tbody>    
            <?php if ($team_season->stat_basket_season_team || $team_season->stat_basket_season_opponent): ?><!-- totals -->
            <tfoot>
                <?php if ($team_season->stat_basket_season_team): ?>
                    <?php foreach ($team_season->stat_basket_season_team as $value): ?>
                    <tr>
                        <th colspan="<?= isset($stats['MIN']) ? 4 : 3 ; ?>">TEAM TOTAL</th>
                        <?= isset($stats['FGM']) ? '<th class="text-center">'.$value->FGM.'</th>' : ''; ?>
                        <?= isset($stats['FGA']) ? '<th class="text-center">'.$value->FGA.'</th>' : ''; ?>
                        <?= isset($stats['TPM']) ? '<th class="text-center">'.$value->TPM.'</th>' : ''; ?>
                        <?= isset($stats['TPA']) ? '<th class="text-center">'.$value->TPA.'</th>' : ''; ?>
                        <?= isset($stats['FTM']) ? '<th class="text-center">'.$value->FTM.'</th>' : ''; ?>
                        <?= isset($stats['FTA']) ? '<th class="text-center">'.$value->FTA.'</th>' : ''; ?>
                        <?= isset($stats['ORB']) ? '<th class="text-center">'.$value->ORB.'</th>' : ''; ?>
                        <?= isset($stats['DRB']) ? '<th class="text-center">'.$value->DRB.'</th>' : ''; ?>
                        <?= isset($stats['RB']) ? '<th class="text-center">'.$value->RB.'</th>' : ''; ?>
                        <?= isset($stats['PF']) ? '<th class="text-center"'.(isset($stats['FD']) ? 'colspan="2"' : '').'>'.$value->PF.'</th>' : ''; ?>
                        <?= isset($stats['AST']) ? '<th class="text-center">'.$value->AST.'</th>' : ''; ?>
                        <?= isset($stats['TRN']) ? '<th class="text-center">'.$value->TRN.'</th>' : ''; ?>
                        <?= isset($stats['STL']) ? '<th class="text-center">'.$value->STL.'</th>' : ''; ?>
                        <?= isset($stats['BS']) ? '<th class="text-center"'.(isset($stats['BD']) ? 'colspan="2"' : '').'>'.$value->BS.'</th>' : ''; ?>
                        <?= isset($stats['PTS']) ? '<th class="text-center">'.$value->PTS.'</th>' : ''; ?>
                        <td><?= Html::anchor('admin/stat/basket/season/team/edit/' . $value->id, 'edit', ['class' => '']); ?>|<?= Html::anchor('admin/stat/basket/season/team/delete/' . $value->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?> 
                <?php if ($team_season->stat_basket_season_opponent): ?>    
                    <?php foreach ($team_season->stat_basket_season_opponent as $value): ?>
                    <tr>
                        <th colspan="<?= isset($stats['MIN']) ? 4 : 3 ; ?>">OPPONENT TOTAL</th>
                        <?= isset($stats['FGM']) ? '<th class="text-center">'.$value->FGM.'</th>' : ''; ?>
                        <?= isset($stats['FGA']) ? '<th class="text-center">'.$value->FGA.'</th>' : ''; ?>
                        <?= isset($stats['TPM']) ? '<th class="text-center">'.$value->TPM.'</th>' : ''; ?>
                        <?= isset($stats['TPA']) ? '<th class="text-center">'.$value->TPA.'</th>' : ''; ?>
                        <?= isset($stats['FTM']) ? '<th class="text-center">'.$value->FTM.'</th>' : ''; ?>
                        <?= isset($stats['FTA']) ? '<th class="text-center">'.$value->FTA.'</th>' : ''; ?>
                        <?= isset($stats['ORB']) ? '<th class="text-center">'.$value->ORB.'</th>' : ''; ?>
                        <?= isset($stats['DRB']) ? '<th class="text-center">'.$value->DRB.'</th>' : ''; ?>
                        <?= isset($stats['RB']) ? '<th class="text-center">'.$value->RB.'</th>' : ''; ?>
                        <?= isset($stats['PF']) ? '<th class="text-center"'.(isset($stats['FD']) ? 'colspan="2"' : '').'>'.$value->PF.'</th>' : ''; ?>
                        <?= isset($stats['AST']) ? '<th class="text-center">'.$value->AST.'</th>' : ''; ?>
                        <?= isset($stats['TRN']) ? '<th class="text-center">'.$value->TRN.'</th>' : ''; ?>
                        <?= isset($stats['STL']) ? '<th class="text-center">'.$value->STL.'</th>' : ''; ?>
                        <?= isset($stats['BS']) ? '<th class="text-center"'.(isset($stats['BD']) ? 'colspan="2"' : '').'>'.$value->BS.'</th>' : ''; ?>
                        <?= isset($stats['PTS']) ? '<th class="text-center">'.$value->PTS.'</th>' : ''; ?>
                        <td><?= Html::anchor('admin/stat/basket/season/opponent/edit/' . $value->id, 'edit', ['class' => '']); ?>|<?= Html::anchor('admin/stat/basket/season/opponent/delete/' . $value->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?></td>
                    </tr>
                    <?php endforeach; ?>  
                <?php endif; ?>    
            </tfoot>
            <?php endif; ?> 
        </table>
        <?= $team_season->stat_basket_season_team ? '' : Html::anchor('admin/stat/basket/season/team/create/'. $team_season->id, 'Add Season Team Stats', array('class' => 'btn btn-success')); ?>
        <?= $team_season->stat_basket_season_opponent ? '' : Html::anchor('admin/stat/basket/season/opponent/create/'. $team_season->id, 'Add Season Opponent Stats', array('class' => 'btn btn-success')); ?>
    </div>
<?php endif; ?>

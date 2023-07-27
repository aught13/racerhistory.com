<?php 
/**
 * /app/views/admin/team/season/view
 * 
 * Single season view
 *
 */
?>
<h1><?= $title; ?></h1>
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
        <thead>
            <tr>
                <th style="width: 25%; white-space: nowrap">Overall</th>
                <th>Home</th>
                <th>Road</th>
                <th>Neutral</th>
                <th>Post</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $record['w']; ?> - <?= $record['l']; ?></td>
                <td><?= $record['hw']; ?> - <?= $record['hl']; ?></td>
                <td><?= $record['rw']; ?> - <?= $record['rl']; ?></td>
                <td><?= $record['nw']; ?> - <?= $record['nl']; ?></td>
                <td><?= $record['pw']; ?> - <?= $record['pl']; ?></td>
            </tr>
        </tbody>
     <!-- CONFERENCE RECORDS -->
<?php if (!empty($record['cw']) | !empty($record['cl']) ): ?>
        <tfoot>
            <tr>
                <th><?= $team_season->league ;?></th>
                <th>Home</th>
                <th>Road</th>
                <th>Finish</th>
                <th>Tourn</th>
            </tr>
            <tr>
                <td><?= $record['cw']; ?> - <?= $record['cl']; ?></td>   
                <td><?= $record['chw']; ?> - <?= $record['chl']; ?></td>   
                <td><?= $record['crw']; ?> - <?= $record['crl']; ?></td>
                <td><?= !empty($team_season->league_finish)?$team_season->league_finish:''; ?></td>
                <td><?= $record['ctw']; ?> - <?= $record['ctl']; ?></td>
            </tr>
        </tfoot> 
<?php endif; ?>        
    </table>
<?php else: ?>
    NO RECORDS
<?php endif; ?>
    <!-- CONFERENCE RECORDS -->
<?php if (!empty($record['cw']) | !empty($record['cl']) ): ?>
    <?php if (!empty($team_season->league_torunament_finish)): ?>
    <span class="col-sm-12">Conference Tournament <?= $team_season->league_torunament_finish; ?></span>
    <?php endif; ?>
<?php endif; ?>
    <!-- POSTSEASON RECORD -->
<?php if (!empty($record['pw'] | !empty($record['pl']))): ?>
    <div class="row">
        <span class="col-sm-6">Postseason: <?= $team_season->last_post_game; ?></span>
    </div>    
<?php endif; ?>
    <!-- SEASON NOTES -->
<?= !empty($team_season->team_season_notes) ? '<div class="row"><span class="col-sm-6">'.$team_season->team_season_notes.'</span></div>':''; ?>
<hr>
    <!-- RECAP AND PREVIEW -->
<!--<div class="row">    
    <?php if (!empty($team_season->team_season_preview)): ?>
    <span>Preview <a href="#preview" data-toggle="collapse">^</a></span>
    <div id="preview" class="col-sm-12 collapse <?= empty($team_season->team_season_recap) ? 'in' : '' ?>">
        <?= $team_season->team_season_preview; ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($team_season->team_season_recap)): ?>
    <span>Recap <a href="#recap" data-toggle="collapse">^</a></span>
    <div id="recap" class="col-sm-12 collapse in">
        <?= $team_season->team_season_recap; ?>
    </div>
    <?php endif; ?>
    <?= (empty($team_season->team_season_preview) && empty($team_season->team_season_recap)) ? '<span class="col-sm-12">No Story</span>' : '' ?>
</div>-->
<div class="btn-group">
    <?=
    Html::anchor(
        'admin/team/season/edit/' . $team_season->id, 'Edit Details',
        ['class' => 'btn btn-warning']
    );
    ?>
    <button type="button" class="btn btn-success" onclick="history.back()">Back</button>
</div>
    <!-- SEASON GAMES -->
<?php if (isset($team_season->games)): ?>
    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th></th>
                    <th>Opponent</th>
                    <th class="d-none d-lg-table-cell"></th>
                    <th></th>
                    <th>W/L</th>
                    <th>Final</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($team_season->games as $item): ?>
                    <tr>
                        <td><?= $item->game_date; ?></td>
                        <td class="d-flex justify-content-end"><span class="d-none d-lg-inline"><?= $item->mur_rk; ?>&nbsp; </span><span class="d-none d-lg-inline">Racers&nbsp;</span><span> <?= $item->hrn == '1' ? 'Vs' : ($item->hrn == '2' ? '@' : 'Vs'); ?></span></td>
                        <td><span class="d-none d-lg-inline"><?= $item->opp_rk; ?>&nbsp;</span><span class="d-none d-md-inline"><?= $item->opponents->opponent_name; ?></span><span class="d-md-none"><?= $item->opponents->opponent_short; ?></span></td>
                        <td><?= (($item->game_types->conf == '1' && $item->game_types->post == '1')? 't' : ($item->game_types->post == '1' ? '^' : ($item->game_types->conf == '1' ? '*' : ''))); ?></td>
                        <td class="d-none d-lg-table-cell"><?= $item->places->place_name; ?>, <?= $item->places->place_state; ?></td>
                        <td><?= $item->w == '1' ? 'W' : ($item->l == '1' ? 'L' : ''); ?></td>
                        <td><?= Html::anchor('game/view/' . $item->id, $item->pts_mur.' - '.$item->pts_opp); ?><?= ($item->ot == '1' ? '<span class="d-none d-sm-inline"> OT</span>' : (empty($item->ot) ? '' : '<span class="d-none d-sm-inline"> '.$item->ot.' OT</span>')); ?></td>
                        <td>
                            <?=
                            Html::anchor(
                                'admin/game/view/' . $item->id, 'View'
                            );
                            ?> |
                            <?=
                            Html::anchor(
                                'admin/game/edit/' . $item->id, 'Edit'
                            );
                            ?> |
                            <?=
                            Html::anchor(
                                'admin/game/delete/' . $item->id, 'Delete',
                                array('onclick' => "return confirm('Are you sure?')")
                            );
                            ?>
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
    <?=
    Html::anchor(
        'admin/game/create/' . $team_season->id, 'Add new Game', array('class' => 'btn btn-success')
    );
    ?>
</p>
<!-- SEASON ROSTER -->
<h2>Roster</h2>
<?php if ($team_season->team_season_roster): ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
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
                        <td><?= Html::anchor('person/view/' . $item->persons->id,$item->persons->display); ?></td>
                        <td><?= $item->roster_year; ?></td>
                        <td><?= $item->roster_number; ?></td>
                        <td><?= $item->roster_position; ?></td>
                        <td><?= $item->roster_height; ?></td>
                        <td><?= $item->roster_weight; ?></td>
                        <td>
                            <?=
                            Html::anchor(
                                'admin/person/view/' . $item->persons->id, 'View'
                            );
                            ?> |
                            <?=
                            Html::anchor(
                                'admin/team/season/roster/edit/' . $item->id, 'Edit'
                            );
                            ?> |
                            <?=
                            Html::anchor(
                                'admin/team/season/roster/delete/' . $item->id, 'Delete',
                                ['onclick' => "return confirm('Are you sure?')"]
                            );
                            ?>
                            <?=
                            $item->stat_basket_season_person ? '' : '|' . Html::anchor(
                                    'admin/stat/basket/season/person/create/' . $item->id, 'Add Stats'
                            );
                            ?>
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
    <?=
    Html::anchor(
        'admin/team/season/roster/create/' . $team_season->id, 'Add To Roster', ['class' => 'btn btn-success']
    );
    ?>
</p>
<hr><!-- SEASON STATS -->
<h2>Stats</h2>
<div class="row">
    <?php if ($team_season->team_season_roster || $team_season->stat_basket_season_team): ?>
    <div class="d-flex flex-row-reverse d-md-none">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="showall" name="showall" onclick="showStats()">
            <label class="form-check-label" for="showall">Show All</label>
        </div> 
    </div>
    <div class="col-sm-<?= $team_season->stat_basket_season_team && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA'])) ? 12 : 9 ;?> table-responsive"> 
        <table class="table table-sm table-striped border">
            <thead>
                <tr class="border">
                    <?= $team_season->team_season_roster ? '<th rowspan="2" colspan="1">Name</th>' : '' ; ?>
                    <?= isset($stats['GP']) ? '<th class="border" rowspan="2" colspan="1">GP</th>' : '' ; ?>                    
                    <?= isset($stats['GS']) ? '<th name="hide" class="border d-none d-md-table-cell" rowspan="2" colspan="1">GS</th>' : '' ; ?>
                    <?= (isset($stats['MIN']) && $team_season->team_season_roster) ? '<th name="hide" class="border d-none d-md-table-cell" rowspan="2" colspan="1">Min</th>' : '' ; ?>
                    <th class="border text-center" rowspan="<?= isset($stats['FGA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FGA']) ? 2 : 1 ;?>">FG</th>
                    <?= isset($stats['TPM']) ? '<th class="border text-center" rowspan="1" colspan="'.(isset($stats['TPA']) ? 2 : 1).'">3P</th>' : '' ; ?>
                    <th class="border text-center" rowspan="<?= isset($stats['FTA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FTA']) ? 2 : 1 ;?>">FT</th>
                    <?= isset($stats['ORB']) ? '<th name="hide" class="border text-center d-none d-md-table-cell" rowspan="1" colspan="'.(isset($stats['DRB']) ? 3 : 2).'">Rebounds</th><th name="show" class="border d-md-none" rowspan="2" colspan="1">RB</th>' : (isset($stats['RB']) ? '<th class="border" rowspan="2" colspan="1">RB</th>' : '') ; ?>
                    <?= isset($stats['PF']) ? '<th name="hide" class="border text-center d-none d-md-table-cell" rowspan="'.(isset($stats['FD']) ? 1 : 2).'" colspan="'.(isset($stats['FD']) ? 2 : 1).'">'.(isset($stats['FD']) ? 'Fouls' : 'PF').'</th>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<th class="border text-center" rowspan="2" colspan="1">AS</th>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<th name="hide" class="border text-center d-none d-md-table-cell" rowspan="2" colspan="1">TO</th>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<th class="border text-center" rowspan="2" colspan="1">ST</th>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<th name="hide" class="border text-center d-none d-md-table-cell" rowspan="'.(isset($stats['BD']) ? 1 : 2).'" colspan="'.(isset($stats['BD']) ? 2 : 1).'">'.(isset($stats['BD']) ? 'Blocks' : 'BS').'</th><th name="show" class="border d-md-none"rowspan="2" colspan="1">BS</th>' : '' ; ?>
                    <th class="border text-center" rowspan="2" colspan="1">PTS</th>
                    <th rowspan="2"></th>
                </tr>
                <tr>
                    <?= isset($stats['FGA']) ? '<th class="text-center border">M</th>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<th class="text-center border">A</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="text-center border">M</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="text-center border">A</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="text-center border">M</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="text-center border">A</th>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">OR</th>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">DR</th>' : '' ; ?>
                    <?= (isset($stats['ORB']) || isset($stats['DRB'])) ? '<th name="hide" class="text-center border d-none d-md-table-cell">TOT</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">PF</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">FD</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">BS</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">BA</th>' : '' ; ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($stats['person']): ?> <!-- Individual Box -->
                <?php foreach ($stats['person'] as $value): ?>
                <tr> 
                    <?= '<td>'.$value->team_season_roster->persons->display.'</td>' ;?>
                    <?= isset($stats['GP']) ? '<td class="text-center border">'.$value->GP.'</td>' : '' ; ?>
                    <?= isset($stats['GS']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">'.$value->GS.'</td>' : '' ; ?>
                    <?= isset($stats['MIN']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">'.$value->MIN.'</td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<td class="text-center border">'.$value->FGM.'</td>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<td class="text-center border">'.$value->FGA.'</td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td class="text-center border">'.$value->TPM.'</td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td class="text-center border">'.$value->TPA.'</td>' : '' ; ?>
                    <?= isset($stats['FTM']) ? '<td class="text-center border">'.$value->FTM.'</td>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<td class="text-center border">'.$value->FTA.'</td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">'.$value->ORB.'</td>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">'.$value->DRB.'</td>' : '' ; ?>
                    <?= isset($stats['RB']) ? '<td class="text-center border ">'.$value->RB.'</td>' : '' ; ?>
                    <?= isset($stats['PF']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">'.$value->PF.'</td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">'.$value->FD.'</td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td class="text-center border ">'.$value->AST.'</td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">'.$value->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="text-center border ">'.$value->STL.'</td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="text-center border ">'.$value->BS.'</td>' : '' ; ?>
                    <?= isset($stats['BD']) ? 'name="hide" <td class="text-center border d-none d-md-table-cell">'.$value->BD.'</td>' : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="text-center border ">'.$value->PTS.'</td>' : '' ; ?>
                    <td><?=
                            Html::anchor(
                                'admin/stat/basket/season/person/edit/' . $value->id, 'edit',
                                ['class' => '']
                            );
                            ?>|<?=
                            Html::anchor(
                                'admin/stat/basket/season/person/delete/' . $value->id, 'Delete',
                                [
                                    'onclick' => "return confirm('Are you sure?')"]
                            );
                            ?>
                    </td>
                </tr>
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
                        <th>TEAM TOTAL</th>
                        <?= isset($stats['GP']) ? '<th name="hide" '.($team_season->stat_basket_season_opponent ? ' rowspan="2" ' : '').''.(isset($stats['GS']) ? 'colspan="2"' : '').'class="text-center border d-none d-md-table-cell">'.$value->GP.'</th><th name="show" class="border d-md-none" '.($team_season->stat_basket_season_opponent ? ' rowspan="2" ' : '').' colspan="1">'.$value->GP.'</th>' : ''; ?>
                        <?= isset($stats['MIN']) ? '<th name="hide" '.($team_season->stat_basket_season_opponent ? ' rowspan="2" ' : '').'class="text-center border d-none d-md-table-cell">'.$value->MIN.'</th>' : ''; ?>
                        <?= isset($stats['FGM']) ? '<th class="text-center border">'.$value->FGM.'</th>' : ''; ?>
                        <?= isset($stats['FGA']) ? '<th class="text-center border">'.$value->FGA.'</th>' : ''; ?>
                        <?= isset($stats['TPM']) ? '<th class="text-center border">'.$value->TPM.'</th>' : ''; ?>
                        <?= isset($stats['TPA']) ? '<th class="text-center border">'.$value->TPA.'</th>' : ''; ?>
                        <?= isset($stats['FTM']) ? '<th class="text-center border">'.$value->FTM.'</th>' : ''; ?>
                        <?= isset($stats['FTA']) ? '<th class="text-center border">'.$value->FTA.'</th>' : ''; ?>
                        <?= isset($stats['ORB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">'.$value->ORB.'</th>' : ''; ?>
                        <?= isset($stats['DRB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">'.$value->DRB.'</th>' : ''; ?>
                        <?= isset($stats['RB']) ? '<th class="text-center border">'.$value->RB.'</th>' : ''; ?>
                        <?= isset($stats['PF']) ? '<th name="hide" class="text-center border d-none d-md-table-cell"'.(isset($stats['FD']) ? 'colspan="2"' : '').'>'.$value->PF.'</th>' : ''; ?>
                        <?= isset($stats['AST']) ? '<th class="text-center border">'.$value->AST.'</th>' : ''; ?>
                        <?= isset($stats['TRN']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">'.$value->TRN.'</th>' : ''; ?>
                        <?= isset($stats['STL']) ? '<th class="text-center border">'.$value->STL.'</th>' : ''; ?>
                        <?= isset($stats['BS']) ? '<th class="text-center border"'.(isset($stats['BD']) ? 'colspan="2"' : '').'>'.$value->BS.'</th>' : ''; ?>
                        <?= isset($stats['PTS']) ? '<th class="text-center border">'.$value->PTS.'</th>' : ''; ?>
                        <td><?=
                                        Html::anchor(
                                            'admin/stat/basket/season/team/edit/' . $value->id, 'edit', ['class' => '']
                                        );
                                        ?>|<?=
                                        Html::anchor(
                                            'admin/stat/basket/season/team/delete/' . $value->id, 'Delete',
                                            [
                                                'onclick' => "return confirm('Are you sure?')"]
                                        );
                                        ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?> 
                <?php if ($team_season->stat_basket_season_opponent): ?>    
                    <?php foreach ($team_season->stat_basket_season_opponent as $value): ?>
                    <tr>
                        <th>OPPONENT TOTAL</th>
                        <?= isset($stats['FGM']) ? '<th class="text-center border">'.$value->FGM.'</th>' : ''; ?>
                        <?= isset($stats['FGA']) ? '<th class="text-center border">'.$value->FGA.'</th>' : ''; ?>
                        <?= isset($stats['TPM']) ? '<th class="text-center border">'.$value->TPM.'</th>' : ''; ?>
                        <?= isset($stats['TPA']) ? '<th class="text-center border">'.$value->TPA.'</th>' : ''; ?>
                        <?= isset($stats['FTM']) ? '<th class="text-center border">'.$value->FTM.'</th>' : ''; ?>
                        <?= isset($stats['FTA']) ? '<th class="text-center border">'.$value->FTA.'</th>' : ''; ?>
                        <?= isset($stats['ORB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">'.$value->ORB.'</th>' : ''; ?>
                        <?= isset($stats['DRB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">'.$value->DRB.'</th>' : ''; ?>
                        <?= isset($stats['RB']) ? '<th class="text-center border">'.$value->RB.'</th>' : ''; ?>
                        <?= isset($stats['PF']) ? '<th name="hide" class="text-center border d-none d-md-table-cell"'.(isset($stats['FD']) ? 'colspan="2"' : '').'>'.$value->PF.'</th>' : ''; ?>
                        <?= isset($stats['AST']) ? '<th class="text-center border">'.$value->AST.'</th>' : ''; ?>
                        <?= isset($stats['TRN']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">'.$value->TRN.'</th>' : ''; ?>
                        <?= isset($stats['STL']) ? '<th class="text-center border">'.$value->STL.'</th>' : ''; ?>
                        <?= isset($stats['BS']) ? '<th class="text-center border"'.(isset($stats['BD']) ? 'colspan="2"' : '').'>'.$value->BS.'</th>' : ''; ?>
                        <?= isset($stats['PTS']) ? '<th class="text-center border">'.$value->PTS.'</th>' : ''; ?>
                        <td><?=
                                        Html::anchor(
                                            'admin/stat/basket/season/opponent/edit/' . $value->id, 'edit',
                                            ['class' => '']
                                        );
                                        ?>|<?=
                                        Html::anchor(
                                            'admin/stat/basket/season/opponent/delete/' . $value->id, 'Delete',
                                            [
                                                'onclick' => "return confirm('Are you sure?')"]
                                        );
                                        ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>  
                <?php endif; ?>    
            </tfoot>
            <?php endif; ?> 
        </table>
        
            <?=
            $team_season->stat_basket_season_team ? '' : Html::anchor(
                    'admin/stat/basket/season/team/create/' . $team_season->id, 'Add Season Team Stats',
                    array(
                        'class' => 'btn btn-success')
            );
            ?>
            <?=
            $team_season->stat_basket_season_opponent ? '' : Html::anchor(
                    'admin/stat/basket/season/opponent/create/' . $team_season->id, 'Add Season Opponent Stats',
                    array(
                        'class' => 'btn btn-success')
            );
            ?>
    </div>
<?php endif; ?>
</div>    
    <script>
            function showStats(){
                let hide = document.getElementsByName("hide"); 
                let show = document.getElementsByName("show"); 
                let x = document.getElementById("showall").checked;
                if (x) {
                    hide.forEach((hide) => {
                        hide.classList.remove("d-none" , "d-md-table-cell"); 
                    }); 
                    show.forEach((show) => { 
                        show.classList.replace("d-md-none", "d-none");
                    });   
                } else {
                    hide.forEach((hide) => {
                        hide.classList.add("d-none" , "d-md-table-cell"); 
                    });  
                    show.forEach((show) => {
                        show.classList.replace("d-none", "d-md-none");
                    });   
                }    
            }
    </script>
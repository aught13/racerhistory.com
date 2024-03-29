<?php 
/**
 * /app/views/game/view
 * 
 * Single game view
 *
 */
?>
<div class="row">
    <span class="h3 col-xl-6 text-center text-nowrap text-break">
        <?= "Murray State " . $game->team_season->teams->team_name.' '.$game->team_season->seasons->start.'-'.$game->team_season->seasons->end; ?>    
    </span>
    <span class="h3 col-xl-1 text-center text-nowrap">
        <?= $game->hrn == 1 ? 'Vs' : ($game->hrn == 2 ? '@' : 'Vs'); ?>
    </span>
    <span class="h3 col-xl-5 text-center text-nowrap">
        <?= $game->opponents->opponent_name ;?>
    </span>
    <span class="h3 col-sm-12 text-center text-nowrap">
        <?= date_format(date_create($game->game_date), "l, F jS, Y"); ?>
    </span>
    <hr>
</div>
<div class='container'>
    <!-- Score -->
    <div class='row'>
        <div class='col-md-8'>
            <table class='table text-center'>
                <thead>
                    <tr>
                        <th class='text-center h2'><?= (!empty($game->mur_rk) ? "#".$game->mur_rk." " : ""); ?>Murray State</th>
                        <th></th>
                        <th class='text-center h2'><?= (!empty($game->opp_rk) ? "#".$game->opp_rk." " : ""); ?><?= $game->opponents->opponent_name ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 40px; font-weight: <?= ($game->w == '1' ? 'bold' : 'normal'); ?>;" ><?= $game->pts_mur; ?></td>
                        <td></td>
                        <td style="font-size: 40px; font-weight: <?= ($game->l == '1' ? 'bold' : 'normal'); ?>;"><?= $game->pts_opp; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class='col-md-4'><!-- Points by period -->            
            <?php if (isset($game->mur_1)) : ?>
            <table class='table table-condensed table-bordered '>
                <thead>
                    <tr>
                        <th></th>
                        <?php $x=1;
                            //add columns dynamicaly as needed
                            while (isset($game->{'mur_'.$x})) {
                            echo '<th>'.$x.'</th>';
                            $x++;
                            } ?>
                        <?php $x=1;
                            while (isset($game->{'mur_ot_'.$x})) {
                            echo '<th>OT'.$x.'</th>';
                            $x++;
                            } ?>
                        <th>F</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MURRAY</td>
                        <?php $x=1;
                            //set values dynamically as needed
                            while (isset($game->{'mur_'.$x})) {
                            echo '<td>'.$game->{'mur_'.$x}.'</td>';
                            $x++;
                            } ?>
                        <?php $x=1;
                            while (isset($game->{'mur_ot_'.$x})) {
                            echo '<td>'.$game->{'mur_ot_'.$x}.'</td>';
                            $x++;
                            } ?>
                        <td style="font-weight: <?= ($game->w == '1' ? 'bold' : 'normal'); ?>;"><?= $game->pts_mur; ?></td>
                    </tr>
                    <tr>
                        <td><?= $game->opponents->opponent_short; ?></td>
                        <?php $x=1;
                            //set values dynamically as needed
                            while (isset($game->{'opp_'.$x})) {
                            echo '<td>'.$game->{'opp_'.$x}.'</td>';
                            $x++;
                            } ?>
                        <?php $x=1;
                            while (isset($game->{'opp_ot_'.$x})) {
                            echo '<td>'.$game->{'opp_ot_'.$x}.'</td>';
                            $x++;
                            } ?>
                        <td style="font-weight: <?= ($game->l == '1' ? 'bold' : 'normal'); ?>;"><?= $game->pts_opp; ?></td>
                    </tr>
                </tbody>
            </table>            
            <?php endif; ?>
            <span class=""><?= $game->game_types->game_type_name; ?></span>
        </div>
    </div>
    <hr> <!-- Game Details -->
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <!-- Site -->
                <div class='col-lg-9 h4'>
                    <?= $game->places->place_name.', '.$game->places->place_state; ?> <?= empty($game->site_id) ? '' : $game->sites->site_name; ?>
                </div>
                <!-- Attendance -->
                <div class="col-lg-3">
                    <?= !empty($game->attendance) ? 'Attendance: '. number_format(floatval($game->attendance)) : '';?>
                </div>
            </div>
            <!-- Refs -->
            <div>
                <?= ($game->ref_1 ?? false && ($game->ref_2 ?? false || $game->ref_3 ?? false)) ? 'Referees:' : ''?>
                <?= !empty($game->ref_1 ?? null) ? $game->ref_1 : ''; ?><?= ($game->ref_1 ?? false && ($game->ref_2 ?? false || $game->ref_3 ?? false)) ? ', ' : ''?><?= !empty($game->ref_2 ?? null) ? $game->ref_2 : ''; ?><?= $game->ref_3 ?? false ? ', ' : ''; ?><?= $game->ref_3 ?? ''; ?>
            </div>
            <!-- Notes -->
            <div>
                <span><?= $game->game_notes; ?></span>
            </div>
        </div>
        <div class="col-md-4">
             <!-- Time -->
            <div>
                <span><?= !empty($game->game_time) ? 'Game Time: '.date_format(date_create($game->game_time), 'g:i A') : '';?></span>
            </div>
            <!-- Duration -->
            <div>
                <span><?= !empty($game->game_duration) ? 'Duration: '.date_format(date_create($game->game_duration), 'G\h i\m') : '';?></span>
            </div>
        </div>
    </div>
</div>
<hr><!-- Begin Stats -->

<div class="row"><!-- Murray Stats -->
    <?php if ($game->person_box || $game->game_box_mur): ?>
    <div class="col-sm-<?= $game->game_box_mur && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA'])) ? 12 : 9 ;?> table-responsive"> <!-- Murray Box -->
        <span class="h4">Murray State - <?= !empty($game->pts_mur) ? $game->pts_mur : '' ?></span>
        <table class="table table-sm table-striped border align-middle">
            <thead>
                <tr class="border">
                    <th class="border border-end-0 text-center" rowspan="2" colspan="<?= $game->person_box ? 1 : 3 ; ?>"><?= $game->person_box ? '#' : '' ; ?></th>
                    <?= $game->person_box ? '<th class="border border-start-0" rowspan="2" colspan="2">Name</th>' : '' ; ?>
                    <?= (isset($stats['MIN']) && $game->person_box) ? '<th class="border d-none d-md-table-cell" rowspan="2" colspan="1">Min</th>' : '' ; ?>
                    <th class="border text-center" rowspan="<?= isset($stats['FGA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FGA']) ? 2 : 1 ;?>">FG</th>
                    <?= isset($stats['TPM']) ? '<th class="border text-center" rowspan="1" colspan="'.(isset($stats['TPA']) ? 2 : 1).'">3P</th>' : '' ; ?>
                    <th class="border text-center d-none d-md-table-cell" rowspan="<?= isset($stats['FTA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FTA']) ? 2 : 1 ;?>">FT</th>
                    <?= isset($stats['ORB']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="1" colspan="'.(isset($stats['DRB']) ? 3 : 2).'">Rebounds</th><th class="border d-md-none"rowspan="2" colspan="1">RB</th>' : (isset($stats['RB']) ? '<th class="border " rowspan="2" colspan="1">RB</th>' : '') ; ?>
                    <?= isset($stats['PF']) ? '<th class="border text-center" rowspan="'.(isset($stats['FD']) ? 1 : 2).'" colspan="'.(isset($stats['FD']) ? 2 : 1).'">'.(isset($stats['FD']) ? 'Fouls' : 'PF').'</th>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<th class="border text-center" rowspan="2" colspan="1">AS</th>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="2" colspan="1">TO</th>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="2" colspan="1">ST</th>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="'.(isset($stats['BD']) ? 1 : 2).'" colspan="'.(isset($stats['BD']) ? 2 : 1).'">'.(isset($stats['BD']) ? 'Blocks' : 'BS').'</th>' : '' ; ?>
                    <th class="border text-center" rowspan="2" colspan="1">PTS</th>
                </tr>
                <tr>
                    <?= isset($stats['FGA']) ? '<th class="text-center border">M</th>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<th class="border text-center">A</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="border text-center">M</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="border text-center">A</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="border text-center d-none d-md-table-cell">M</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="border text-center d-none d-md-table-cell">A</th>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<th class="border text-center d-none d-md-table-cell">OR</th>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<th class="border text-center d-none d-md-table-cell">DR</th>' : '' ; ?>
                    <?= (isset($stats['ORB']) || isset($stats['DRB'])) ? '<th class="border text-center d-none d-md-table-cell">TRB</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th class="border text-center">PF</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th class="border text-center d-none d-md-table-cell">FD</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th class="border text-center d-none d-md-table-cell">BS</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th class="border text-center d-none d-md-table-cell">BA</th>' : '' ; ?>
                </tr>
            </thead>
            <tbody><!-- Individual Box -->
                <?php if ($game->person_box): ?> 
                <?php 
                /*
                 * Sort the ind box by PTS and weather the player started
                 */
                foreach ($game->person_box as $row) {
                    foreach ($row as $key => $value){
                        ${$key}[]  = $value; 
                    }  
                }
                array_multisort($GS, SORT_DESC, $PTS, SORT_DESC, $game->person_box);
                unset($PTS);
                unset($GS);?>
                <?php foreach ($game->person_box as $value):  ?>
                <tr class="border">
                    <?= '<td class="text-center">'.$value->team_season_roster->roster_number.'</td>' ;?>
                    <?= '<td>'.$value->team_season_roster->persons->display.'</td>' ;?>
                    <?= !empty($value->GS) ? '<td class="text-center">'.(empty($value->team_season_roster->roster_position) ? '*' : $value->team_season_roster->roster_position).'</td>' : '<td></td>' ;?>
                    <?= isset($stats['MIN']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->MIN.'</td>' : '' ; ?>
                    <td class="border text-center"><?= $value->FGM; ?></td> 
                    <?= isset($stats['FGA']) ? '<td class="border text-center">'.$value->FGA.'</td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td class="border text-center">'.$value->TPM.'</td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td class="border text-center">'.$value->TPA.'</td>' : '' ; ?>
                    <td class="border text-center d-none d-md-table-cell"><?= $value->FTM; ?></td>
                    <?= isset($stats['FTA']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->FTA.'</td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->ORB.'</td>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->DRB.'</td>' : '' ; ?>
                    <?= isset($stats['RB']) ? '<td class="border text-center">'.$value->RB.'</td>' : '' ; ?>
                    <?= isset($stats['PF']) ? '<td class="border text-center">'.$value->PF.'</td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->FD.'</td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td class="border text-center">'.$value->AST.'</td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->STL.'</td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->BS.'</td>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->BD.'</td>' : '' ; ?>
                    <td class="border text-center"><?=$value->PTS; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr></tr>
                <?php endif; ?>
                <?php if ($game->team_box): ?><!-- team -->
                <?php foreach ($game->team_box as $value): ?>
                <tr class="border">
                    <td colspan="3">Team</td>
                    <?= isset($stats['MIN']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['FTM']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->ORB.'</td>' : ''; ?>
                    <?= isset($stats['DRB']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->DRB.'</td>' : ''; ?>
                    <?= isset($stats['RB']) ? '<td class="border text-center">'.$value->RB.'</td>' : ''; ?>                    
                    <?= isset($stats['PF']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="border text-center">'.$value->PTS.'</td>' : ''; ?>
                </tr>                
                <?php endforeach; ?>
                <?php endif; ?>
                
            </tbody>    
            <?php if ($game->game_box_mur): ?><!-- totals -->
            <tfoot>
                <?php foreach ($game->game_box_mur as $value): ?>
                <?php if ($value->period == 'Z'): ?>
                <tr>
                    <th colspan="3"><?= $value->period == 'Z' ? 'TOTALS' : Inflector::ordinalize($value->period).' Half'; ?></th>
                    <?= isset($stats['MIN']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<th class="border text-center">'.$value->FGM.'</th>' : ''; ?>
                    <?= isset($stats['FGA']) ? '<th class="border text-center">'.$value->FGA.'</th>' : ''; ?>
                    <?= isset($stats['TPM']) ? '<th class="border text-center">'.$value->TPM.'</th>' : ''; ?>
                    <?= isset($stats['TPA']) ? '<th class="border text-center">'.$value->TPA.'</th>' : ''; ?>
                    <?= isset($stats['FTM']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->FTM.'</th>' : ''; ?>
                    <?= isset($stats['FTA']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->FTA.'</th>' : ''; ?>
                    <?= isset($stats['ORB']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->ORB.'</th>' : ''; ?>
                    <?= isset($stats['DRB']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->DRB.'</th>' : ''; ?>
                    <?= isset($stats['RB']) ? '<th class="border text-center">'.$value->RB.'</th>' : ''; ?>
                    <?= isset($stats['PF']) ? '<th class="border text-center"'.(isset($stats['FD']) ? 'colspan="2"' : '').'>'.$value->PF.'</th>' : ''; ?>
                    <?= isset($stats['AST']) ? '<th class="border text-center">'.$value->AST.'</th>' : ''; ?>
                    <?= isset($stats['TRN']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->TRN.'</th>' : ''; ?>
                    <?= isset($stats['STL']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->STL.'</th>' : ''; ?>
                    <?= isset($stats['BS']) ? '<th class="border text-center d-none d-md-table-cell"'.(isset($stats['BD']) ? 'colspan="2"' : '').'>'.$value->BS.'</th>' : ''; ?>
                    <?= isset($stats['PTS']) ? '<th class="border text-center">'.$value->PTS.'</th>' : ''; ?>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </tfoot>
            <?php endif; ?>
        </table>
        <span class="pull-right">Technical Fouls:: <?= isset($techs['murtot']) ? $techs['murtot'] : 'NONE'; ?>
            <?php if (isset($techs['mur'])) : ?>
            <?php $mscnt = $techs['murcnt'] ?? 0; ?> (
                <?php foreach ($techs['mur'] as $key => $value) : ?>
                    <?= $key; ?><?= $value > 1 ? '('.$value.')' : '' ;?><?= $mscnt-- > 1 ? ', ' : '' ;?>
                <?php endforeach; ?>  
            )<?php endif; ?>
        </span>
    </div>
    <?php endif; ?>
    <?php if ($game->game_box_mur && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA']))): ?>
    <div class="col-sm-12 table-responsive"><!-- Murray Shooting -->        
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th rowspan="1" colspan="1">Murray Shooting</th>
                    <th class="text-center" rowspan="1" colspan="2">FG</th>
                    <?= isset($stats['TPA']) ? '<th class="text-center" rowspan="1" colspan="2">3PT</th>' : '';?>
                    <th class="text-center" rowspan="1" colspan="2">FT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($game->game_box_mur as $box): ?>
                <?php if ($box->period != 'Z'):?>
                <tr>
                    <th rowspan="1" colspan="1"><?= is_numeric($box->period) ? Inflector::ordinalize($box->period) : $box->period; ?></th>
                    <td class="text-center" rowspan="1" colspan="1"><?= empty($box->FGA) ? ($box->FGM > 0 ? $box->FGM : '-') : $box->FGM.'-'.$box->FGA; ?></td>
                    <?= !empty($box->FGA) && $box->FGA > 0 ? '<td class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FGM)/ intval($box->FGA)))*100),1).'%</td>' : '<td class="text-center">-</td>'; ?>
                    <?php if ($box->TPM != ''): ?>
                    <td class="text-center" rowspan="1" colspan="1"><?= empty($box->TPA) ? ($box->TPM > 0 ? $box->TPM : '-') : $box->TPM.'-'.$box->TPA; ?></td>
                    <?= !empty($box->TPA) && $box->TPA > 0 ? '<td class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->TPM)/ intval($box->TPA)))*100),1).'%</td>' : '<td class="text-center">-</td>'; ?>
                    <?php endif; ?>
                    <td class="text-center" rowspan="1" colspan="1"><?= empty($box->FTA) ? ($box->FTM > 0 ? $box->FTM : '-') : $box->FTM.'-'.$box->FTA; ?></td>
                    <?= !empty($box->FTA) && $box->FTA > 0 ? '<td class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FTM)/ intval($box->FTA)))*100),1).'%</td>' : '<td class="text-center">-</td>'; ?>
                </tr>
                <?php endif; ?>
               <?php endforeach; ?>
            </tbody>
            <tfoot>
                <?php foreach ($game->game_box_mur as $box): ?>
                <?php if ($box->period == 'Z'):?>
                <tr>
                    <th rowspan="1" colspan="1">TOTALS</th>
                    <th class="text-center" rowspan="1" colspan="1"><?= empty($box->FGA) ? ($box->FGM > 0 ? $box->FGM : '-') : $box->FGM.'-'.$box->FGA; ?></th>
                    <?= !empty($box->FGA) && $box->FGA > 0 ? '<th class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FGM)/ intval($box->FGA)))*100),1).'%</th>' : '<td class="text-center">-</td>'; ?>
                    <?php if ($box->TPM != ''): ?>
                    <th class="text-center" rowspan="1" colspan="1"><?= empty($box->TPA) ? ($box->TPM > 0 ? $box->TPM : '-') : $box->TPM.'-'.$box->TPA; ?></th>
                    <?= !empty($box->TPA) && $box->TPA > 0 ? '<th class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->TPM)/ intval($box->TPA)))*100),1).'%</th>' : '<td class="text-center">-</td>'; ?>
                    <?php endif; ?>
                    <th class="text-center" rowspan="1" colspan="1"><?= empty($box->FTA) ? ($box->FTM > 0 ? $box->FTM : '-') : $box->FTM.'-'.$box->FTA; ?></th>
                    <?= !empty($box->FTA) && $box->FTA > 0 ? '<th class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FTM)/ intval($box->FTA)))*100),1).'%</th>' : '<td class="text-center">-</td>'; ?>
                </tr>
                <?php endif; ?>
               <?php endforeach; ?>
            </tfoot>
        </table>        
    </div> 
    <?php endif; ?>
</div>
<div class="row"><!-- Opponent Stats -->
    <?php if ($game->opponent_box || $game->game_box_opp): ?>
    <div class="col-sm-<?= $game->game_box_opp && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA'])) ? 12 : 9 ;?> table-responsive"> <!-- Opponent Box -->
        <span class="h4"><?=$game->opponents->opponent_name; ?> - <?= !empty($game->pts_opp) ? $game->pts_opp : '' ?></span>
        <table class="table table-sm table-striped align-middle border">
            <thead>
                <tr class="border">
                    <th class="border-start" rowspan="2" colspan="<?= $game->opponent_box ? 1 : (isset($stats['MIN']) ? 4 : 3) ; ?>"><?= $game->opponent_box ? '#' : '' ; ?></th>
                    <?= $game->opponent_box ? '<th rowspan="2" colspan="2">Name</th>' : '' ; ?>
                    <?= (isset($stats['MIN']) && $game->opponent_box) ? '<th class="border d-none d-md-table-cell" rowspan="2" colspan="1">Min</th>' : '' ; ?>
                    <th class="border text-center" rowspan="<?= isset($stats['FGA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FGA']) ? 2 : 1 ;?>">FG</th>
                    <?= isset($stats['TPM']) ? '<th class="border text-center" rowspan="1" colspan="'.(isset($stats['TPA']) ? 2 : 1).'">3P</th>' : '' ; ?>
                    <th class="border text-center d-none d-md-table-cell" rowspan="<?= isset($stats['FTA']) ? 1 : 2 ;?>" colspan="<?= isset($stats['FTA']) ? 2 : 1 ;?>">FT</th>
                    <?= isset($stats['ORB']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="1" colspan="'.(isset($stats['DRB']) ? 3 : 2).'">Rebounds</th><th class="border d-md-none"rowspan="2" colspan="1">RB</th>' : (isset($stats['RB']) ? '<th class="border" rowspan="2" colspan="1">RB</th>' : '') ; ?>
                    <?= isset($stats['PF']) ? '<th class="border text-center" rowspan="'.(isset($stats['FD']) ? 1 : 2).'" colspan="'.(isset($stats['FD']) ? 2 : 1).'">'.(isset($stats['FD']) ? 'Fouls' : 'PF').'</th>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<th class="border text-center" rowspan="2" colspan="1">AS</th>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="2" colspan="1">TO</th>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="2" colspan="1">ST</th>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<th class="border text-center d-none d-md-table-cell" rowspan="'.(isset($stats['BD']) ? 1 : 2).'" colspan="'.(isset($stats['BD']) ? 2 : 1).'">'.(isset($stats['BD']) ? 'Blocks' : 'BS').'</th>' : '' ; ?>
                    <th class="border text-center" rowspan="2" colspan="1">PTS</th>
                </tr>
                <tr>
                    <?= isset($stats['FGA']) ? '<th class="border text-center">M</th>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<th class="border text-center">A</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="border text-center">M</th>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<th class="border text-center">A</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="border text-center d-none d-md-table-cell">M</th>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<th class="border text-center d-none d-md-table-cell">A</th>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<th class="border text-center d-none d-md-table-cell">OR</th>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<th class="border text-center d-none d-md-table-cell">DR</th>' : '' ; ?>
                    <?= (isset($stats['ORB']) || isset($stats['DRB'])) ? '<th class="border text-center d-none d-md-table-cell">TOT</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th class="border text-center">PF</th>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<th class="border text-center d-none d-md-table-cell">FD</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th class="border text-center d-none d-md-table-cell">BS</th>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<th class="border text-center d-none d-md-table-cell">BA</th>' : '' ; ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($game->opponent_box): ?> <!-- Individual Box -->
                <?php
                /*
                 * Sort the ind box by PTS and weather the player started
                 */
                foreach ($game->opponent_box as $row) {
                    foreach ($row as $key => $value){
                        ${$key}[]  = $value; 
                    }  
                }
                array_multisort($GS, SORT_DESC, $PTS, SORT_DESC, $game->opponent_box);?>
                <?php foreach ($game->opponent_box as $value): ?>
                <tr class="border">
                    <?= '<td class="text-center">'.$value->jersey.'</td>' ;?>
                    <?= '<td>'.$value->name.'</td>' ;?>
                    <?= !empty($value->GS) ? '<td class="text-center">'.(empty($value->position) ? '*' : $value->position).'</td>' : '<td></td>' ;?>
                    <?= isset($stats['MIN']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->MIN.'</td>' : '' ; ?>
                    <td class="border text-center"><?= $value->FGM ; ?></td>
                    <?= isset($stats['FGA']) ? '<td class="border text-center">'.$value->FGA.'</td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td class="border text-center">'.$value->TPM.'</td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td class="border text-center">'.$value->TPA.'</td>' : '' ; ?>
                    <td class="border text-center d-none d-md-table-cell"><?= $value->FTM ; ?></td>
                    <?= isset($stats['FTA']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->FTA.'</td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->ORB.'</td>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->DRB.'</td>' : '' ; ?>
                    <?= isset($stats['RB']) ? '<td class="border text-center">'.$value->RB.'</td>' : '' ; ?>
                    <?= isset($stats['PF']) ? '<td class="border text-center">'.$value->PF.'</td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->FD.'</td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td class="border text-center">'.$value->AST.'</td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->STL.'</td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->BS.'</td>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->BD.'</td>' : '' ; ?>
                    <td class="border text-center"><?= $value->PTS ; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr></tr>
                <?php endif; ?>
                <?php if ($game->team_box_opp): ?><!-- team box opp -->
                <?php foreach ($game->team_box_opp as $value): ?>
                <tr class="border">
                    <td colspan="3">Team</td>
                    <?= isset($stats['MIN']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['FTM']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td class="text-center border d-none d-md-table-cell">'.$value->ORB.'</td>' : ''; ?>
                    <?= isset($stats['DRB']) ? '<td class="text-center border d-none d-md-table-cell">'.$value->DRB.'</td>' : ''; ?>
                    <?= isset($stats['RB']) ? '<td class="border text-center">'.$value->RB.'</td>' : ''; ?>                   
                    <?= isset($stats['PF']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td></td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="border text-center d-none d-md-table-cell">'.$value->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="border text-center">'.$value->PTS.'</td>' : ''; ?>
                </tr>                
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>    
            <?php if ($game->game_box_opp): ?><!-- totals -->
            <tfoot>
                <?php foreach ($game->game_box_opp as $value): ?>
                <?php if ($value->period == 'Z'):?>
                <tr class="border">
                    <th colspan="3"><?= $value->period == 'Z' ? 'TOTALS' : Inflector::ordinalize($value->period).' Half'; ?></th>
                    <?= isset($stats['MIN']) ? '<td class="d-none d-md-table-cell"></td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<th class="border text-center">'.$value->FGM.'</th>' : ''; ?>
                    <?= isset($stats['FGA']) ? '<th class="border text-center">'.$value->FGA.'</th>' : ''; ?>
                    <?= isset($stats['TPM']) ? '<th class="border text-center">'.$value->TPM.'</th>' : ''; ?>
                    <?= isset($stats['TPA']) ? '<th class="border text-center">'.$value->TPA.'</th>' : ''; ?>
                    <?= isset($stats['FTM']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->FTM.'</th>' : ''; ?>
                    <?= isset($stats['FTA']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->FTA.'</th>' : ''; ?>
                    <?= isset($stats['ORB']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->ORB.'</th>' : ''; ?>
                    <?= isset($stats['DRB']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->DRB.'</th>' : ''; ?>
                    <?= isset($stats['RB']) ? '<th class="border text-center">'.$value->RB.'</th>' : ''; ?>
                    <?= isset($stats['PF']) ? '<th class="border text-center"'.(isset($stats['FD']) ? 'colspan="2"' : '').'>'.$value->PF.'</th>' : ''; ?>
                    <?= isset($stats['AST']) ? '<th class="border text-center">'.$value->AST.'</th>' : ''; ?>
                    <?= isset($stats['TRN']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->TRN.'</th>' : ''; ?>
                    <?= isset($stats['STL']) ? '<th class="border text-center d-none d-md-table-cell">'.$value->STL.'</th>' : ''; ?>
                    <?= isset($stats['BS']) ? '<th class="border text-center d-none d-md-table-cell"'.(isset($stats['BD']) ? 'colspan="2"' : '').'>'.$value->BS.'</th>' : ''; ?>
                    <?= isset($stats['PTS']) ? '<th class="border text-center">'.$value->PTS.'</th>' : ''; ?>
                </tr>
                <?php endif;?>
                <?php endforeach; ?>
            </tfoot>
            <?php endif; ?>
        </table>
        <span class="pull-right">Technical Fouls:: <?= isset($techs['opptot']) ? $techs['opptot'] : 'NONE'; ?>
            <?php if (isset($techs['opp'])) : ?>
            <?php $opcnt = $techs['oppcnt'] ?? 0; ?> (
                <?php foreach ($techs['opp'] as $key => $value) : ?>
                    <?= $key; ?><?= $value > 1 ? '('.$value.')' : '' ;?><?= $opcnt-- > 1 ? ', ' : '' ;?>
                <?php endforeach; ?>  
            )<?php endif; ?>
        </span>
    </div>
    <?php endif; ?>
    <?php if ($game->game_box_opp && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA']))): ?>
    <div class="col-sm-12 table-responsive"><!-- Opponent Shooting -->        
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th rowspan="1" colspan="1"><?=$game->opponents->opponent_short; ?>  Shooting</th>
                    <th class="text-center" rowspan="1" colspan="2">FG</th>
                    <?= isset($stats['TPA']) ? '<th class="text-center" rowspan="1" colspan="2">3PT</th>' : '';?>
                    <th class="text-center" rowspan="1" colspan="2">FT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($game->game_box_opp as $box): ?>
                <?php if ($box->period != 'Z'):?>
                <tr>
                    <th rowspan="1" colspan="1"><?= is_numeric($box->period) ? Inflector::ordinalize($box->period) : $box->period; ?></th>
                    <td class="text-center" rowspan="1" colspan="1"><?= empty($box->FGA) ? ($box->FGM > 0 ? $box->FGM : '-') : $box->FGM.'-'.$box->FGA; ?></td>
                    <?= !empty($box->FGA) && $box->FGA > 0 ? '<td class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FGM)/ intval($box->FGA)))*100),1).'%</td>' : '<td class="text-center">-</td>'; ?>
                    <td class="text-center" rowspan="1" colspan="1"><?= empty($box->TPA) ? ($box->TPM > 0 ? $box->TPM : '-') : $box->TPM.'-'.$box->TPA; ?></td>
                    <?= !empty($box->TPA) && $box->TPA > 0 ? '<td class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->TPM)/ intval($box->TPA)))*100),1).'%</td>' : '<td class="text-center">-</td>'; ?>
                    <td class="text-center" rowspan="1" colspan="1"><?= empty($box->FTA) ? ($box->FTM > 0 ? $box->FTM : '-') : $box->FTM.'-'.$box->FTA; ?></td>
                    <?= !empty($box->FTA) && $box->FTA > 0 ? '<td class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FTM)/ intval($box->FTA)))*100),1).'%</td>' : '<td class="text-center">-</td>'; ?>
                </tr>
                <?php endif; ?>
               <?php endforeach; ?>
            </tbody>
            <tfoot>
                <?php foreach ($game->game_box_opp as $box): ?>
                <?php if ($box->period == 'Z'):?>
                <tr>
                    <th rowspan="1" colspan="1">TOTALS</th>
                    <th class="text-center" rowspan="1" colspan="1"><?= empty($box->FGA) ? ($box->FGM > 0 ? $box->FGM : '-') : $box->FGM.'-'.$box->FGA; ?></th>
                    <?= !empty($box->FGA) && $box->FGA > 0 ? '<th class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FGM)/ intval($box->FGA)))*100),1).'%</th>' : '<td class="text-center">-</td>'; ?>
                    <th class="text-center" rowspan="1" colspan="1"><?= empty($box->TPA) ? ($box->TPM > 0 ? $box->TPM : '-') : $box->TPM.'-'.$box->TPA; ?></th>
                    <?= !empty($box->TPA) && $box->TPA > 0 ? '<th class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->TPM)/ intval($box->TPA)))*100),1).'%</th>' : '<td class="text-center">-</td>'; ?>
                    <th class="text-center" rowspan="1" colspan="1"><?= empty($box->FTA) ? ($box->FTM > 0 ? $box->FTM : '-') : $box->FTM.'-'.$box->FTA; ?></th>
                    <?= !empty($box->FTA) && $box->FTA > 0 ? '<th class="text-center" rowspan="1" colspan="1">'. number_format((floatval((intval($box->FTM)/ intval($box->FTA)))*100),1).'%</th>' : '<td class="text-center">-</td>'; ?>
                </tr>
                <?php endif; ?>
               <?php endforeach; ?>
            </tfoot>
        </table>        
    </div> 
    <?php endif; ?>
</div>
<?php if ($game->game_box_opp && $game->game_box_mur && (isset($stats['PNT']) ||isset($stats['OTO']) ||isset($stats['SND']) ||isset($stats['FB']) ||isset($stats['BN'])||isset($stats['TIED']) ||isset($stats['LC']))): ?>
<?php 
    $scorecol = 0;
    isset($stats['PNT']) ? $scorecol++ : '';
    isset($stats['OTO']) ? $scorecol++ : '';
    isset($stats['SND']) ? $scorecol++ : '';
    isset($stats['FB']) ? $scorecol++ : '';
    isset($stats['BN']) ? $scorecol++ : '';
?>
<div class="row table-responsive"> <!-- Team Scoring Comparison -->
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th rowspan="2" colspan="1"></th>
                <?=$scorecol > 0 ? '<th rowspan="1" colspan="'.$scorecol.'">SCORING BREAKDOWN</th>' : '' ;?>
                <?=(isset($stats['TIED']) ||isset($stats['LC'])) ? '<th rowspan="1" colspan="'.((isset($stats['TIED']) && isset($stats['LC'])) ? '2' : '1' ).'"></th>' :'';?>
            </tr>
            <tr>
                <?=isset($stats['PNT']) ? '<th>In PNT</th>' : '' ; ?>
                <?=isset($stats['OTO']) ? '<th>Off TO</th>' : '' ; ?>
                <?=isset($stats['SND']) ? '<th>2nd Ch</th>' : '' ; ?>
                <?=isset($stats['FB']) ? '<th>Fast Br</th>' : '' ; ?>
                <?=isset($stats['BN']) ? '<th>Bench</th>' : '' ; ?>
                <?=isset($stats['TIED']) ? '<th>Tied</th>' : '' ; ?>
                <?=isset($stats['LC']) ? '<th>Lead Ch</th>' : '' ; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($game->game_box_mur as $value): 
                if ($value->period == 'Z'): ?>            
            <tr>
                <th>Murray St</th>
                <?=isset($value->PNT) ?'<td>'.$value->PNT .'</td>':'';?>
                <?=isset($value->OTO) ?'<td>'.$value->OTO .'</td>':'';?>
                <?=isset($value->SND) ?'<td>'.$value->SND .'</td>':'';?>
                <?=isset($value->FB)  ?'<td>'.$value->FB  .'</td>':'';?>
                <?=isset($value->BN)  ?'<td>'.$value->BN  .'</td>':'';?>
                <?=isset($value->TIED)?'<td>'.$value->TIED.'</td>':'';?>
                <?=isset($value->LC)  ?'<td>'.$value->LC  .'</td>':'';?>
            </tr>            
            <?php endif; 
            endforeach; ?>
            <?php foreach ($game->game_box_opp as $value): 
                if ($value->period == 'Z'): ?>
            <tr>
                <th><?= $game->opponents->opponent_name ?></th>
                <?=isset($value->PNT) ?'<td>'.$value->PNT .'</td>':'';?>
                <?=isset($value->OTO) ?'<td>'.$value->OTO .'</td>':'';?>
                <?=isset($value->SND) ?'<td>'.$value->SND .'</td>':'';?>
                <?=isset($value->FB)  ?'<td>'.$value->FB  .'</td>':'';?>
                <?=isset($value->BN)  ?'<td>'.$value->BN  .'</td>':'';?>
                <?=isset($value->TIED)?'<td>'.$value->TIED.'</td>':'';?>
                <?=isset($value->LC)  ?'<td>'.$value->LC  .'</td>':'';?>
            </tr>
            <?php endif; 
            endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<hr> <!-- Recap/preview -->
<?php
//<dl>
//    <dt>Game preview</dt>
//    <dd><?= $game->game_preview; ></dd>
//    <br>
//    <dt>Game recap</dt>
//    <dd>//<?= $game->game_recap; ></dd>
//    <br>
//</dl>
?>
<div class="btn-group">
    <button type="button" class="btn" onclick="history.back()">Back</button>
</div>


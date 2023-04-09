<!-- Single game view -->
<div class="col-md-12">
    <h1><?= "Murray State " . ($game->hrn == 1 ? 'Vs' : ($game->hrn == 2 ? '@' : 'Vs')) . " " . $game->opponents->opponent_name; ?><?= Html::anchor('admin/game/edit/' . $game->id, 'Edit', ['class' => 'btn btn-warning']); ?></h1>
    <hr>
</div>
<div class='container'>
    <div>
        <div class='row'>
            <!-- Full date -->
            <div class='col-sm-8 text-center'>
                <span class="h3"><?= date_format(date_create($game->game_date), "l, F jS, Y") ?></span>
            </div>
            <!-- Team Season -->
            <div class='col-sm-4'>
                <span class="h3"><?= $game->team_season->teams->team_name.' '.$game->team_season->seasons->start.'-'.$game->team_season->seasons->end; ?></span>
            </div>
        </div>
    </div>
    <!-- Score -->
    <div class='row'>
        <div class='col-sm-8'>
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
                        <td><?= empty($game->pts_mur) ? (Html::anchor('admin/game/edit/'.$game->id.'/score', 'Add Final', ['class' => 'btn btn-success'])) : ''; ?></td>
                        <td style="font-size: 40px; font-weight: <?= ($game->l == '1' ? 'bold' : 'normal'); ?>;"><?= $game->pts_opp; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class='col-sm-4'><!-- Points by period -->            
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
            <?= Html::anchor('admin/game/edit/'.$game->id.'/score', isset($game->mur_1) ? 'Edit Score' : 'Add Score', ['class' => 'btn btn-success']); ?>
        </div>
    </div>
    <hr> <!-- Game Details -->
    <div class="row">
        <!-- Site -->
        <div class='col-sm-6'>
            <span class="h4"><?= $game->places->place_name.', '.$game->places->place_state; ?> <?= empty($game->site_id) ? '' : $game->sites->site_name; ?></span>
        </div>
        <!-- Refs -->
        <div class="col-sm-6">
            <span><?= ($game->ref_1 ?? false && ($game->ref_2 ?? false || $game->ref_3 ?? false)) ? 'Referees:' : ''?></span>
            <span>
            <?= !empty($game->ref_1 ?? null) ? $game->ref_1 : ''; ?><?= ($game->ref_1 ?? false && ($game->ref_2 ?? false || $game->ref_3 ?? false)) ? ', ' : ''?><?= !empty($game->ref_2 ?? null) ? $game->ref_2 : ''; ?><?= $game->ref_3 ?? false ? ', ' : ''; ?><?= $game->ref_3 ?? ''; ?>
            </span>
            <?= Html::anchor('admin/game/edit/'.$game->id.'/ref' , isset($game->ref_1) ? 'Edit Refs' : 'Add Refs', ['class' => 'btn btn-success']); ?>
        </div>
        <!-- Time -->
        <div class="col-sm-3">
            <span><?= !empty($game->game_time) ? 'Game Time: '.date_format(date_create($game->game_time), 'g:i A') : '';?></span>
        </div>
        <!-- Duration -->
        <div class="col-sm-3">
            <span><?= !empty($game->game_duration) ? 'Duration: '.date_format(date_create($game->game_duration), 'G\h i\m') : '';?></span>
        </div>
        <!-- Attendance -->
        <div class="col-sm-6">
            <span><?= !empty($game->attendance) ? 'Attendance: '. number_format(floatval($game->attendance)) : '';?></span>
        </div>
    </div>
</div>
<hr><!-- Begin Stats -->
<div class="row"><!-- Murray Stats -->
    <?php if ($person_box || $game_box_mur): ?>
    <div class="col-sm-<?= $game_box_mur && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA'])) ? 12 : 9 ;?>"> <!-- Murray Box -->
        <span class="h4">Murray State - <?= !empty($game->pts_mur) ? $game->pts_mur : '' ?></span>
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" colspan="<?= $person_box ? 1 : (isset($stats['MIN']) ? 4 : 3) ; ?>"><?= $person_box ? '#' : '' ; ?></th>
                    <?= $person_box ? '<th rowspan="2" colspan="2">Name</th>' : '' ; ?>
                    <?= (isset($stats['MIN']) && $person_box) ? '<th rowspan="2" colspan="1">Min</th>' : '' ; ?>
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
                <?php if ($person_box): ?> <!-- Individual Box -->
                <?php foreach ($person_box as $value): ?>
                <tr>
                    <?= '<td class="text-center">'.$value->team_season_roster->roster_number.'</td>' ;?>
                    <?= '<td>'.$value->team_season_roster->persons->display.'</td>' ;?>
                    <?= !empty($value->GS) ? '<td class="text-center">'.(empty($value->team_season_roster->roster_position) ? '*' : $value->team_season_roster->roster_position).'</td>' : '<td></td>' ;?>
                    <?= isset($stats['MIN']) ? '<td class="text-center">'.$value->MIN.'</td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<td class="text-center">'.$value->FGM.'</td>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<td class="text-center">'.$value->FGA.'</td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td class="text-center">'.$value->TPM.'</td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td class="text-center">'.$value->TPA.'</td>' : '' ; ?>
                    <?= isset($stats['FTM']) ? '<td class="text-center">'.$value->FTM.'</td>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<td class="text-center">'.$value->FTA.'</td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td class="text-center">'.$value->ORB.'</td>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<td class="text-center">'.$value->DRB.'</td>' : '' ; ?>
                    <?= isset($stats['RB']) ? '<td class="text-center">'.$value->RB.'</td>' : '' ; ?>
                    <?= isset($stats['PF']) ? '<td class="text-center">'.$value->PF.'</td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td class="text-center">'.$value->FD.'</td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td class="text-center">'.$value->AST.'</td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="text-center">'.$value->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="text-center">'.$value->STL.'</td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="text-center">'.$value->BS.'</td>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<td class="text-center">'.$value->BD.'</td>' : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="text-center">'.$value->PTS.'</td>' : '' ; ?>
                    <th><?= Html::anchor('admin/stat/basket/game/person/edit/' . $value->id, 'edit', ['class' => '']); ?>|<?= Html::anchor('admin/stat/basket/game/person/delete/' . $value->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?></th>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr></tr>
                <?php endif; ?>
                <?php if ($team_box): ?><!-- team -->
                <?php foreach ($team_box as $value): ?>
                <tr>
                    <td colspan="<?= 3+count(array_filter(array(isset($stats['MIN']),isset($stats['FGM']),isset($stats['FGA']),isset($stats['TPM']),isset($stats['TPA']),isset($stats['FTM']),isset($stats['FTA'])))); ?>">Team</td>
                    <?= isset($stats['ORB']) ? '<td class="text-center">'.$value->ORB.'</td>' : ''; ?>
                    <?= isset($stats['DRB']) ? '<td class="text-center">'.$value->DRB.'</td>' : ''; ?>
                    <?= isset($stats['RB']) ? '<td class="text-center">'.$value->RB.'</td>' : ''; ?>
                    <?= isset($stats['TRN']) ? ((isset($stats['AST']) || isset($stats['PF'])) ? '<td colspan="'.count(array_filter([isset($stats['AST']), isset($stats['PF']),isset($stats['FD'])])).'"></td>' : '') : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="text-center">'.$value->TRN.'</td>' : ''; ?>
                    <?= isset($stats['PTS']) ? ((isset($stats['STL']) || isset($stats['BS'])) ? '<td colspan="'.count(array_filter([isset($stats['STL']), isset($stats['BS']),isset($stats['BD'])])).'"></td>' : '') : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="text-center">'.$value->PTS.'</td>' : ''; ?>
                    <th><?= Html::anchor('admin/stat/basket/game/team/edit/' . $value->id, 'edit', ['class' => '']); ?>|<?= Html::anchor('admin/stat/basket/game/team/delete/' . $value->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?></th>
                </tr>                
                <?php endforeach; ?>
                <?php endif; ?>
                
            </tbody>    
            <?php if ($game_box_mur): ?><!-- totals -->
            <tfoot>
                <?php foreach ($game_box_mur as $value): ?>
                <?php if ($value->period == 'Z'): ?>
                <tr>
                    <th colspan="<?= isset($stats['MIN']) ? 4 : 3 ; ?>"><?= $value->period == 'Z' ? 'TOTALS' : Inflector::ordinalize($value->period).' Half'; ?></th>
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
                    <th><?= Html::anchor('admin/stat/basket/game/box/edit/' . $value->id, 'edit', ['class' => '']); ?></th>
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
    <?= Html::anchor('admin/stat/basket/game/person/create/' . $game->id, 'Add Player Box', ['class' => 'btn btn-success']); ?>
    <?= Html::anchor('admin/stat/basket/game/box/create/' . $game->id, 'Add Game Box', ['class' => 'btn btn-success']); ?>
    <?= ($team_box ? '' : Html::anchor('admin/stat/basket/game/team/create/' . $game->id, 'Add Team Box', ['class' => 'btn btn-success'])); ?>
    <?php if ($game_box_mur && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA']))): ?>
    <div class="col-sm-12"><!-- Murray Shooting -->        
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th rowspan="1" colspan="1">Murray Shooting</th>
                    <th class="text-center" rowspan="1" colspan="2">FG</th>
                    <?= isset($stats['TPA']) ? '<th class="text-center" rowspan="1" colspan="2">3PT</th>' : '';?>
                    <th class="text-center" rowspan="1" colspan="2">FT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($game_box_mur as $box): ?>
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
                    <th><?= Html::anchor('admin/stat/basket/game/box/edit/' . $box->id, 'edit', ['class' => '']); ?></th>
                </tr>
                <?php endif; ?>
               <?php endforeach; ?>
            </tbody>
            <tfoot>
                <?php foreach ($game_box_mur as $box): ?>
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
    <?php if ($opponent_box || $game_box_opp): ?>
    <div class="col-sm-<?= $game_box_opp && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA'])) ? 12 : 9 ;?>"> <!-- Opponent Box -->
        <span class="h4"><?=$game->opponents->opponent_name; ?> - <?= !empty($game->pts_opp) ? $game->pts_opp : '' ?></span>
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" colspan="<?= $opponent_box ? 1 : (isset($stats['MIN']) ? 4 : 3) ; ?>"><?= $opponent_box ? '#' : '' ; ?></th>
                    <?= $opponent_box ? '<th rowspan="2" colspan="2">Name</th>' : '' ; ?>
                    <?= (isset($stats['MIN']) && $opponent_box) ? '<th rowspan="2" colspan="1">Min</th>' : '' ; ?>
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
                <?php if ($opponent_box): ?> <!-- Individual Box -->
                <?php foreach ($opponent_box as $value): ?>
                <tr>
                    <?= '<td class="text-center">'.$value->jersey.'</td>' ;?>
                    <?= '<td>'.$value->name.'</td>' ;?>
                    <?= !empty($value->GS) ? '<td class="text-center">'.(empty($value->position) ? '*' : $value->position).'</td>' : '<td></td>' ;?>
                    <?= isset($stats['MIN']) ? '<td class="text-center">'.$value->MIN.'</td>' : '' ; ?>
                    <?= isset($stats['FGM']) ? '<td class="text-center">'.$value->FGM.'</td>' : '' ; ?>
                    <?= isset($stats['FGA']) ? '<td class="text-center">'.$value->FGA.'</td>' : '' ; ?>
                    <?= isset($stats['TPM']) ? '<td class="text-center">'.$value->TPM.'</td>' : '' ; ?>
                    <?= isset($stats['TPA']) ? '<td class="text-center">'.$value->TPA.'</td>' : '' ; ?>
                    <?= isset($stats['FTM']) ? '<td class="text-center">'.$value->FTM.'</td>' : '' ; ?>
                    <?= isset($stats['FTA']) ? '<td class="text-center">'.$value->FTA.'</td>' : '' ; ?>
                    <?= isset($stats['ORB']) ? '<td class="text-center">'.$value->ORB.'</td>' : '' ; ?>
                    <?= isset($stats['DRB']) ? '<td class="text-center">'.$value->DRB.'</td>' : '' ; ?>
                    <?= isset($stats['RB']) ? '<td class="text-center">'.$value->RB.'</td>' : '' ; ?>
                    <?= isset($stats['PF']) ? '<td class="text-center">'.$value->PF.'</td>' : '' ; ?>
                    <?= isset($stats['FD']) ? '<td class="text-center">'.$value->FD.'</td>' : '' ; ?>
                    <?= isset($stats['AST']) ? '<td class="text-center">'.$value->AST.'</td>' : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="text-center">'.$value->TRN.'</td>' : '' ; ?>
                    <?= isset($stats['STL']) ? '<td class="text-center">'.$value->STL.'</td>' : '' ; ?>
                    <?= isset($stats['BS']) ? '<td class="text-center">'.$value->BS.'</td>' : '' ; ?>
                    <?= isset($stats['BD']) ? '<td class="text-center">'.$value->BD.'</td>' : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="text-center">'.$value->PTS.'</td>' : '' ; ?>
                    <th><?= Html::anchor('admin/stat/basket/game/opponent/edit/' . $value->id, 'edit', ['class' => '']); ?>|<?= Html::anchor('admin/stat/basket/game/opponent/delete/' . $value->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?></th>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr></tr>
                <?php endif; ?>
                <?php if ($team_box_opp): ?><!-- team box opp -->
                <?php foreach ($team_box_opp as $value): ?>
                <tr>
                    <td colspan="<?= 3+count(array_filter(array(isset($stats['MIN']),isset($stats['FGM']),isset($stats['FGA']),isset($stats['TPM']),isset($stats['TPA']),isset($stats['FTM']),isset($stats['FTA'])))); ?>">Team</td>
                    <?= isset($stats['ORB']) ? '<td class="text-center">'.$value->ORB.'</td>' : ''; ?>
                    <?= isset($stats['DRB']) ? '<td class="text-center">'.$value->DRB.'</td>' : ''; ?>
                    <?= isset($stats['RB']) ? '<td class="text-center">'.$value->RB.'</td>' : ''; ?>
                    <?= isset($stats['TRN']) ? ((isset($stats['AST']) || isset($stats['PF'])) ? '<td colspan="'.count(array_filter([isset($stats['AST']), isset($stats['PF']),isset($stats['FD'])])).'"></td>' : '') : '' ; ?>
                    <?= isset($stats['TRN']) ? '<td class="text-center">'.$value->TRN.'</td>' : ''; ?>
                    <?= isset($stats['PTS']) ? ((isset($stats['STL']) || isset($stats['BS'])) ? '<td colspan="'.count(array_filter([isset($stats['STL']), isset($stats['BS']),isset($stats['BD'])])).'"></td>' : '') : '' ; ?>
                    <?= isset($stats['PTS']) ? '<td class="text-center">'.$value->PTS.'</td>' : ''; ?>
                    <th><?= Html::anchor('admin/stat/basket/game/team/edit/' . $value->id, 'edit', ['class' => '']); ?>|<?= Html::anchor('admin/stat/basket/game/team/delete/' . $value->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?></th>
                </tr>                
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>    
            <?php if ($game_box_opp): ?><!-- totals -->
            <tfoot>
                <?php foreach ($game_box_opp as $value): ?>
                <?php if ($value->period == 'Z'):?>
                <tr>
                    <th colspan="<?= isset($stats['MIN']) ? 4 : 3 ; ?>"><?= $value->period == 'Z' ? 'TOTALS' : Inflector::ordinalize($value->period).' Half'; ?></th>
                    <?= isset($stats['FGM']) ? '<th class="text-center">'.$value->FGM.'</th>' : ''; ?>
                    <?= isset($stats['FGA']) ? '<th class="text-center">'.$value->FGA.'</th>' : ''; ?>
                    <?= isset($stats['TPM']) ? '<th class="text-center">'.$value->TPM.'</th>' : ''; ?>
                    <?= isset($stats['TPA']) ? '<th class="text-center">'.$value->TPA.'</th>' : ''; ?>
                    <?= isset($stats['FTM']) ? '<th class="text-center">'.$value->FTM.'</th>' : ''; ?>
                    <?= isset($stats['FTA']) ? '<th class="text-center">'.$value->FTA.'</th>' : ''; ?>
                    <?= isset($stats['ORB']) ? '<th class="text-center">'.$value->ORB.'</th>' : ''; ?>
                    <?= isset($stats['DRB']) ? '<th class="text-center">'.$value->DRB.'</th>' : ''; ?>
                    <?= isset($stats['RB']) ? '<th class="text-center">'.$value->RB.'</th>' : ''; ?>
                    <?= isset($stats['PF']) ? '<th class="text-center"'.(isset($stats['FD']) ? 'colspan="2"' : '').'>'.$value->PF.'</thy>' : ''; ?>
                    <?= isset($stats['AST']) ? '<th class="text-center">'.$value->AST.'</th>' : ''; ?>
                    <?= isset($stats['TRN']) ? '<th class="text-center">'.$value->TRN.'</th>' : ''; ?>
                    <?= isset($stats['STL']) ? '<th class="text-center">'.$value->STL.'</th>' : ''; ?>
                    <?= isset($stats['BS']) ? '<th class="text-center"'.(isset($stats['BD']) ? 'colspan="2"' : '').'>'.$value->BS.'</th>' : ''; ?>
                    <?= isset($stats['PTS']) ? '<th class="text-center">'.$value->PTS.'</th>' : ''; ?>
                    <th><?= Html::anchor('admin/stat/basket/game/box/edit/' . $value->id, 'edit', ['class' => '']); ?></th>
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
    <?= Html::anchor('admin/stat/basket/game/opponent/create/' . $game->id, 'Add Opponent Box', ['class' => 'btn btn-success']); ?>
    <?= Html::anchor('admin/stat/basket/game/box/create/' . $game->id, 'Add Game Box', ['class' => 'btn btn-success']); ?>    
    <?= $team_box_opp ? '' : Html::anchor('admin/stat/basket/game/team/create/'.$game->id.'/1', 'Add Team Box', ['class' => 'btn btn-success']); ?>
    <?php if ($game_box_opp && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA']))): ?>
    <div class="col-sm-12"><!-- Opponent Shooting -->        
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th rowspan="1" colspan="1"><?=$game->opponents->opponent_short; ?>  Shooting</th>
                    <th class="text-center" rowspan="1" colspan="2">FG</th>
                    <?= isset($stats['TPA']) ? '<th class="text-center" rowspan="1" colspan="2">3PT</th>' : '';?>
                    <th class="text-center" rowspan="1" colspan="2">FT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($game_box_opp as $box): ?>
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
                    <th><?= Html::anchor('admin/stat/basket/game/box/edit/' . $box->id, 'edit', ['class' => '']); ?></th>
                </tr>
                <?php endif; ?>
               <?php endforeach; ?>
            </tbody>
            <tfoot>
                <?php foreach ($game_box_opp as $box): ?>
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
<?php if ($game_box_opp && $game_box_mur && (isset($stats['PNT']) ||isset($stats['OTO']) ||isset($stats['SND']) ||isset($stats['FB']) ||isset($stats['BN'])||isset($stats['TIED']) ||isset($stats['LC']))): ?>
<?php 
    $scorecol = 0;
    isset($stats['PNT']) ? $scorecol++ : '';
    isset($stats['OTO']) ? $scorecol++ : '';
    isset($stats['SND']) ? $scorecol++ : '';
    isset($stats['FB']) ? $scorecol++ : '';
    isset($stats['BN']) ? $scorecol++ : '';
?>
<div class="row"> <!-- Team Scoring Comparison -->
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th rowspan="2" colspan="1"></th>
                <?=$scorecol > 0 ? '<th rowspan="1" colspan="'.$scorecol.'">SCORING BREAKDOWN</th>' : '' ;?>
                <?=(isset($stats['TIED']) ||isset($stats['LC'])) ? '<th rowspan="1" colspan="'.((isset($stats['TIED']) && isset($stats['LC'])) ? '2' : '1' ).'"></th>' :'';?>
            </tr>
            <tr>
                <?=isset($stats['PNT']) ? '<th>In Paint</th>' : '' ; ?>
                <?=isset($stats['OTO']) ? '<th>Off Turn</th>' : '' ; ?>
                <?=isset($stats['SND']) ? '<th>2nd Chance</th>' : '' ; ?>
                <?=isset($stats['FB']) ? '<th>Fastbreak</th>' : '' ; ?>
                <?=isset($stats['BN']) ? '<th>Bench</th>' : '' ; ?>
                <?=isset($stats['TIED']) ? '<th>Tied</th>' : '' ; ?>
                <?=isset($stats['LC']) ? '<th>Lead Ch</th>' : '' ; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($game_box_mur as $value): 
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
            <?php foreach ($game_box_opp as $value): 
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
<dl>
    <dt>Game preview</dt>
    <dd><?= $game->game_preview; ?></dd>
    <br>
    <dt>Game recap</dt>
    <dd><?= $game->game_recap; ?></dd>
    <br>
    <dt>Game notes</dt>
    <dd><?= $game->game_notes; ?></dd>
    <br>
</dl>
<div class="btn-group">
    <?= Html::anchor('admin/game/edit/' . $game->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/team/season/view/'. $game->team_season_id, 'Back', ['class' => 'btn btn-default']); ?>
</div>


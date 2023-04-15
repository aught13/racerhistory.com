<h2>Viewing <?= $person->display; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>First</dt>
    <dd><?= $person->first; ?></dd>
    <br>
    <dt>Last</dt>
    <dd><?= $person->last; ?></dd>
    <br>
    <dt>Full</dt>
    <dd><?= $person->full; ?></dd>
    <br>
    <dt>Display</dt>
    <dd><?= $person->display; ?></dd>
    <br>
    <dt>Birth</dt>
    <dd><?= $person->birth; ?></dd>
    <br>
    <dt>Death</dt>
    <dd><?= $person->death; ?></dd>
    <br>
    <dt>Person image</dt>
    <dd><?= $person->person_image; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/person/edit/' . $person->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/person', 'Back', array('class' => 'btn btn-default')); ?>
</div>

<h2>Teams</h2>
<?php if ($person->team_season_roster): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Team</th>
                    <th>Person</th>
                    <th>Roster year</th>
                    <th>Roster number</th>
                    <th>Roster position</th>
                    <th>Roster height</th>
                    <th>Roster weight</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($person->team_season_roster as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= ($item->team_season->semester == 1 ? $item->team_season->seasons->start : ($item->team_season->semester == 2 ? $item->team_season->seasons->start.'-'.$item->team_season->seasons->end : $item->team_season->seasons->end)).' - '.$item->team_season->teams->team_name; ?></td>
                        <td><?= $item->persons->display; ?></td>
                        <td><?= $item->roster_year; ?></td>
                        <td><?= $item->roster_number; ?></td>
                        <td><?= $item->roster_position; ?></td>
                        <td><?= $item->roster_height; ?></td>
                        <td><?= $item->roster_weight; ?></td>

                        <td>
                            <?= Html::anchor('admin/team/season/roster/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/team/season/roster/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/team/season/roster/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<p>
    <?= Html::anchor('admin/team/season/roster/create', 'Add new Team roster', array('class' => 'btn btn-success')); ?>
</p>
<hr><!-- SEASON STATS -->
<h2>Stats</h2>
<div class="row">
    <?php if ($person->team_season_roster && isset($stats['PTS'])): ?>
    <div class="col-sm-<?= $person->team_season_roster && (isset($stats['FGA']) ||isset($stats['FTA']) ||isset($stats['TPA'])) ? 12 : 9 ;?>"> 
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <?= $person->team_season_roster ? '<th rowspan="2" colspan="1">Team Season</th>' : '' ; ?>
                    <?= (isset($stats['MIN']) && $person->team_season_roster) ? '<th rowspan="2" colspan="1">Min</th>' : '' ; ?>
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
                <?php if ($person->team_season_roster): ?> <!-- Individual Box -->
                <?php foreach ($person->team_season_roster as $value): ?>
                <?php if ($value->stat_basket_season_person): ?>
                <tr>                    
                    <td><?= ($item->team_season->semester == 1 ? $item->team_season->seasons->start : ($item->team_season->semester == 2 ? $item->team_season->seasons->start.'-'.$item->team_season->seasons->end : $item->team_season->seasons->end)).' - '.$item->team_season->teams->team_name; ?></td>
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
        </table>
    </div>
    <?php else: ?>
        <p>No Season Stats.</p>
    <?php endif; ?>
</div>
<?php else: ?>
    <p>No Team_season_rosters.</p>
<?php endif; ?>

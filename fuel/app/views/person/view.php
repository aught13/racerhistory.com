<?php
/**
 * /app/views/person/view
 * 
 * Person View
 *
 */
?>
<div class="row">
    <span class="h1"><?= $person->display; ?></span> 
    <span class="h3"><?= implode(',' , $teams['teams']); ?></span> 
    <span class="h3"><?= $teams['seasons'] ;?></span> 
</div>
<br>
<h2>Teams</h2>
<?php if ($teams['rosters']): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Team</th>
                    <th>Roster year</th>
                    <th>Number</th>
                    <th>Position</th>
                    <th>Height</th>
                    <th>Weight</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach (
                    $teams['rosters'] as $item
                ):
                    ?>
                    <tr>
                        <td><?=
                            Html::anchor(
                                '/team/season/view/' . $item->team_season->id,
                                ($item->team_season->semester == 1 ?
                                    $item->team_season->seasons->start :
                                    ($item->team_season->semester == 2 ?
                                        $item->team_season->seasons->start .
                                        '-' . date_format(
                                            DateTime::createFromFormat(
                                                'Y',
                                                $item->team_season->seasons->end
                                            ), 'y'
                                        ) :
                                        $item->team_season->seasons->end)) .
                                ' - ' . $item->team_season->teams->team_name
                            );
                            ?>
                        </td>
                        <td><?= $item->roster_year; ?></td>
                        <td><?= $item->roster_number; ?></td>
                        <td><?= $item->roster_position; ?></td>
                        <td><?= $item->roster_height; ?></td>
                        <td><?= $item->roster_weight; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <hr><!-- SEASON STATS -->
    <div class="row">
        <div class="d-flex">
            <span class="h2">Stats</span>
        </div>
        <div class="d-flex flex-row-reverse d-md-none">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="showall" name="showall" onclick="showStats()">
                <label class="form-check-label" for="showall">Show All</label>
            </div> 
        </div>
    </div>
    <div class="row">
        <?php if ($career ?? false) : ?>   
            <div>
                <?php if ($career ?? false) : ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                         <a class="nav-link active" data-bs-toggle="tab" href="#career">Career</a>
                    </li>
                    <?php foreach ($games ?? [] as $season => $values) : ?>
                    <li class="nav-item">
                         <a class="nav-link" data-bs-toggle="tab" href="#s<?=$season; ?>"><?=$season; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content row">
                    <div class="tab-pane container active" id="career">
                        <?= $career; ?>
                    </div>                    
                    <?php foreach ($games ?? [] as $season => $values) : ?>
                    <div class="tab-pane container" id="s<?=$season; ?>">
                        <?= $values; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>No Stats.</p>
        <?php endif; ?>
    </div>
<?php else: ?>
    <p>No Team_season_rosters.</p>
<?php endif; ?>
<script>
    function showStats() {
        let hide = document.getElementsByName("hide");
        let show = document.getElementsByName("show");
        let x = document.getElementById("showall").checked;
        if (x) {
            hide.forEach((hide) => {
                hide.classList.remove("d-none", "d-md-table-cell");
            });
            show.forEach((show) => {
                show.classList.replace("d-md-none", "d-none");
            });
        } else {
            hide.forEach((hide) => {
                hide.classList.add("d-none", "d-md-table-cell");
            });
            show.forEach((show) => {
                show.classList.replace("d-none", "d-md-none");
            });
        }
    }
</script>

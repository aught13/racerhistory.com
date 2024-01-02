<h2>Listing Games</h2>
<br>

<?php if (count($games) > 0) : ?>
    <div class="table-responsive">
        <table  id="myTable" class="table table-striped table-bordered compact table-hover order-column stats_table nowrap spinner-border">
            <thead>
                <tr>
                    <th></th>
                    <th>SEASON</th>
                    <th>DATE</th>
                    <th>RK</th>
                    <th>SITE</th>
                    <th>ORK</th>
                    <th>OPP</th>
                    <th>TYP</th>
                    <th>LOC</th>
                    <th>W/L</th>
                    <th>STR</th>
                    <th>MUR</th>
                    <th>OPP</th>
                    <th>OT</th>
                    <th>MARGIN</th>
                </tr>
            </thead>
            <tbody>
                <?php $types = []; ?>
                <?php foreach ($games as $item) : ?>
                    <tr>
                        <td></td>
                        <td><?= $item->team_season->seasons->start.'-'.
                                $item->team_season->seasons->end; ?>
                        </td>
                        <td><?= Html::anchor('game/view/' .
                                $item->id, $item->game_date); ?>
                        </td>
                        <td class="d-flex justify-content-end">
                            <span class="d-none d-lg-inline">
                                <?= $item->mur_rk ? '#'.$item->mur_rk : ''; ?>&nbsp;
                            </span>
                        </td>
                        <td><?= $item->hrn == '1' ? 'H' :
                                        ($item->hrn == '2' ? 'R' : 'N'); ?></td>
                        <td>
                            <span class="d-none d-lg-inline">
                                <?= $item->opp_rk ? '#'.$item->opp_rk : ''; ?>&nbsp;
                            </span>
                        </td>
                        <td><span class="d-none d-md-inline">
                                        <?= $item->opponents->opponent_name; ?>
                            </span>
                            <span class="d-md-none">
                                <?= $item->opponents->opponent_short; ?>
                            </span>
                        </td>
                        <td>
                            <sup><?= (($item->game_types->conf == '1' ||
                                    $item->game_types->post == '1') ?
                                    $item->game_types->ind ?? '' : ''); ?>
                            </sup>
                        </td>
                        <td class="d-none d-lg-table-cell">
                                <?= $item->places->place_name; ?>, 
                                        <?= $item->places->place_state; ?>
                        </td>
                        <td><?= $item->w == '1' ? 'W' :
                                                ($item->l == '1' ? 'L' : ''); ?>
                        </td>
                        <td><?= $item->streak ?>                            
                        </td>
                        <td><?= $item->pts_mur; ?>
                        </td>
                        <td><?= $item->pts_opp; ?>
                        </td>
                        <td><?= ($item->ot == '1' ?
                                '<span class="d-none d-sm-inline"><sup> OT</sup></span>' :
                                (empty($item->ot) ? '' :
                                '<span class="d-none d-sm-inline"><sup> '.
                                $item->ot.' OT</sup></span>')); ?>
                        </td>
                        <td><?= $item->pts_mur == '' ? '' :
                                        (intval($item->pts_mur) -
                                intval($item->pts_opp));?>
                        </td>
                    </tr>
                    <?php  ($item->game_types->conf == '1' ||
                        $item->game_types->post == '1') ?
                        $types[$item->game_types->id] = $item->game_types->ind.
                            ' - '.$item->game_types->game_type_name : ''; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <span><sub><?= !count($types) === 0 ?: implode(' ', $types);?></sub></span>
    </div>

    <script>
        $(document).ready(function() {
            var h = $('#myTable').removeClass('spinner-border');
            var t = $('#myTable').DataTable({
                order: [[ 2, 'desc' ]], 
                pageLength: 100,
                stateSave: true,
                fixedHeader : {
                    headerOffset: 46
                    },
                stateLoadCallback: function (settings) {
                    const url = new URL(window.location.href);
                    let state = url.searchParams.get($(this).attr('id') + '_state');
                    //check the current url to see if we've got a state to restore
                    if (!state) { return null; }
                    //if we got the state, decode it and add current timestamp
                    state = JSON.parse(atob(state));
                    state['time'] = Date.now();
                    return state;
                },
                stateSaveCallback: function (settings, data) {
                    //encode current state to base64
                    const object = {start:data.start, length:data.length, page:data.page, searchBuilder:data.searchBuilder, order:data.order};
                    const state = btoa(JSON.stringify(object));
                    //get query part of the url
                    let searchParams = new URLSearchParams(window.location.search);
                    //add encoded state into query part
                    searchParams.set($(this).attr('id') + '_state', state);
                    //form url with new query parameter
                    const newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
                    //push new url into history object, this will change the current url without need of reload
                    history.pushState(null, '', newRelativePathQuery);
                },
                buttons: [{
                        extend: 'copyHtml5',
                        text: 'Copy to Clipboard',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Save as PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis',
                    {
                        extend: 'searchBuilder',
                        text: 'Filter Results'
                    },
                ],
                dom: 'Bl<t>pr',
                columnDefs: [{
                    "orderSequence": ["desc", "asc"],
                    "targets": ['_all']
                }],
                select: {
                    style: 'multi'
                }
            });

            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            h.className += " spinner-border";
            h.className = h.className.replace(" spinner-border", "");
        });

    </script>
<?php else : ?>
    <!-- NO GAMES -->
<?php endif; ?>
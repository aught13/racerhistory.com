<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title; ?></title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap 5 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">RacerHistory.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item <?= Uri::segment(1) == 'sport' ? 'active' : '' ?>">
                            <?= Html::anchor('sport', 'Sports', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'team' ? 'active' : '' ?> dropdown">                                
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Team<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="<?= (Uri::segment(1) == 'team' && (Uri::segment(2) == false || Uri::segment(2) == 'create')) ? 'active' : '' ?>">
                                    <?= Html::anchor('team', 'Teams', ['class' => 'dropdown-item']) ?>
                                </li>
                                <li class="<?= (Uri::segment(2) == 'season' && (Uri::segment(3) == false || Uri::segment(3) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                                    <?= Html::anchor('team/season', 'Team Seasons', ['class' => 'dropdown-item']) ?>
                                </li>
                                <li class="<?= Uri::segment(3) == 'roster' ? 'active' : '' ?>">
                                    <?= Html::anchor('team/season/roster', 'Team Rosters', ['class' => 'dropdown-item']) ?>
                                </li>
                            </ul>    
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'season' ? 'active' : '' ?>">
                            <?= Html::anchor('season', 'Seasons', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'person' ? 'active' : '' ?>">
                            <?= Html::anchor('person', 'Persons', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'place' ? 'active' : '' ?>">
                            <?= Html::anchor('place', 'Place', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'site' ? 'active' : '' ?>">
                            <?= Html::anchor('site', 'Site', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'game' ? 'active' : '' ?> dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Game<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="<?= (Uri::segment(1) == 'game' && (Uri::segment(2) == false || Uri::segment(2) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                                    <?= Html::anchor('game', 'Games', ['class' => 'dropdown-item']) ?>
                                </li>
                                <li class="<?= (Uri::segment(2) == 'type' && Uri::segment(3) == false) ? 'active' : '' ?>">
                                    <?= Html::anchor('game/type', 'Game Types', ['class' => 'dropdown-item']) ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'opponent' ? 'active' : '' ?>">
                            <?= Html::anchor('opponent', 'Opponent', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= (Uri::segment(1) == 'stat' || Uri::segment(1) == 'stat') ? 'active' : '' ?>">                            
                            <button type="button" class="btn btn-dark" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Stat</button>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">

                        <li><?= Html::anchor('admin/', 'Admin', ['class' => 'nav-link']) ?></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="navbar">
                            <li class="nav-item">
                                <?= Html::anchor('stat/basket/game/box/', 'Basketball Game Box', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= Html::anchor('stat/basket/game/opponent/', 'Basketball Game Opponent', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= Html::anchor('stat/basket/game/person/', 'Basketball Game Person', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= Html::anchor('stat/basket/game/team/', 'Basketball Game Team', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= Html::anchor('stat/basket/season/opponent/', 'Basketball Season Opponent', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= Html::anchor('stat/basket/season/person/', 'Basketball Season Person', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= Html::anchor('stat/basket/season/team/', 'Basketball Season Team', ['class' => 'nav-link']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-sm">
            <div class="row">
                <div class="col-md-12">
                    <?php if (Session::get_flash('success')): ?>
                        <div class="alert alert-success">
                            <strong>Success</strong>
                            <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if (Session::get_flash('error')): ?>
                        <div class="alert alert-danger">
                            <strong>Error</strong>
                            <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <?php echo $content; ?>
                </div>
            </div>    
            <footer>
                <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
                <p>
                    <a href="https://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
                    <small>Version: <?php echo e(Fuel::VERSION); ?></small>
                </p>
            </footer>
        </div>

        <?php
        echo Asset::js(array(
            'bootstrap.js',
        ));
        ?>
    </body>
</html>

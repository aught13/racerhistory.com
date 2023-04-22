<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title; ?></title>

        <?= Asset::css('bootstrap.css'); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <style>
            body {
                margin-top: 50px;
            }
        </style>
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">RacerHistory.com</a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?= Uri::segment(1) == '' ? 'active' : '' ?>">
                            <?= Html::anchor('', 'Home') ?>
                        </li>
                        <li class="<?= Uri::segment(1) == 'sport' ? 'active' : '' ?>">
                            <?= Html::anchor('' . 'sport', 'Sports') ?>
                        </li>
                        <li class="<?= Uri::segment(1) == 'team' ? 'active' : '' ?> dropdown">                                
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Team<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="<?= (Uri::segment(1) == 'team' && (Uri::segment(2) == false || Uri::segment(2) == 'create')) ? 'active' : '' ?>">
                                    <?= Html::anchor('' . 'team', 'Teams') ?>
                                </li>
                                <li class="<?= (Uri::segment(2) == 'season' && (Uri::segment(3) == false || Uri::segment(3) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                                    <?= Html::anchor('team/' . 'season', 'Team Seasons') ?>
                                </li>
                                <li class="<?= Uri::segment(3) == 'roster' ? 'active' : '' ?>">
                                    <?= Html::anchor('team/season/' . 'roster', 'Team Rosters') ?>
                                </li>
                            </ul>    
                        </li>
                        <li class="<?= Uri::segment(1) == 'season' ? 'active' : '' ?>">
                            <?= Html::anchor('' . 'season', 'Seasons') ?>
                        </li>
                        <li class="<?= Uri::segment(1) == 'person' ? 'active' : '' ?>">
                            <?= Html::anchor('person', 'Persons') ?>
                        </li>
                        <li class="<?= Uri::segment(1) == 'place' ? 'active' : '' ?>">
                            <?= Html::anchor('place', 'Place') ?>
                        </li>
                        <li class="<?= Uri::segment(1) == 'site' ? 'active' : '' ?>">
                            <?= Html::anchor('site', 'Site') ?>
                        </li>
                        <li class="<?= Uri::segment(1) == 'game' ? 'active' : '' ?> dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Game<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="<?= (Uri::segment(1) == 'game' && (Uri::segment(2) == false || Uri::segment(2) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                                    <?= Html::anchor('game', 'Games') ?>
                                </li>
                                <li class="<?= (Uri::segment(2) == 'type' && Uri::segment(3) == false) ? 'active' : '' ?>">
                                    <?= Html::anchor('game/type', 'Game Types') ?>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= Uri::segment(1) == 'opponent' ? 'active' : '' ?>">
                            <?= Html::anchor('opponent', 'Opponent') ?>
                        </li>
                        <li class="<?= (Uri::segment(1) == 'stat' || Uri::segment(1) == 'stat') ? 'active' : '' ?>">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Stat<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="<?= (Uri::segment(1) == 'stat' && (Uri::segment(3) == false || Uri::segment(2) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                                    <?= Html::anchor('stat/', 'Stats') ?>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#demo" href="#">Stat<b class="caret"></b></a>
                                </li>
                        </li>
                    </ul>
                    </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li><?= Html::anchor('admin/', 'Admin') ?></li>

                    </ul>
                </div>
                <div id="demo" class="collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <?= Html::anchor('stat/basket/game/box/', 'Basketball Game Box') ?>
                        </li>
                        <li>
                            <?= Html::anchor('stat/basket/game/opponent/', 'Basketball Game Opponent') ?>
                        </li>
                        <li>
                            <?= Html::anchor('stat/basket/game/person/', 'Basketball Game Person') ?>
                        </li>
                        <li>
                            <?= Html::anchor('stat/basket/game/team/', 'Basketball Game Team') ?>
                        </li>
                        <li>
                            <?= Html::anchor('stat/basket/season/opponent/', 'Basketball Season Opponent') ?>
                        </li>
                        <li>
                            <?= Html::anchor('stat/basket/season/person/', 'Basketball Season Person') ?>
                        </li>
                        <li>
                            <?= Html::anchor('stat/basket/season/team/', 'Basketball Season Team') ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <h1><?php echo $title; ?></h1>
                <hr>
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

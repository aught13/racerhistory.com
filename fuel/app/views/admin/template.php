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
        <?php if ($current_user): ?>
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
                            <li class="<?= Uri::segment(2) == '' ? 'active' : '' ?>">
                                <?= Html::anchor('admin', 'Dashboard') ?>
                            </li>
                            <li class="<?= Uri::segment(2) == 'sport' ? 'active' : '' ?>">
                                <?= Html::anchor('admin/' . 'sport', 'Sports') ?>
                            </li>
                            <li class="<?= Uri::segment(2) == 'team' ? 'active' : '' ?> dropdown">                                
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Team<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="<?= (Uri::segment(2) == 'team' && (Uri::segment(3) == false || Uri::segment(3) == 'create')) ? 'active' : '' ?>">
                                        <?= Html::anchor('admin/' . 'team', 'Teams') ?>
                                    </li>
                                    <li class="<?= (Uri::segment(3) == 'season' && (Uri::segment(4) == false || Uri::segment(4) == 'create' || Uri::segment(3) == 'edit')) ? 'active' : '' ?>">
                                        <?= Html::anchor('admin/team/' . 'season', 'Team Seasons') ?>
                                    </li>
                                    <li class="<?= Uri::segment(4) == 'roster' ? 'active' : '' ?>">
                                        <?= Html::anchor('admin/team/season/' . 'roster', 'Team Rosters') ?>
                                    </li>
                                </ul>    
                            </li>
                            <li class="<?= Uri::segment(2) == 'season' ? 'active' : '' ?>">
                                <?= Html::anchor('admin/' . 'season', 'Seasons') ?>
                            </li>
                            <li class="<?= Uri::segment(2) == 'person' ? 'active' : '' ?>">
                                <?= Html::anchor('admin/person', 'Persons') ?>
                            </li>
                            <li class="<?= Uri::segment(2) == 'place' ? 'active' : '' ?>">
                                <?= Html::anchor('admin/place', 'Place') ?>
                            </li>
                            <li class="<?= Uri::segment(2) == 'site' ? 'active' : '' ?>">
                                <?= Html::anchor('admin/site', 'Site') ?>
                            </li>
                            <li class="<?= Uri::segment(2) == 'game' ? 'active' : '' ?> dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Game<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="<?= (Uri::segment(2) == 'game' && (Uri::segment(3) == false || Uri::segment(3) == 'create' || Uri::segment(3) == 'edit')) ? 'active' : '' ?>">
                                        <?= Html::anchor('admin/game', 'Games') ?>
                                    </li>
                                    <li class="<?= (Uri::segment(3) == 'type' && Uri::segment(4) == false) ? 'active' : '' ?>">
                                        <?= Html::anchor('admin/game/type', 'Game Types') ?>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= Uri::segment(2) == 'opponent' ? 'active' : '' ?>">
                                <?= Html::anchor('admin/opponent', 'Opponent') ?>
                            </li>
                            <li class="<?= (Uri::segment(2) == 'stat' || Uri::segment(2) == 'stat') ? 'active' : '' ?>">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Stat<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="<?= (Uri::segment(2) == 'stat' && (Uri::segment(4) == false || Uri::segment(3) == 'create' || Uri::segment(3) == 'edit')) ? 'active' : '' ?>">
                                        <?= Html::anchor('admin/stat/', 'Stats') ?>
                                    </li>
                                    <li>
                                        <a data-toggle="collapse" data-target="#demo" href="#">Stat<b class="caret"></b></a>
                                    </li>
                            </li>
                        </ul>
                        </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?= $current_user->username ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><?= Html::anchor('admin/logout', 'Logout') ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="demo" class="collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <?= Html::anchor('admin/stat/basket/game/box/', 'Basketball Game Box') ?>
                            </li>
                            <li>
                                <?= Html::anchor('admin/stat/basket/game/opponent/', 'Basketball Game Opponent') ?>
                            </li>
                            <li>
                                <?= Html::anchor('admin/stat/basket/game/person/', 'Basketball Game Person') ?>
                            </li>
                            <li>
                                <?= Html::anchor('admin/stat/basket/game/team/', 'Basketball Game Team') ?>
                            </li>
                            <li>
                                <?= Html::anchor('admin/stat/basket/season/opponent/', 'Basketball Season Opponent') ?>
                            </li>
                            <li>
                                <?= Html::anchor('admin/stat/basket/season/person/', 'Basketball Season Person') ?>
                            </li>
                            <li>
                                <?= Html::anchor('admin/stat/basket/season/team/', 'Basketball Season Team') ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (Session::get_flash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>
                                <?= implode('</p><p>', (array) Session::get_flash('success')); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if (Session::get_flash('error')): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>
                                <?= implode('</p><p>', (array) Session::get_flash('error')); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-12">
                    <?= $content; ?>
                </div>
            </div>

            <hr/>
            <footer>
                <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
                <p>
                    <a href="https://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
                    <small>Version: <?= e(Fuel::VERSION); ?></small>
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

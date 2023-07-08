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
        <?php echo Asset::css('datatables.css'); ?>
        <?php echo Asset::js('datatables.min.js'); ?>
    </head>

    <body>
        <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
            <div class="container-lg container-fluid">
                <a class="navbar-brand" href="/">RacerHistory.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="<?= (Uri::segment(2) == 'season' && (Uri::segment(3) == false || Uri::segment(3) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                            <?= Html::anchor('team/season', 'Seasons', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'person' ? 'active' : '' ?>">
                            <?= Html::anchor('person', 'People', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item <?= Uri::segment(1) == 'stat' ? 'active' : '' ?> dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Stats<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="<?= (Uri::segment(1) == 'stat' && (Uri::segment(2) == false || Uri::segment(2) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                                    <?= Html::anchor('stat/basket/season/person', 'Season', ['class' => 'dropdown-item']) ?>
                                </li>
                                <li class="<?= (Uri::segment(2) == 'stat' && Uri::segment(3) == false) ? 'active' : '' ?>">
                                    <?= Html::anchor('stat/basket/career/person', 'Career', ['class' => 'dropdown-item']) ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">

                        <li><?= Html::anchor('admin/', 'Admin', ['class' => 'nav-link']) ?></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-lg">
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
    </body>
</html>

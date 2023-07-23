<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="https://racerhistory.com/favicon.ico">

        <title><?= $title; ?></title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/date-1.5.1/fh-3.4.0/r-2.5.0/sc-2.2.0/sb-1.5.0/sl-1.7.0/sr-1.3.0/datatables.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> 
        <?= Asset::css('datatables.css'); ?>
        <!-- Bootstrap 5 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/date-1.5.1/fh-3.4.0/r-2.5.0/sc-2.2.0/sb-1.5.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>
        <?= Asset::js('scroll.js'); ?>
    </head>

    <body class="racer-grey">
        <div class="container-fluid sticky-top racer-gold">
            <div class="container-lg navbar navbar-expand-lg py-0">
                <a id="scroll" class="navbar-brand d-none" href="<?= $current_user ?? false  ? '/admin' : ''; ?>/"><img class=""style="width: 100%; max-width: 540px; height: 100%; max-height: 29px" alt="Racerhistory.com"src="/assets/img/logo.png"></img></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item racer-gold">
                            <?= Html::anchor('team/season', 'Seasons', ['class' => (Uri::segment(2) == 'season' ? 'active' : '').' nav-link']) ?>
                        </li>
                        <li class="nav-item racer-gold">
                            <?= Html::anchor('person', 'People', ['class' => (Uri::segment(1) == 'person' ? 'active' : '').' nav-link']) ?>
                        </li>
                        <li class="nav-item racer-gold dropdown">
                            <a class="nav-link dropdown-toggle  <?= Uri::segment(1) == 'stat' ? 'active' : '' ?>" href="#" data-bs-toggle="dropdown">Stats<b class="caret"></b></a>
                            <ul class="dropdown-menu racer-gold">
                                <li class="racer-gold <?= (Uri::segment(1) == 'stat' && (Uri::segment(2) == false || Uri::segment(2) == 'create' || Uri::segment(2) == 'edit')) ? 'active' : '' ?>">
                                    <?= Html::anchor('stat/basket/season/person', 'Season', ['class' => 'dropdown-item']) ?>
                                </li>
                                <li class="racer-gold <?= (Uri::segment(2) == 'stat' && Uri::segment(3) == false) ? 'active' : '' ?>">
                                    <?= Html::anchor('stat/basket/career/person', 'Career', ['class' => 'dropdown-item']) ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="racer-blue">
            <div style="" class="container-lg container-fluid ">
                <div class="row">
                    <div class="">
                        <a href="<?= (($current_user ?? false) ? '/admin' : ''); ?>/"><img class="" style="width: 100%; max-width: 540px; height: 100%; max-height: 90px"
                                                                                  alt="Racerhistory.com" src="/assets/img/logo.png"></img></a>
                        <!-- Record Row -->
                    </div>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-571cc416b8c8639d">
                    </script>
                </div>
            </div>
        </div>        
        <?php if (isset($sidenav)): ?>
        <div class="container-fluid bg-light border">
            <div class="container-lg navbar navbar-expand-lg py-0">
                <div class="">
                    <?= $sidenav; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
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
                <div class="col-md-12 bg-light" style="min-height: 500px;">
                    <?php echo $content; ?>
                </div>
            </div>  
        </div>
        <footer class="container-fluid racer-blue">
            <div class="container-lg ">
                <div class="row">
                    <div style="height: inherit" >
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!--                     Footer -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6903556731799787"
                             data-ad-slot="9149427751" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
            <div class="container-lg racer-blue">
                <div> © 2007-<?= date("Y"); ?> RacerHistory.com &amp; Patrick Foltz. All Rights Reserved.
                    </br>
                    RacerHistory.com is not the official website of Murray State University Athletics and is not sanctioned
                    by the university or athletic department.</br>
                <span class="float-start">Powered by <a href="https://fuelphp.com">FuelPHP</a><small> Version: <?php echo e(Fuel::VERSION); ?></small>
                    <a href="https://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>                    
                </span>
                <span class="float-end">Page rendered in {exec_time}s using {mem_usage}mb of memory.</span>    
                </div>

            </div>
        </footer>
    </body>
</html>

<?php

/* 
 * Racerhistory.com software package
 * Patrick Foltz
 */

?>
<ul class="navbar-nav">
    <li class="nav-item <?= (Uri::segment(3) == 'season') ? 'active' : '' ?>">
        <?= Html::anchor('stat/basket/season/person/', 'Single Season', ['class' => 'nav-link']) ?>
    </li>
    <li class="nav-item<?= (Uri::segment(3) == 'career') ? 'active' : '' ?>">
        <?= Html::anchor('stat/basket/career/person/', 'Career', ['class' => 'nav-link']) ?>
    </li>
</ul>
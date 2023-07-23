<?php

/* /views/team/season/sidenav
 * 
 * Season Navigation
 * 
 * Racerhistory.com software
 * Patrick Foltz
 */

?>
<ul class="navbar-nav sticky-top">
    <li class="nav-item">
        <span class="nav-link" onclick="history.back()">Back</span>
    </li>
    <li class="nav-item">
        <?= isset($previous) ? Html::anchor('team/season/view/'.$previous, 'Previous Season', ['class' => 'nav-link bi bi-caret-left']) : "" ?>
    </li>
    <li class="nav-item">
        <?= isset($next) ? Html::anchor('team/season/view/'.$next, 'Next Season', ['class' => 'nav-link bi bi-caret-right']) : "" ?>
    </li>
    <li class="nav-item">
        <?= Html::anchor('team/season/index', 'All Seasons', ['class' => 'nav-link']); ?>
    </li>
</ul>
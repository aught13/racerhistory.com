<?php

/* /views/game/sidenav
 * 
 * Game Navigation
 * 
 * Racerhistory.com software
 * Patrick Foltz
 */

?>
<ul class="navbar-nav">
    <li class="nav-item">
        <?= isset($nav['previous']) ? Html::anchor('game/view/'.$nav['previous'], 'Previous Game', ['class' => 'nav-link']) : "" ?>
    </li>
    <button type="button" class="btn" onclick="history.back()">Back</button>
    <li class="nav-item">
        <?= isset($nav['next']) ? Html::anchor('game/view/'.$nav['next'], 'Next Game', ['class' => 'nav-link']) : "" ?>
    </li>
</ul>
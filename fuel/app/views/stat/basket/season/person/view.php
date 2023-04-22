<h2>Viewing <span class='muted'>#<?php echo $stat_basket_season_person->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $stat_basket_season_person->id; ?></p>
<p>
	<strong>Team season roster id:</strong>
	<?php echo $stat_basket_season_person->team_season_roster_id; ?></p>
<p>
	<strong>GP:</strong>
	<?php echo $stat_basket_season_person->GP; ?></p>
<p>
	<strong>GS:</strong>
	<?php echo $stat_basket_season_person->GS; ?></p>
<p>
	<strong>MIN:</strong>
	<?php echo $stat_basket_season_person->MIN; ?></p>
<p>
	<strong>FGM:</strong>
	<?php echo $stat_basket_season_person->FGM; ?></p>
<p>
	<strong>FGA:</strong>
	<?php echo $stat_basket_season_person->FGA; ?></p>
<p>
	<strong>TPM:</strong>
	<?php echo $stat_basket_season_person->TPM; ?></p>
<p>
	<strong>TPA:</strong>
	<?php echo $stat_basket_season_person->TPA; ?></p>
<p>
	<strong>FTM:</strong>
	<?php echo $stat_basket_season_person->FTM; ?></p>
<p>
	<strong>FTA:</strong>
	<?php echo $stat_basket_season_person->FTA; ?></p>
<p>
	<strong>ORB:</strong>
	<?php echo $stat_basket_season_person->ORB; ?></p>
<p>
	<strong>DRB:</strong>
	<?php echo $stat_basket_season_person->DRB; ?></p>
<p>
	<strong>RB:</strong>
	<?php echo $stat_basket_season_person->RB; ?></p>
<p>
	<strong>AST:</strong>
	<?php echo $stat_basket_season_person->AST; ?></p>
<p>
	<strong>STL:</strong>
	<?php echo $stat_basket_season_person->STL; ?></p>
<p>
	<strong>BS:</strong>
	<?php echo $stat_basket_season_person->BS; ?></p>
<p>
	<strong>TRN:</strong>
	<?php echo $stat_basket_season_person->TRN; ?></p>
<p>
	<strong>PF:</strong>
	<?php echo $stat_basket_season_person->PF; ?></p>
<p>
	<strong>TF:</strong>
	<?php echo $stat_basket_season_person->TF; ?></p>
<p>
	<strong>PTS:</strong>
	<?php echo $stat_basket_season_person->PTS; ?></p>

<?php echo Html::anchor('stat/basket/season/person/edit/'.$stat_basket_season_person->id, 'Edit'); ?> |
<?php echo Html::anchor('stat/basket/season/person', 'Back'); ?>
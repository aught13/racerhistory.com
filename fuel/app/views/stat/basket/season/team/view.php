<h2>Viewing <span class='muted'>#<?php echo $stat_basket_season_team->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $stat_basket_season_team->id; ?></p>
<p>
	<strong>Team season id:</strong>
	<?php echo $stat_basket_season_team->team_season_id; ?></p>
<p>
	<strong>GP:</strong>
	<?php echo $stat_basket_season_team->GP; ?></p>
<p>
	<strong>MIN:</strong>
	<?php echo $stat_basket_season_team->MIN; ?></p>
<p>
	<strong>FGM:</strong>
	<?php echo $stat_basket_season_team->FGM; ?></p>
<p>
	<strong>FGA:</strong>
	<?php echo $stat_basket_season_team->FGA; ?></p>
<p>
	<strong>TPM:</strong>
	<?php echo $stat_basket_season_team->TPM; ?></p>
<p>
	<strong>TPA:</strong>
	<?php echo $stat_basket_season_team->TPA; ?></p>
<p>
	<strong>FTM:</strong>
	<?php echo $stat_basket_season_team->FTM; ?></p>
<p>
	<strong>FTA:</strong>
	<?php echo $stat_basket_season_team->FTA; ?></p>
<p>
	<strong>ORB:</strong>
	<?php echo $stat_basket_season_team->ORB; ?></p>
<p>
	<strong>DRB:</strong>
	<?php echo $stat_basket_season_team->DRB; ?></p>
<p>
	<strong>RB:</strong>
	<?php echo $stat_basket_season_team->RB; ?></p>
<p>
	<strong>AST:</strong>
	<?php echo $stat_basket_season_team->AST; ?></p>
<p>
	<strong>STL:</strong>
	<?php echo $stat_basket_season_team->STL; ?></p>
<p>
	<strong>BS:</strong>
	<?php echo $stat_basket_season_team->BS; ?></p>
<p>
	<strong>TRN:</strong>
	<?php echo $stat_basket_season_team->TRN; ?></p>
<p>
	<strong>PF:</strong>
	<?php echo $stat_basket_season_team->PF; ?></p>
<p>
	<strong>TF:</strong>
	<?php echo $stat_basket_season_team->TF; ?></p>
<p>
	<strong>PTS:</strong>
	<?php echo $stat_basket_season_team->PTS; ?></p>

<?php echo Html::anchor('stat/basket/season/team/edit/'.$stat_basket_season_team->id, 'Edit'); ?> |
<?php echo Html::anchor('stat/basket/season/team', 'Back'); ?>
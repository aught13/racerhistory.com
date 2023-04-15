<h2>Editing Game Details</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= Form::open(); ?>
        <fieldset>

            <div class="form-group">
                <?= Form::label('Game time', 'game_time', ['class' => 'control-label']); ?>

                <?= Form::input('game_time', Input::post('game_time', isset($game) ? $game->game_time : ''), ['type' => 'time', 'class' => 'form-control', 'placeholder' => 'Game time']); ?>
            </div>
            <div class="form-group">
                <?= Form::label('Game duration', 'game_duration', ['class' => 'control-label']); ?>

                <?= Form::input('game_duration', Input::post('game_duration', isset($game) ? $game->game_duration : ''), ['type' => 'time', 'class' => 'form-control', 'placeholder' => 'Game duration']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('Place', 'place_id', ['class' => 'control-label']); ?>
                <div class='input-group'>
                    <?= Form::select('place_id', Input::post('place_id', isset($game) ? $game->place_id : ''),$options['places'], ['class' => 'form-control', 'placeholder' => 'Place id']); ?>
                    <?php if(\Fuel\Core\Uri::segment(3) === 'create') : ?>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#PlaceModal">New</button>
                        </div>
                    <?php endif; ?>
                </div>    
            </div>

            <div class="form-group">
                <?= Form::label('Site', 'site_id', ['class' => 'control-label']); ?>
                <div class='input-group'>
                    <?= Form::select('site_id', Input::post('site_id', isset($game) ? $game->site_id : ''),$options['sites'], ['class' => 'form-control', 'placeholder' => 'Site id']); ?>
                    <?php if(\Fuel\Core\Uri::segment(3) === 'create') : ?>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#SiteModal">New</button>
                        </div>
                    <?php endif; ?>
                </div> 
            </div>

            <div class="form-group">
                <?= Form::label('Attendance', 'attendance', ['class' => 'control-label']); ?>

                <?= Form::input('attendance', Input::post('attendance', $game->attendance ?? ''), ['class' => 'form-control', 'placeholder' => 'Attendance']); ?>
            </div>

            <div class="form-group">
                <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

                <div class="pull-right">
                    <?php if (Uri::segment(3) === 'edit'): ?>
                        <div class="btn-group">
                            <?= Html::anchor('admin/game/view/' . $game->id, 'Back to Game', ['class' => 'btn btn-info']); ?>
                            <?= Html::anchor('admin/game', 'All Games', ['class' => 'btn btn-default']); ?>
                            <?= Html::anchor('admin/team/season/view/' . $game->team_season_id, 'Back to Season', ['class' => 'btn btn-info']); ?>
                        </div>
                    <?php else: ?>
                        <?= Html::anchor('admin/game', 'Back', ['class' => 'btn btn-link']); ?>
                    <?php endif ?>
                </div>
            </div>
        </fieldset>
        <?= Form::close(); ?>
    </div>
</div>
<div id="PlaceModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Place</h4>
      </div>
      <div class="modal-body">
        <?= render('admin/place/_form_ajax'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    $("#ajax_form").submit(function(event) {
      event.preventDefault(); //prevent default action 
      let post_url = $(this).attr("action"); //get form action url
      let request_method = $(this).attr("method"); //get form GET/POST method
      let form_data = $(this).serialize(); //Encode form elements for submission	
      $.ajax({
          url: post_url,
          type: request_method,
          data: form_data
        })  .done(function(xml) {
            var message = $(xml).find('message').first().text();
            var place_id = $(xml).find('place_id').first().text();
            var place_name = $(xml).find('place_name').first().text();
            alert(message);
            var select = $('#form_place_id');
            select.append('<option value="'+ place_id +'">'+ place_name +'</option>');
            var select2 = $('#ajax_form_place_id');
            select2.append('<option value="'+ place_id +'">'+ place_name +'</option>');
            var select3 = $('#ajax_form_site_place_id');
            select3.append('<option value="'+ place_id +'">'+ place_name +'</option>');
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $( ".in" ).removeClass( "in" )
        })
        });
</script>
<div id="SiteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Place</h4>
      </div>
      <div class="modal-body">
        <?= render('admin/site/_form_ajax', $options); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    $("#ajax_form_site").submit(function(event) {
      event.preventDefault(); //prevent default action 
      let post_url = $(this).attr("action"); //get form action url
      let request_method = $(this).attr("method"); //get form GET/POST method
      let form_data = $(this).serialize(); //Encode form elements for submission	
      $.ajax({
          url: post_url,
          type: request_method,
          data: form_data
        })  .done(function(xml) {
            var message = $(xml).find('message').first().text();
            var site_id = $(xml).find('site_id').first().text();
            var site_name = $(xml).find('site_name').first().text();
            alert(message);
            var select = $('#form_site_id');
            select.empty().append('<option value="'+ site_id +'">'+ site_name +'</option>');
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $( ".in" ).removeClass( "in" )
        })
        });
</script>

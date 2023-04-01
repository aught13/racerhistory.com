<h2>New Team Season</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= render('admin/team/season/_form', ['teams' => $teams, 'seasons' => $seasons], false); ?>
    </div>
</div>
<div id="TeamModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Place</h4>
      </div>
      <div class="modal-body">
        <?= render('admin/team/_form_ajax'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="SeasonModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Place</h4>
      </div>
      <div class="modal-body">
        <?= render('admin/season/_form_ajax'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    $("#ajax_form_team").submit(function(event) {
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
            var team_id = $(xml).find('team_id').first().text();
            var team_name = $(xml).find('team_name').first().text();
            alert(message);
            var select = $('#form_team_id');
            select.empty().append('<option value="'+ team_id +'">'+ team_name +'</option>');
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $( ".in" ).removeClass( "in" )
        })
    });
    $("#ajax_form_season").submit(function(event) {
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
            var season_id = $(xml).find('season_id').first().text();
            var season_name = $(xml).find('season_name').first().text();
            alert(message);
            var select = $('#form_season_id');
            select.empty().append('<option value="'+ season_id +'">'+ season_name +'</option>');
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $( ".in" ).removeClass( "in" )
        })
    });
        
</script>
<h2>New Game</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= render('admin/game/_form', $options, false); ?>
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
        <button id="close-modal-place" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            select.val(place_id);
            var select2 = $('#ajax_form_place_id');
            select2.append('<option value="'+ place_id +'">'+ place_name +'</option>');
            select2.val(place_id);
            var select3 = $('#ajax_form_site_place_id');
            select3.append('<option value="'+ place_id +'">'+ place_name +'</option>');
            select3.val(place_id);
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {            
            $("#close-modal-place").click();
        });
    });
</script>
<div id="OppModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Place</h4>
      </div>
      <div class="modal-body">
        <?= render('admin/opponent/_form_ajax',$options); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    $("#ajax_form_opponent").submit(function(event) {
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
            var opponent_id = $(xml).find('opponent_id').first().text();
            var opponent_name = $(xml).find('opponent_name').first().text();
            alert(message);
            var select = $('#form_opponent_id');
            select.append('<option value="'+ opponent_id +'">'+ opponent_name +'</option>');
            select.val(opponent_id);
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $("#close-modal").click();
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
            select.append('<option value="'+ site_id +'">'+ site_name +'</option>');            
            select.val(site_id);
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $("#close-modal").click();
        })
        });
</script>
<div id="TypeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Place</h4>
      </div>
      <div class="modal-body">
        <?= render('admin/game/type/_form_ajax'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    $("#ajax_form_game_type").submit(function(event) {
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
            var game_type_id = $(xml).find('game_type_id').first().text();
            var game_type_name = $(xml).find('game_type_name').first().text();
            alert(message);
            var select = $('#form_game_type_id');
            select.append('<option value="'+ game_type_id +'">'+ game_type_name +'</option>');
            select.val(game_type_id);
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $("#close-modal").click();
        })
    });
</script>
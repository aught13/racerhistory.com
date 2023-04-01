<h2>New Opponent</h2>
<br>
 
<div class="row">
    <div id="server-results"></div>
    <div class="col-md-6">
        <?= render('admin/opponent/_form',['opt' => $places, 'opp' => $opp], false); ?>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
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
            select.empty().append('<option value="'+ place_id +'">'+ place_name +'</option>');
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $( ".in" ).removeClass( "in" )
        })
        });
</script>
<h2>New Team Roster</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= render('admin/team/season/roster/_form', ['teams' => $teams, 'people' => $persons], false); ?>
    </div>
</div>
<div id="PersonModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Person</h4>
      </div>
      <div class="modal-body">
        <?= render('admin/person/_form') ?>
      <div class="modal-footer">
        <button id="close-modal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    $("#ajax_form_person").submit(function(event) {
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
            var person_id = $(xml).find('person_id').first().text();
            var person_name = $(xml).find('person_name').first().text();
            alert(message);
            var select = $('#form_person_id');
            select.append('<option value="'+ person_id +'">'+ person_name +'</option>');
            select.val(person_id);
        })  .fail(function(xml) {
            var message = $(xml).find('message').first().text();
            alert(message);
        })  .always(function() {
            $("#close-modal").click();
        });
    });
</script>
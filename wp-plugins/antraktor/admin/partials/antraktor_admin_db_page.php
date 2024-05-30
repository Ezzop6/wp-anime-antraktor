<div class="wrap">
  <h1>Manage Database</h1>
  <button id="create-table" class="button button-primary">Create Table</button>
  <button id="delete-table" class="button button-secondary">Delete Table</button>
  <div id="message"></div>
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#create-table').on('click', function() {
      $.post(ajaxurl, {
        action: 'create_antrakt_movie_db'
      }, function(response) {
        $('#message').html(response);
      });
    });

    $('#delete-table').on('click', function() {
      $.post(ajaxurl, {
        action: 'delete_antrakt_movie_db'
      }, function(response) {
        $('#message').html(response);
      });
    });
  });
</script>
<?php

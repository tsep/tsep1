<div class="loader">
  <?php echo $html->image('ajax-loader.gif')?>
</div>
<script>
      $.get(window.base + 'update/update/run?do=download', function (data) {
    	  $.get(window.base + 'update/update/run?do=extract', function (data) {
    		  $.get(window.base + 'update/update/run?do=upgrade', function (data) {
    		        window.location = <?php echo json_encode($html->url('/admin'))?>;
    	      });   
          });
      });
</script>

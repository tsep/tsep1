<div class="loader">
  Installing The Search Engine Project...
  <?php echo $html->image('ajax-loader.gif')?>
</div>
<script type="text/javascript">
  $.get(<?php echo json_encode($html->url(array('action' => 'start')))?>, function (data) {
    //window.location = <?php echo json_encode($html->url('/admin'))?>;
  });
</script>
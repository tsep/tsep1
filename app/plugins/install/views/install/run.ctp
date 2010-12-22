<div class="loader">
  <?php echo $html->image('ajax-loader.gif')?>
</div>
<script type="text/javascript">
  $.get(<?php echo json_encode($html->url(array('action' => 'run', '?' => array('action' => 'install'))))?>, function (data) {
    $.get(<?php echo json_encode($html->url(array('action' => 'run', '?' => array('action' => 'add'))))?>, function (data) {
      window.location = <?php echo json_encode($html->url('/admin'))?>;
    });
  });
</script>
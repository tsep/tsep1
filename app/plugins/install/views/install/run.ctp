<script type="text/javascript">
  $.get(<?php echo json_encode($html->url(array('action' => 'run', '?' => array('action' => 'create_tables'))))?>, function (data) {
    $.get(<?php echo json_encode($html->url(array('action' => 'run', '?' => array('action' => 'add_user'))))?>, function (data) {
      window.location = <?php echo json_encode($html->url('/admin'))?>;
    });
  });
</script>
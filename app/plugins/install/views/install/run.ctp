<div class="loader">
  Installing The Search Engine Project...<br />
  <em>Do NOT close your browser during this process.</em>
</div>
<script type="text/javascript">
  $.get(<?php echo json_encode($html->url(array('action' => 'run', '?' => array('action' => 'install'))))?>, function (data) {
    $.get(<?php echo json_encode($html->url(array('action' => 'run', '?' => array('action' => 'add'))))?>, function (data) {
      window.location = <?php echo json_encode($html->url('/admin'))?>;
    });
  });
</script>
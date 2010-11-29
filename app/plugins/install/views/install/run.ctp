<div class="loader">
  Installing The Search Engine Project...<br />
  <em>Do not close your browser during this process.</em>
</div>
<script type="text/javascript">
  $.get(<?php echo json_encode($html->url(array('action' => 'start')))?>, function (data) {
    //window.location = <?php echo json_encode($html->url('/admin'))?>;
  });
</script>
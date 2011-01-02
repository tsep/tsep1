<div class="loader">
  <?php echo $html->image('ajax-loader.gif')?>
</div>
<script>
      $.get(window.base + 'update/update/run?do=yes', function (data) {
        window.location = data;
      });
</script>

<h3>You Have Been Logged Out</h3>
<div style="display:none;">
  <?php //TODO: Integrate this with the layout ?>
  Click <?php echo $html->link('here', array('controller' => 'users', 'action' => 'login'), array('id' => 'login'))?> if you are not redirected in five seconds
</div>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function () {
      window.location = $("#login").attr("href");
    },2000);
  });
</script>

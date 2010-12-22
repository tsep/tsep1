<html>
  <head>
    <title>Updating...</title>
    <style type="text/css">
      body
      {
          background-color:gray;
      }
      #updatePanel {
        text-align:center;
        vertical-align:middle;
        height:40px;
        padding-top:20px;
        background-color:white;
        width:200px;
        margin-top:30%;
        border-radius:5px;
      }
    </style>
  </head>
  <body>
    <center>
      <div id="updatePanel">
				<?php echo $html->image('ajax-loader.gif')?>
      </div>
    </center>
    <script>
          $.get(window.base + 'update/update/run?do=yes', function (data) {
            window.location = data;
          });
    </script>
  </body>
</html>
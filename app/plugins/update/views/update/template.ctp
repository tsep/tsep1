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
        height:50px;
        background-color:white;
        width:200px;
        margin-top:40%;
      }
    </style>
  </head>
  <body>
    <center>
      <div id="updatePanel">
        Updating...
      </div>
    </center>
    <script>
          $.get(window.base + 'update/update/run', function (data) {
            $('#updatePanel').html('Update Complete');
            window.location.reload();
          });
    </script>
  </body>
</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12./jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://www.thrashcan.net/main.css?version=29"/>
  <title>Guestbook</title>
</head>

<body>
<div class="container">
  <nav class="row">
    <a class="col-sm-1" href="/guestbook/main.php">Guestbook</a>
    <a class="col-sm-1 col-sm-offset-1" href="#">Placeholder</a>
    <a class="col-sm-1 col-sm-offset-1" href="/pics/pics.html">Pictures</a>
    <div class="col-sm-1 col-sm-offset-5"><img src="/pics/dogturd.png"></div>
    <a class="col-sm-1" href="http://www.thrashcan.net">Thrash</a>
  </nav>

  <div class="row">
    <form class="col-sm-12" action="inserter.php" method="post">
      <textarea placeholder="Leave a comment! Only one per IP, please." name="comment" rows="5" cols="50"></textarea>
      <input type="submit" value="submit">
    </form>
  </div>

  <?php
    include '/home/thrashca/etc/guestbook.php';
    $db = new mysqli('localhost', $sqlUser, $sqlPass, 'thrashca_guestbook');

    $query = "SELECT `id`, `ip`, `time`, `content` FROM posts ORDER BY id DESC;";
    $result = $db->query($query);

    echo "<br><br>";
    while (2 < 5) {
      $line = $result->fetch_array();
      if ($line == NULL) {break;}

      echo "<p>".$line['time']."  ".$line['ip'];
      echo "<br>".$line['content']."</p>";
    }
  ?>
</div>
</body>

</html>

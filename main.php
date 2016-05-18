<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://www.thrashcan.net/main.css?v=299" />
</head>
<body>

<div id="container">
  <div id="menu">
    <ul>
      <li><a href="http://www.thrashcan.net">Back</a></li>
    </ul>
  </div>

  <div id="centerContent">
  <form action="inserter.php" method="post">
    <textarea placeholder="Leave a comment! Only one per IP, please." name="comment" rows="5" cols="50"></textarea>
    <input type="submit" value="submit">
  </form>

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
</div>


</body>
</html>

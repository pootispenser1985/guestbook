<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="guestbook.css?v=2002" />
</head>
<body>

<div id="newComment">
  <p>Add a comment!</p>
  <form action="inserter.php" method="post">
    <textarea name="comment" rows="5" cols="50"></textarea>
    <input type="submit" value="submit">
  </form>
</div>

<div id="comments">
  <?php
    include '/home/thrashca/etc/guestbook.php';
    $db = new mysqli('localhost', $sqlUser, $sqlPass, 'thrashca_guestbook');

    $query = "SELECT * FROM posts ORDER BY id DESC;";
    $result = $db->query($query);

    echo "<p>";
    while (2 < 5) {
      $line = $result->fetch_array();
      if ($line == NULL) {break;}
      for ($i=0; $i<4; $i++) {
        echo $line[$i]." ";
      }
      echo "</p><p>";
    }
    echo "</p>"
  ?>
</div>


</body>
</html>

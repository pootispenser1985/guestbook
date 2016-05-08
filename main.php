<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
  include '/home/thrashca/etc/guestbook.php';
  $db = new mysqli('localhost', $sqlUser, $sqlPass, 'thrashca_guestbook');

  $query = "SELECT * FROM posts;";
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

</body>
</html>

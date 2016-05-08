<?php
  include '/home/thrashca/etc/guestbook.php';
  $db = new mysqli('localhost', $sqlUser, $sqlPass, 'thrashca_guestbook');
  $comment = $_POST['comment'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $query = "INSERT INTO posts (`ip`, `content`)
  VALUES ('" . $ip . "', '" . $comment . "');";

  $db->query($query);
  echo "Thanks for your input!";
  echo '<br><br><br><a href="main.php">Back</a>';
?>

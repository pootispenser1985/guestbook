<?php
  include '/home/thrashca/etc/guestbook.php';
  $db = new mysqli('localhost', $sqlUser, $sqlPass, 'thrashca_guestbook');
  $comment = $_POST['comment'];
  $ip = $_SERVER['REMOTE_ADDR'];

  $ipQuery = "SELECT * FROM posts WHERE `ip` = '".$ip."';";
  $insertQuery = "INSERT INTO posts (`ip`, `content`)
  VALUES ('".$ip."', '".$comment."');";

  $result = $db->query($ipQuery);

  if (($result->fetch_array()) == NULL) {
    echo "You haven't been here before (or your ip address hasn't, anyway). Thanks for the input!"; //if the user's ip address isn't in the db, allow the comment
    $db->query($insertQuery);
  }
  else {
    echo "You've been here before! Discarding your comment
    (to prevent people from filling the drive with arbitrary data)"; //if the user's ip address IS in the db, disallow the comment
  }

  echo '<br><br><br><a href="main.php">Go Back</a>';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://www.thrashcan.net/main.css" />
</head>
<body>
  <div id="container" style="height: 800px;">
    <div id="menu">
      <ul>
        <li><a href="http://www.thrashcan.net/guestbook/main.php">Back</a></li>
      </ul>
    </div>
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
        echo "<p>You haven't been here before (or your ip address hasn't, anyway). Thanks for the input!</p>"; //if the user's ip address isn't in the db, allow the comment
        $db->query($insertQuery);
      }
      else {
        echo "<p>You've been here before! Discarding your comment
        (so that there's not an assload of comments)</p>"; //if the user's ip address IS in the db, disallow the comment
      }
    ?>
  </div>
</body>
</html>

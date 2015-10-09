<?php

$sqlite = new SQLite3('usoLsuTJ2M/comments.db');

if (isset($_POST['req_action'])) {
  $action = $_POST['req_action'];
} else {
  $action = $_GET['req_action'];
}

if ($action == 'ADD_COMMENT') {
  $name = $sqlite->escapeString($_POST['name']);
  $email = $sqlite->escapeString($_POST['email']);
  $page = $sqlite->escapeString($_POST['page']);
  $date = date('Y-m-d H:i:s');
  $comment = $sqlite->escapeString(htmlentities($_POST['commentaire']));

  $sqlite->exec("INSERT INTO comments VALUES(NULL, '$name', '$email', '$comment', '$page', '$date')") or die('Erreur insertion commentaire');

  echo 'OK';
} else if ($action == 'GET_COMMENTS') {
  $page = $sqlite->escapeString($_GET['page']);
  $results = $sqlite->query("SELECT * FROM comments WHERE page = '$page' ORDER BY date DESC") or die('Erreur selection commentaires');
  while ($row = $results->fetchArray()) {
    echo '<div class="comment">'
    . '<h4>'.$row['name'].' &nbsp;<time>'.$row['date'].'</time></h4>'
    . '<p>'.$row['comment'].'</>'
    . '</div>';
  }
}


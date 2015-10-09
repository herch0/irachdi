<?php

$sqlite = new SQLite3('usoLsuTJ2M/comments.db');

$action = $_GET['action'];

if ($action == 'ADD_COMMENT') {
  $name = $sqlite->escapeString($_GET['name']);
  $email = $sqlite->escapeString($_GET['email']);
  $page = $sqlite->escapeString($_GET['page']);
  $date = date('Y-m-d H:i:s');
  $comment = $sqlite->escapeString(htmlentities($_GET['comment']));

  $sqlite->exec("INSERT INTO comments VALUES(NULL, '$name', '$email', '$comment', '$page', '$date')") or die('Erreur insertion commentaire');

  echo 'OK';
}


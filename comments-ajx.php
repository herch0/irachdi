<?php

$sqlite = new SQLite3('db/comments.db');

$action = $_GET['action'];

if ($action == 'ADD_COMMENT') {
  $name = $sqlite->escapeString($_GET['name']);
  $email = $sqlite->escapeString($_GET['email']);
  $page = $sqlite->escapeString($_GET['page']);
  $comment = $sqlite->escapeString($_GET['comment']);

  $sqlite->exec("INSERT INTO comments VALUES(NULL, '$name', '$email', '$comment', '$page')") or die('Erreur insertion commentaire');

  echo 'OK';
}


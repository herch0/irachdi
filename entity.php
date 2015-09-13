<!DOCTYPE html>
<?php
$text = isset($_POST['text']) ? $_POST['text'] : '';
$text = htmlentities($text, ENT_NOQUOTES);
?>
<html>
  <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <form method="POST">
      <textarea name='text' rows="8" cols='150'><?= htmlentities($text) ?></textarea><br>
      <button >change</button>
    </form>
  </body>
</html>

<?php
  if (count($_POST) > 0) {
    $thirtyDaysFromNowInSeconds = time() + (86400 * 30);

    setcookie('color', $_POST['color'], $thirtyDaysFromNowInSeconds, '/');
    setcookie('text-decoration', $_POST['text-decoration'], $thirtyDaysFromNowInSeconds, '/');

    //Redirect back - the worst way, but hey, it works.
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    die('<b>ERROR:</b> Please try again with a valid request!<br><a href="../">&laquo; Go back</a>');
  }

<?php
  if (count($_POST) > 0) {
    //Allow all letters, numbers and () as well as # (for colors), whitespace (spaces etc.) and commas
    $pattern = '/[^\s\w#(),\-]/';
    $thirtyDaysFromNowInSeconds = time() + (86400 * 30);

    //If the strings contain more than the allowed characters, they won't be empty after this, so we'll need to throw an error
    if (preg_match($pattern, $_POST['color']) || preg_match($pattern, $_POST['text-decoration'])) {
      if (!in_array($_POST['text-decoration'], array('none', 'underline', 'overline', 'line-through'))) {
        setcookie('error', 'Bitte wählen Sie einen gültigen Wert für die Textdekoration!', time() + 3600, '/');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
      }

      setcookie('error', 'Sie hatten ungültige Zeichen in Ihrer Eingabe!<br>Bitte versuchen Sie es noch einmal.', time() + 3600, '/');
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      return;
    }

    setcookie('color', $_POST['color'], $thirtyDaysFromNowInSeconds, '/');
    setcookie('text-decoration', $_POST['text-decoration'], $thirtyDaysFromNowInSeconds, '/');

    //Redirect back - the worst way, but hey, it works.
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    die('<b>ERROR:</b> Please try again with a valid request!<br><a href="../">&laquo; Go back</a>');
  }

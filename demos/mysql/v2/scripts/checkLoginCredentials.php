<?php
  session_start();

  if (!isset($_POST['username']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['error'] = 'Bitte geben Sie einen Nutzername bzw. ein Passwort an!';

    header('Location: '.$_SERVER['HTTP_REFERER']);
    return;
  }

  //Save username and password from the form and secure the input
  $username = mysqli_real_escape_string($_POST['username']);
  $password = mysqli_real_escape_string($_POST['password']);

  //Connect to the database and change its charset
  $connection = mysqli_connect('127.0.0.1', 'homestead', 'secret', 'vulnerable');

  if (mysqli_connect_errno()) {
    $_SESSION['error'] = 'Die Verbindung mit der Datenbank ist fehlgeschlagen!';

    header('Location: '.$_SERVER['HTTP_REFERER']);
    return;
  }

  mysqli_set_charset($connection, 'utf8');

  //Find out if the user exists or not
  if ($checkUserQuery = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1")) {
    if (mysqli_num_rows($checkUserQuery) == 1) {
      $_SESSION['success'] = "Sie haben sich erfolgreich als <strong>$username</strong> angemeldet!";
    } else {
      $_SESSION['error'] = 'Der Nutzername bzw. das Passwort ist ungültig!';
    }
  } else {
    $mysqlError = mysqli_error($connection);
    $_SESSION['error'] = "Der Query hat nicht funktioniert:<br><b>{$mysqlError}</b>";
  }

  header('Location: '.$_SERVER['HTTP_REFERER']);

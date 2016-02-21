<?php
  session_start();

  if (!isset($_POST['username']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['error'] = 'Bitte geben Sie einen Nutzername bzw. ein Passwort an!';

    header('Location: '.$_SERVER['HTTP_REFERER']);
    return;
  }

  //Save username and password from the form and secure the input
  $username = $_POST['username'];
  $password = $_POST['password'];

  //Connect to the database and change its charset
  $connection = mysqli_connect('127.0.0.1', 'homestead', 'secret', 'vulnerable');

  if (mysqli_connect_errno()) {
    $_SESSION['error'] = 'Die Verbindung mit der Datenbank ist fehlgeschlagen!';

    header('Location: '.$_SERVER['HTTP_REFERER']);
    return;
  }

  mysqli_set_charset($connection, 'utf8');

  //Find out if the user exists or not
  if ($checkUserQuery = mysqli_prepare($connection, "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1")) {
    mysqli_stmt_bind_param($checkUserQuery, 'ss', $username, $password);
    mysqli_stmt_execute($checkUserQuery);

    if (!$result = mysqli_stmt_get_result($checkUserQuery)) {
      $mysqlError = mysqli_error($connection);
      $_SESSION['error'] = "Der Query hat nicht funktioniert:<br><b>{$mysqlError}</b>";

      header('Location: '.$_SERVER['HTTP_REFERER']);
      return;
    }

    if (mysqli_num_rows($result) == 1) {
      $_SESSION['success'] = "Sie haben sich erfolgreich als <strong>$username</strong> angemeldet!";
    } else {
      $_SESSION['error'] = 'Der Nutzername bzw. das Passwort ist ungültig!';
    }
  } else {
    $mysqlError = mysqli_error($connection);
    $_SESSION['error'] = "Der Query hat nicht funktioniert:<br><b>{$mysqlError}</b>";
  }

  header('Location: '.$_SERVER['HTTP_REFERER']);

<?php
  if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
?>
<div class="alert alert-danger">
  <p><strong>Fehler</strong></p>
  <p><?php echo $_SESSION['error'] ?></p>
</div>
<?php
    //Destroy the session completely
    $_SESSION['error'] = null;
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
  }
?>

<?php
  if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
?>
<div class="alert alert-success">
  <p><strong>Erfolg</strong></p>
  <p><?php echo $_SESSION['success'] ?></p>
</div>
<?php
    //Destroy the session completely
    $_SESSION['success'] = null;
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
  }
?>

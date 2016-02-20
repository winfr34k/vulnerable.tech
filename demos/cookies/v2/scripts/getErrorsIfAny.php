<?php
  if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
?>
<div class="alert alert-danger">
  <p><strong>Fehler</strong></p>
  <p><?php echo $_COOKIE['error'] ?></p>
</div>
<?php
  }

  setcookie('error', '', time() - 3600, '/');
?>

<?php
  if (!file_exists('.deactivated')) {
?>
<div class="alert alert-success">
  <strong>Alles OK</strong>
  <p>Ihre Firewall ist an.</p>
</div>
<?php
  } else {
?>
<div class="alert alert-danger">
  <strong>Achtung</strong>
  <p>Die Firewall ist derzeit <strong>deaktiviert</strong>!</p>
</div>
<?php
  }
?>

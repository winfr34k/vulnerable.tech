<?php require_once('scripts/getFormValues.php') ?>
<h3>Jetzt <code>NEU</code> - verändere das Aussehen der Links!</h3>
<form action="scripts/setCSSStyling.php" method="POST" role="form">
  <div class="form-group">
    <label for="color">Textfarbe:</label>
    <input type="text" class="form-control" name="color" id="color" value="<?php getColor(); ?>">
  </div>

  <div class="form-group">
    <label for="text-decoration">Textdekoration:</label>
    <select class="form-control" name="text-decoration" id="text-decoration">
      <option value="none" <?php getSelectedForValue('none'); ?>>Keine</option>
      <option value="underline" <?php getSelectedForValue('underline'); ?>>Unterstrichen</option>
      <option value="overline" <?php getSelectedForValue('overline'); ?>>Überstrichen (Bruchstrich)</option>
      <option value="line-through" <?php getSelectedForValue('line-through'); ?>>Durchgestriechen</option>
    </select>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Setzen">
    <button class="btn btn-default"><a href="scripts/resetCSSStyling.php">Zurücksetzen</a></button>
  </div>
</form>

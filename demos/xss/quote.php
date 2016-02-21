<blockquote>
  <p>
    <?php
      if (!isset($_POST['quote']) || empty($_POST['quote'])) {
        echo 'Ein sehr tolles Zitat.';
      } else {
        echo $_POST['quote'];
      }
    ?>
  </p>
  <footer>
    <?php
    if (!isset($_POST['name']) || empty($_POST['name'])) {
      echo 'Ein Mensch aus dem Internet';
    } else {
      echo $_POST['name'];
    }
    ?>
  </footer>
</blockquote>

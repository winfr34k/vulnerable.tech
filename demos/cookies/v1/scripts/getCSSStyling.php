<?php if (empty($_COOKIE)) return; ?>
<style type="text/css">
  div.starter-template a {
    <?php
      if (isset($_COOKIE['color']) && !empty($_COOKIE['color'])) {
        echo "color: {$_COOKIE['color']};\n";
      }

      if (isset($_COOKIE['text-decoration']) && !empty($_COOKIE['text-decoration'])) {
        echo "text-decoration: {$_COOKIE['text-decoration']};\n";
      }
    ?>
  }
</style>

<?php
  //Reset cookies by setting their "best before" date to an hour ago
  if (setcookie('color', '', time() - 3600, '/') && setcookie('text-decoration', '', time() - 3600, '/')) {
    //Redirect back - Sheesh! I should find a better solution.
    header('Location: ' . $_SERVER['HTTP_REFERER']);  
  }

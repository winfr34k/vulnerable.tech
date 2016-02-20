<?php
  //Default form values
  $color = "#337ab7";
  $textDecoration = "none";

  //Get form values is set by cookies
  if (isset($_COOKIE['color']) && !empty($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
  }

  if (isset($_COOKIE['text-decoration']) && !empty($_COOKIE['text-decoration'])) {
    $textDecoration = $_COOKIE['text-decoration'];
  }

  //Return value OOP style
  function getColor() {
    $color = $GLOBALS['color'];

    echo $color;
  }

  function getSelectedForValue($value) {
    $textDecoration = $GLOBALS['textDecoration'];

    if ($textDecoration == $value) {
      echo 'selected';
    }
  }

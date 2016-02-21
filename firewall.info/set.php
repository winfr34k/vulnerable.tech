<?php
  header('Content-Type: application/json');

  if (isset($_GET['status']) && !empty($_GET['status'])) {
    $online = ($_GET['status']) == 'on' ? true : false;

    if (!$online) {
      if (!file_exists('.deactivated')) {
        if (touch('.deactivated')) {
          echo json_encode(array('status' => $online, 'actionPerformed' => 'ok'));
        } else {
          echo json_encode(array('status' => $online, 'actionPerformed' => 'failed'));
        }
      } else {
        echo json_encode(array('status' => $online, 'actionPerformed' => 'unchanged'));
      }
    } else {
      if (file_exists('.deactivated')) {
        if (unlink('.deactivated')) {
          echo json_encode(array('status' => $online, 'actionPerformed' => 'ok'));
        } else {
          echo json_encode(array('status' => $online, 'actionPerformed' => 'failed'));
        }
      } else {
        echo json_encode(array('status' => $online, 'actionPerformed' => 'unchanged'));
      }
    }
  }

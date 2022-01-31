<?php
  // If the user is logged in, delete the session vars to log them out
  session_start();
  if (isset($_SESSION['User'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();
    // Destroy the session
    session_destroy();
  }

  // Delete the username and password cookies by setting their expirations to an hour ago (3600)
  setcookie('user', '', time() - 3600);
  setcookie('password', '', time() - 3600);
  header('Location: index.php')
  ?>
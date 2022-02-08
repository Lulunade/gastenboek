<?php
session_start();
if (!$_SESSION) {
  $_SESSION["used"] = false;
}

include_once "./db.php";

if(isset($_POST["submit"])) {
  if(!$_SESSION["used"]) {
    add_messages($_POST["naam"], $_POST["tekst"]);
    $_SESSION["used"] = true;
    header("Location: ./index.php");
  } else {
      header("Location: ./index.php");
  }
}
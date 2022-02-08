<?php
include_once "./db.php";
$conn = get_connection();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Homepagina</title>
</head>

<body>
  <header class="header">
    <h1 class="header-titel">Gastenboek</h1>
  </header>
  <section class="add-message">
      <form action="proces.php" method="post" id="add-message-form" class="form add-message-form">
          <label for="input-naam"></label>
          <input type="text" id="input-naam" class="input input-naam" name="naam" placeholder="Naam..."><br>
          <label for="textarea-tekst"></label>
          <textarea name="tekst" id="textarea-tekst" class="textarea-tekst" placeholder="Vul hier uw bericht in..." cols="30" rows="10"></textarea><br>
          <input type="submit" id="submit-btn" class="submit-btn" name="submit" value="Verstuur">
      </form>
  </section>
  <section class="messages">
    <div class="datatable">
      <div class="datarow-header">
        <div class="dataitem">Naam</div>
        <div class="dataitem">Bericht</div>
        <div class="dataitem">Datum</div>
      </div>
      <?=show_messages(get_messages($conn))?>
    </div>
  </section>
</body>
</html>
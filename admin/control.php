<?php

require "connect.php";

$messages = $connect->query("SELECT * FROM chat");
if(isset($messages)):
  foreach($messages as $key=> $mes):
    $user_id = $mes["sender_id"];
    $user = $connect->query("SELECT * FROM users WHERE id = '$user_id'")->fetch_assoc();
?>
<div class="message mt-2">
  <div class="sender-details d-flex">
    <b class="text-primary"><?= $user["name"] ?></b>
    <small class="text-info"><?= $user["priv"]==1?"Admin":"User" ?></small>
  </div>
  <div class="message-details d-flex mt-1">
    <p class="mes"><?= $mes["mes"] ?></p>
    <small class="timestamp muted"><?= $mes["time"] ?></small>
  </div>
</div>
<?php endforeach ?>
<?php endif ?>

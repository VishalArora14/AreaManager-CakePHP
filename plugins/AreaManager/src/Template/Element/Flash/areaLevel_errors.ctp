<?php

// if (!isset($params['escape']) || $params['escape'] !== false) {
//   $message = h($message);
// }
// ?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');">
  <?php
  if (isset($message["name"]['_empty'])) {
    echo "<p><b>Area Level Name Error: </b> " . $message["name"]['_empty'] . "</p>";
  }
  if (isset($message["name"]['length'])) {
    echo "<p><b>Area Level Name length error</b>: " . $message["name"]['length'] . "</p>";
  }
  if (isset($message["name"]['regex'])) {
    echo "<p><b>Only alphabets/numbers allowed and name should not start or end with a space character</b>: </p>";
  }
  if (isset($message["name"]['maxLength'])) {
    echo "<p><b>Max area length size is 255 chars</b>: </p>";
  }
  if (isset($message["level"]["range"])) {
    echo "<p><b>Area Level range should be 0 - 100</b>: </p>";
  }
  if (isset($message["level"]["_empty"])) {
    echo "<p><b>Area Level cannot be left empty</b>: </p>";
  }
  ?>
</div>
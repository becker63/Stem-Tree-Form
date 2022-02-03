<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
    foreach ($_POST as $key => $value)
        echo $key.' = '.$value.'<br />';
}
?>
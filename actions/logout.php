<?php
require("../php-header.php");

session_destroy();
delete_cookie();
header('location: ../.');
?>
